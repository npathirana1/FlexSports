<?php include "./receptionistIncludes/receptionistNavigation.php"; ?>

<?php
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

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/receCalendar.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/receBook.css">
    <style>
        .home-section .breadcrumb-nav {
            display: flex;
            justify-content: space-between;
            height: 80px;
            background: #fff;
            align-items: center;
            position: fixed;
            width: calc(100% - 240px);
            left: 240px;
            z-index: 100;
            padding: 0 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            transition: all 0.5s ease;
            font-weight: 700;
        }

        .home-section .content {
            padding-top: 8%;
            position: relative;
        }


        ul.breadcrumb li {
            display: inline;
            font-size: 18px;
        }

        /* Add a slash symbol (/) before/behind each list item */

        ul.breadcrumb li+li:before {
            padding: 8px;
            color: black;
            content: "/\00a0";
        }


        /* Add a color to all links inside the list */

        ul.breadcrumb li a {
            color: #01447e;
            text-decoration: none;
        }


        /* Add a color on mouse-over */

        ul.breadcrumb li a:hover {
            color: #0a5ea8;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <section class="home-section">
        <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Reservations</li>
                        <li class="breadcrumb-item"><a href="addReservation.php">Add Reservation</a></li>
                        <li class="breadcrumb-item"><a href="calendarIndex.php">Select Date</a></li>
                        <li class="breadcrumb-item"><a href="calendarBook.php" style="color: #42ecf5;">Submit Reservation</a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="content">
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
                <div class="form-header">
                    <h4 class="modal-title">Booking for: <span id="slot"></span></h4>
                </div>
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