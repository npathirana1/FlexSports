<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
    $duration = 60;
    $cleanup = 10;
    $start = "06:00";
    $end = "22:30";

    /*if(isset($_GET['date'])){
        $date = $_GET['date'];
        $stmt = $conn->prepare("select * from bookings where date = ?");
        $stmt->bind_param('s', $date);
        $bookings = array();
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $bookings[] = $row['timeslot'];
                }
                $stmt->close();
            }
        }
    }*/

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

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Book Slots</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/receCalendar.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/receBook.css">
        <style>
            .form_title {
                color: #0F305B;
                margin-top: 0;
                padding-top: 0;
                padding-bottom: 2%;
            }

            .grid-container {
                display: grid;
                grid-gap: 50px;
                grid-template-columns: auto auto auto;
                width: 90%;
                text-align: center;
                margin-left: 5%;
            }

            .grid-item {
                background-color: #0F305B;
                padding: 20px;
                text-align: center;
                height: 10%x;
                border-radius: 12px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                width: 300px;
            }

            .grid-container .grid-item a {
                color: white;
                text-decoration: none;
                font-size: 30px;
            }

            .container {
                margin-top: 0;
                padding-top: 0;
                transform: scale(0.8);
            }

            .calendar {
                width: 75%;
                margin-left: 25%;
                margin-bottom: 5%;
            }

            .row {
                grid-template-columns: 2fr 2fr 2fr;
                grid-row-gap: 5px;
            }
        </style>

    </head>

    <body>
        <?php include "managerIncludes/managerNavigation.php"; ?>

        <section class="home-section">
            <nav>
                <div class="sidebar-button">
                    <!-- <i class='bx bx-menu sidebarBtn'></i> -->
                    <span class="dashboard">Add Reservation</span>
                    <div>
                        <ul class="breadcrumb">
                            <li><a href="reservations.php">Reservations</a></li>
                            <li><a href="./addReservation.php">Add Reservation</a></li>
                            <li><a href="./calenderIndex.php">Select Date</a></li>
                            <li>Book Slots</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <!--<img src="images/profile.jpg" alt="">-->
                    <span class="admin_name"><?php echo $_SESSION['managerID']; ?></span>
                    <!--i class='bx bx-chevron-down'></i-->
                </div>

            </nav>

            <div class="home-content">
                <span onclick="goBack()" style="float: right; margin-bottom:0; margin-top:0; padding-top:0; padding-bottom: 0;" class="go_back">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </span>
                <div class="calendar">
                    <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1>
                    <hr style="margin-bottom: 3%;">
                    <div class="row" style="text-align: center;">
                        <!-- <div class="col-md-12">
                <?php echo (isset($msg)) ? $msg : ""; ?>
            </div> -->
                        <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
                        foreach ($timeslots as $ts) {
                        ?>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php if (in_array($ts, $bookings)) { ?>
                                        <button class="btn btn-danger"><?php echo $ts; ?></button>
                                    <?php } else { ?>
                                        <button class="btn btn-success slot" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                                    <?php }  ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <center>
                    <!--div class="form-header">
                    <h4 class="modal-title">Booking for: <span id="slot"></span></h4>
                </div-->
                    <div class="modal-body">
                        <div class="roww">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <div style="margin-left: -20px;" class="form-group">
                                        <label for="">Time Slot</label>
                                        <input type="text" class="form-control" id="timeslot" name="timeslot">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Name </label>
                                        <input required type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email </label>
                                        <input required type="email" class="form-control" name="email">
                                    </div>
                                    <div style="margin-left: -80px;" class="form-group">
                                        <label for="#">Payment Option:</label>
                                        <select name="#" id="#">
                                            <option value="full">Pay in full</option>
                                            <option value="advance">Pay advance</option>
                                            <option value="later">Pay later</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button name="submit" type="submit" class="btn btn-primary2">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script>
            $(".slot").click(function() {
                var timeslot = $(this).attr('data-timeslot');
                $("#slot").html(timeslot);
                $("#timeslot").val(timeslot);
            });

            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>