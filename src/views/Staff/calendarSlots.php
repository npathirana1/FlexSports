<?php
include "../../config/db.php";

$duration = 60;
$cleanup = 10;
$start = "06:00";
$end = "22:30";

// if(isset($_GET['date'])){
//     $date = $_GET['date'];
//     $stmt = $conn->prepare("select * from bookings where date = ?");
//     $stmt->bind_param('s', $date);
//     $bookings = array();
//     if($stmt->execute()){
//         $result = $stmt->get_result();
//         if($result->num_rows>0){
//             while($row = $result->fetch_assoc()){
//                 $bookings[] = $row['timeslot'];
//             }
//             $stmt->close();
//         }
//     }
// }

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

    <title>Book Slots</title>

    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/receBook.css">



    <style>
        .home-section .home-content {
            padding-top: 8%;
            position: relative;
        }
    </style>
</head>

<body>
    <?php
    //Check user login or not
    if (isset($_SESSION['managerID'])) {
        include "../Manager/managerIncludes/ManagerNavigation.php";
    } elseif (isset($_SESSION['receptionistID'])) {
        include "../Receptionist/receptionistIncludes/receptionistNavigation.php";
    }
    ?>

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
                        <div class="col-md-12">
                            <?php echo (isset($msg)) ? $msg : ""; ?>
                        </div>
                        <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
                        foreach ($timeslots as $ts) {
                        ?>
                            <div>
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

                <div class="modal-container c-item2">
                    <div class="form-header">
                        <h4 class="modal_title">Make Reservation</h4>
                    </div>

                    <form action="">
                        <div class="form-body">
                            <div class="horizontal-group">
                                <div class="form-group left">
                                    <label for=""></label>
                                    <input type="text" placeholder="Selected Timeslot" id="timeslot" name="timeslot" class="form-control">
                                </div>
                                <div class="form-group right">
                                    <label for=""></label>
                                    <input type="text" placeholder="Booked Facility" name="LName" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" placeholder="Customer Name" name="Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" placeholder="Customer Email Address" name="TelephoneNo" class="form-control" pattern="[0][0-9]{9}">
                            </div>

                            <div class="form-group">
                                <label for=""></label>
                                <select name="#" id="#">
                                    <option value="" disabled selected hidden>Choose a payment option</option>
                                    <option value="full">Pay in full</option>
                                    <option value="advance">Pay advance</option>
                                    <option value="later">Pay later</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" name="submit" class="btn btn-primary form_btn">Add Reservation</button>
                        </div>
                    </form>
                </div>
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