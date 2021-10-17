<?php
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
            $calendar .= "<td><h4>$currentDay</h4></br><button class='btn btn-danger btn-xs na'>-</button>";
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

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../../assets/CSS/receCalendar.css">

    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"-->
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
            padding-top: 5%;
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
    <?php
    include "./receptionistIncludes/receptionistNavigation.php";
    ?>
    
    <section class="home-section">
        <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Reservations</li>
                        <li class="breadcrumb-item"><a href="addReservation.php">Add Reservation</a></li>
                        <li class="breadcrumb-item"><a href="calendarIndex.php" style="color: #42ecf5;">Select Date</a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="content">
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