<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Calendar
    </title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/shiftCalendar.css">
</head>

<body class="light">

    <div class="calendar">
        <div class="calendar-header">

            <span class="month-change" id="prev-month">
                <pre><</pre>
            </span>

            <span class="month-picker" id="month-picker">February</span>

            <span class="month-change" id="next-month">
                <pre>></pre>
            </span>

            <div class="year-picker">
                <span class="year-change" id="prev-year">
                    <pre><</pre>
                </span>
                <span id="year">2021</span>
                <span class="year-change" id="next-year">
                    <pre>></pre>
                </span>
            </div>
        </div>




        <div class="calendar-body">
            <div class="calendar-week-day">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <div class="calendar-days"></div>
        </div>

        <div class="month-list"></div>
    </div>

    <script src="calendarNew.js"></script>
</body>

</html>