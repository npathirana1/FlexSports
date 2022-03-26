<?php
include "../../config/db.php";

$FacilityID = $_SESSION['FacilityID'];
//echo $FacilityID;

if (isset($_SESSION['res_id'])) {
    $res_id = $_SESSION['res_id'];
    //echo $res_id;

    $FacilityID = $_SESSION['facility'];
    //echo $FacilityID;

    $sql_update = "SELECT * FROM reservation WHERE ReservationNo='$res_id'";
    $select_update = mysqli_query($conn, $sql_update);
    $row_update = mysqli_fetch_assoc($select_update);

    $time_s = $row_update["timeslot"];
    $cust_name = $row_update["CustName"];
    $cust_email = $row_update["CustEmail"];
}

//Check user login or not
if (isset($_SESSION['managerID'])) {
    include "../Manager/managerIncludes/ManagerNavigation.php";
} elseif (isset($_SESSION['receptionistID'])) {
    include "../Receptionist/receptionistIncludes/receptionistNavigation.php";
}

$duration = 60;
$cleanup = 10;
$start = "06:00";
$end = "22:30";

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

if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $stmt = $conn->prepare("select * from reservation where date = ? and FacilityName = ? and NOT ReservationStatus = ?");
    $cancelled = 'Cancelled';
    $stmt->bind_param('sss', $date, $FacilityID, $cancelled);
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

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Book Slots</title>

    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/receBook.css">



    <style type="text/css">
        .home-section .home-content {
            padding-top: 8%;
            position: relative;
        }

        .btn-success:hover {
            cursor: pointer;
        }

        .danger {
            border-radius: 3px;
            font-size: 14px;
            color: red;
            font-weight: bold;
            border: none;
            padding: 5px;
            text-decoration: none;
            width: 150px;
            background-color: transparent;

            overflow: hidden;
            outline: none;
        }

        .red {
            background-color: green;
        }

        .black {
            background-color: #0F305B;
        }

        .slot {
            /* background-color: #0F305B; */
            border-radius: 3px;
            font-size: 14px;
            color: #fff;
            font-weight: 350;
            border: none;
            padding: 5px;
            text-decoration: none;
            width: 150px;
        }
    </style>

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
    <section class="home-section">
        <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item" style="color: #fff;">Reservations</li>
                        <li class="breadcrumb-item"><a href="addReservation.php">Add Reservation</a></li>
                        <li class="breadcrumb-item"><a href="calendarIndex.php">Select Date</a></li>
                        <li class="breadcrumb-item"><a href="calendarSlots.php" style="color: #42ecf5;">Submit Reservation</a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="home-content">
            <div class="c-grid-container">
                <div class="c-item1 calendar">
                    <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1>
                    <hr>
                    <div class="row fslots">
                        <div>
                            <?php echo (isset($msg)) ? $msg : ""; ?>
                        </div>
                        <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
                        foreach ($timeslots as $ts) {
                        ?>
                            <div>
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

                <?php if(!isset($_SESSION['res_id'])){?>
                <div class="modal-container c-item2" style="margin-top: 3%;">
                    <div class="form-header">
                        <h4 class="modal_title">Make Reservation</h4>
                    </div>

                    <form action="./staffIncludes/makeReservation.inc.php" method="post">
                        <div class="form-body">
                            <div class="horizontal-group">
                                <div class="form-group left">
                                    <label for=""></label>
                                    <input readonly type="text" placeholder="Time Slots" class="form-control timeslot" id="timeslot" name="timeslot">
                                </div>
                                <div class="form-group right">
                                    <label for=""></label>
                                    <input readonly type="text" placeholder="Booked Facility" name="facility" class="form-control" value="<?php echo $FacilityID; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" placeholder="Customer Name" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" placeholder="Customer Email Address" name="email" class="form-control">
                            </div>

                           
                            <div class="form-group">
                                <label for=""></label>
                                <select name="payment">
                                    <option value="" disabled selected hidden>Choose a payment option</option>
                                    <option value="full">Pay in full</option>
                                    <option value="advance">Pay advance</option>
                                    <option value="later">Pay later</option>
                                </select>
                            </div>
                            
                            <input type="hidden" id="date" name="date" value="<?php echo $date; ?>">
                        </div>
                        <div class="form-footer">
                            <button onclick="disablebuttons()" type="submit" name="submit" class="btn btn-primary form_btn">Add Reservation</button>
                        </div>
                    </form>
                </div>

                <?php } else {?>
                    <div class="modal-container c-item2" style="margin-top: 3%;">
                    <div class="form-header">
                        <h4 class="modal_title">Make Reservation</h4>
                    </div>

                    <form action="./staffIncludes/updateReservation.inc.php" method="post">
                        <div class="form-body">
                            <div class="horizontal-group">
                                <div class="form-group left">
                                    <label for=""></label>
                                    <input readonly type="text" placeholder="Time Slots" class="form-control timeslot" id="timeslot" name="timeslot" value="<?php echo $time_s; ?>">
                                </div>
                                <div class="form-group right">
                                    <label for=""></label>
                                    <input readonly type="text" placeholder="Booked Facility" name="facility" class="form-control" value="<?php echo $FacilityID; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input readonly type="text" placeholder="Customer Name" name="name" class="form-control" value="<?php echo $cust_name; ?>">
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input readonly type="text" placeholder="Customer Email Address" name="email" class="form-control" value="<?php echo $cust_email; ?>">
                            </div>

                            <!-- <div class="form-group">
                                <label for=""></label>
                                <select name="payment">
                                    <option value="" disabled selected hidden>Choose a payment option</option>
                                    <option value="full">Pay in full</option>
                                    <option value="advance">Pay advance</option>
                                    <option value="later">Pay later</option>
                                </select>
                            </div> -->
                            
                            <input type="hidden" id="date" name="date" value="<?php echo $date; ?>">
                            <input type="hidden" id="resid" name="resid" value="<?php echo $res_id; ?>">
                        </div>
                        <div class="form-footer">
                            <button onclick="disablebuttons()" type="submit" name="submit" class="btn btn-primary form_btn">Add Reservation</button>
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>
    </section>

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

                } else {
                    time.push(key.innerHTML);
                    key.classList.add("red");
                    key.classList.remove("black");

                }
                Timeslot.value = time;
            });
        });
    </script>
</body>

</html>