<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {

    function build_calendar($month, $year)
    {
        // Create array containing abbreviations of days of week.
        $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

        // What is the first day of the month in question?
        $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

        // How many days does this month contain?
        $numberDays = date('t', $firstDayOfMonth);

        // Retrieve some information about the first day of the
        // month in question.
        $dateComponents = getdate($firstDayOfMonth);

        // What is the name of the month in question?
        $monthName = $dateComponents['month'];

        // What is the index value (0-6) of the first day of the
        // month in question.
        $dayOfWeek = $dateComponents['wday'];

        // Create the table tag opener and day headers

        $datetoday = date('Y-m-d');



        $calendar = "<table class='table table-bordered calendar'>";
        $calendar .= "<center><h2 class='calendar-header'>$monthName $year</h2>";
        $calendar .= "<a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>Previous Month</a> ";

        $calendar .= " <a class='btn btn-xs btn-primary' href='?month=" . date('m') . "&year=" . date('Y') . "'>Current Month</a> ";

        $calendar .= "<a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "'>Next Month</a></center><br>";



        $calendar .= "<tr class='calendar-week-day'>";

        // Create the calendar headers

        foreach ($daysOfWeek as $day) {
            $calendar .= "<th  class='header' style='width:85px;'>$day</th>";
        }

        // Create the rest of the calendar

        // Initiate the day counter, starting with the 1st.

        $currentDay = 1;

        $calendar .= "</tr><tr style='text-align:center;'>";

        // The variable $dayOfWeek is used to
        // ensure that the calendar
        // display consists of exactly 7 columns.

        if ($dayOfWeek > 0) {
            for ($k = 0; $k < $dayOfWeek; $k++) {
                $calendar .= "<td  class='empty'></td>";
            }
        }


        $month = str_pad($month, 2, "0", STR_PAD_LEFT);

        while ($currentDay <= $numberDays) {

            // Seventh column (Saturday) reached. Start a new row.

            if ($dayOfWeek == 7) {

                $dayOfWeek = 0;
                $calendar .= "</tr><tr style='text-align:center;'>";
            }

            $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
            $date = "$year-$month-$currentDayRel";

            $dayname = strtolower(date('l', strtotime($date)));
            $eventNum = 0;
            $today = $date == date('Y-m-d') ? "today" : "";
            if ($date < date('Y-m-d')) {
                $calendar .= "<td><h4>$currentDay</h4></br><button class='btn btn-danger btn-xs na'><i class='fa fa-ban'></i></button>";
            } else {
                $calendar .= "<td class='$today'><h4>$currentDay</h4></br><a href='calendarBook.php?date=" . $date . "' class='btn btn-success btn-xs book'>Book</a>";
            }

            $calendar .= "</td>";
            // Increment counters

            $currentDay++;
            $dayOfWeek++;
        }



        // Complete the row of the last week in month, if necessary

        if ($dayOfWeek != 7) {

            $remainingDays = 7 - $dayOfWeek;
            for ($l = 0; $l < $remainingDays; $l++) {
                $calendar .= "<td class='empty'></td>";
            }
        }

        $calendar .= "</tr>";

        $calendar .= "</table>";

        echo $calendar;
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Select Date</title>
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/receCalendar.css">
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
                padding-top: 0;
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
                            <li>Select Date</li>
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
                <center>
                    <div class="container">
                        <div class="row">
                            <div class="calendar-body">
                                <?php
                                $dateComponents = getdate();
                                if (isset($_GET['month']) && isset($_GET['year'])) {
                                    $month = $_GET['month'];
                                    $year = $_GET['year'];
                                } else {
                                    $month = $dateComponents['mon'];
                                    $year = $dateComponents['year'];
                                }
                                echo build_calendar($month, $year);
                                ?>
                            </div>
                        </div>
                    </div>
                </center>

            </div>
        </section>
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>