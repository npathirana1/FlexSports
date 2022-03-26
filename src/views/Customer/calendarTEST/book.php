<?php
include "../../../config/db.php";

//Check user login or not
if (isset($_SESSION['customerID'])) {
?>
    <?php
    include "../customerincludes/navbarCal.php"
    ?>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "flexsports";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    
    session_start();
    $FacilityID = $_SESSION['FacilityID'];

    echo $FacilityID;
    echo $FacilityID;
    echo $FacilityID;

$price=1000;
 
 
    if (isset($_GET['date'])) {
        $date = $_GET['date'];
        $stmt = $conn->prepare("select * from reservation where date = ? and FacilityName = ? and NOT ReservationStatus = ?");
        $cancelled = 'Cancelled';
        $stmt->bind_param('sss', $date, $FacilityID,$cancelled);
        $bookings = array();
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if (strpos($row['timeslot'], ",")) {
                        foreach (explode(",", $row['timeslot']) as $item) {
                            $bookings[] = $item;
                        }
                    } else {
                        $bookings[] = $row['timeslot'];
                    }
                    //    echo $row["timeslot"];

                    // $bookings[] = $row['timeslot'];
                }
                $stmt->close();
            }
        }
    }

    if (isset($_SESSION['customerID'])) {
        $userEmail = $_SESSION['customerID'];

        $sql1 = "SELECT * from customer where Email ='" . $userEmail . "' ";

        $result = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result);
        $CustID = $row1['CustomerID']; }

        echo $CustID;

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $timeslot = $_POST['timeslot'];
        $FacilityID = $_POST['FacilityName'];
        $itemcount = $_POST['itemcount'];

        $stmt = $conn->prepare("SELECT * FROM reservation WHERE date = ? AND timeslot = ? AND FacilityName = ?");
        $stmt->bind_param('sss', $date, $timeslot,$FacilityID);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $msg = "<div class='alert alert-danger'>Already Booked</div>";
            } else {
                $stmt = $conn->prepare("INSERT INTO reservation (date, timeslot, CustomerID, FacilityName) VALUES (?,?,?,?)");
                $stmt->bind_param('ssss', $date, $timeslot, $CustID, $FacilityID);
                $stmt->execute();

                $sql2 = "SELECT * from reservation where CustomerID ='" . $CustID . "' AND timeslot ='" . $timeslot . "' AND date ='" . $date . "' AND FacilityName ='" . $FacilityID . "'  ";

                 $result = mysqli_query($conn, $sql2);
                 $row2 = mysqli_fetch_assoc($result);
                 $ReservationNo = $row2['ReservationNo']; 

                 echo $FacilityNo;

                $stmt = $conn->prepare("INSERT INTO facility_reservation (FacilityName,ReservationNo) VALUES (?,?)");
                $stmt->bind_param('ss', $FacilityID, $ReservationNo);
                $stmt->execute();
                $msg = "<div class='alert alert-success'>Booking Successfull</div>";
                $bookings[] = $timeslot;
                $stmt->close();
                $conn->close();

                session_start();
                $_SESSION['itemcount'] = $itemcount;
                $_SESSION['totalprice'] = $itemcount*1000;


                die(header('location:../checkout.php'));

            }
        }
    }

    echo $date, $timeslot, $CustID;



    $duration = 60;
    $cleanup = 10;
    $start = "06:00";
    $end = "23:00";

    function timeslots($duration, $cleanup, $start, $end)
    {
        $start = new DateTime($start);
        $end = new DateTime($end);
        $interval = new DateInterval("PT" . $duration . "M");
        $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
        $slots = array();

        for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)) {
            $endPeriod = clone $intStart;
            $endPeriod->add($interval);
            if ($endPeriod > $end) {
                break;
            }

            $slots[] = $intStart->format("H:iA") . " - " . $endPeriod->format("H:iA");
        }

        return $slots;
    }
    ?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Select a time slot</title>


        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="book.css">
        <script>
            function disableSubmit() {
                document.getElementById("submit").disabled = true;
            }

            function activateButton(element) {

                if (element.checked) {
                    document.getElementById("submit").disabled = false;
                } else {
                    document.getElementById("submit").disabled = true;
                }

            }
        </script>
    </head>

    <body onload="disableSubmit()">
        <div class="calendar">
            <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1>
            <hr>
            <div class="row">
                <!-- <div class="col-md-12">
                <?php echo (isset($msg)) ? $msg : ""; ?>
            </div> -->
                <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
                foreach ($timeslots as $ts) {
                ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php if (in_array($ts, $bookings)) { ?>
                                <button class="danger"><?php echo $ts; ?></button>
                            <?php } else { ?>
                                <button class="btn btn-success slot black" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                            <?php }  ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
        <center>
            <div class="form-header">
                <h4 class="modal-title">Booking for: <span id="slot"></span></h4>
            </div>
            <div class="modal-body">
                <div class="roww">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <input type="hidden" name="itemcount" value='0' class="itemcount">
                            <div style="margin-left: -20px;" class="form-group">
                                <label for="">Time Slot</label>
                                <input readonly type="text" class="form-control timeslot" id="timeslot" name="timeslot">
                            </div>
                            <div style="margin-left: -65px;" class="form-group">
                                <label for="">Facility Number </label>
                                <input readonly type="text" class="form-control timeslot" value="<?php echo $FacilityID; ?>" name="FacilityName">
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Email </label>
                                <input required type="email" class="form-control" name="email">
                            </div> -->
                            <div style="margin-left: -80px;" class="form-group">
                                <label for="#">Payment Option:</label>
                                <select name="#" id="#">
                                    <option value="full">Pay in full</option>
                                    <option value="advance">Pay advance</option>
                                    <option value="later">Pay later</option>

                                </select>
                            </div>

                            <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)"> I Agree to <a href="terms.php">Terms & Coditions</a> <br><br><br>
                            <div class="form-group pull-right">
                                <button onclick="disablebuttons()" style="margin-right: 700px;" name="submit" type="submit" class="btn btn-primary">Next</button> <br> <br> <br> <br> <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </center>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script>
            // $(".slot").click(function() {
            //     var timeslot = $(this).attr('data-timeslot');
            //     $("#slot").html(timeslot);
            //     $("#timeslot").val(timeslot);
            // });

            // if (window.history.replaceState) {
            //     window.history.replaceState(null, null, window.location.href);
            // }
            function disablebuttons() {
                let Buttons = document.querySelectorAll(".red");

            }
            const Buttons = document.querySelectorAll(".slot");
            const Timeslot = document.querySelector(".timeslot");
            const time = [];

            Buttons.forEach((key) => {
                key.addEventListener("click", () => {
                    if (time.includes(key.innerHTML)) {
                        time.splice(time.indexOf(key.innerHTML), 1);
                        key.classList.remove("red");
                        key.classList.add("black");
                        document.querySelector(".itemcount").value--
                       
                        

                    } else {
                        time.push(key.innerHTML);
                        key.classList.add("red");
                        key.classList.remove("black");
                        document.querySelector(".itemcount").value++
                      

                    }
                    Timeslot.value = time;
                });
            });
        </script>



    </body>

    </html>
<?php
} else {
    header('Location: ../../login.php');
}



?>