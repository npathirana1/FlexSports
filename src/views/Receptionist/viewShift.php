<!DOCTYPE html>
<html>

<head>
    <title>Shifts</title>
    <!--link rel="stylesheet" type="text/css" href="homesection.css"-->
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <style>
        .item1 {
            grid-area: header;
            text-align: left;
        }

        .item2 {
            grid-area: menu;
        }

        .item3 {
            grid-area: main;

        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .home-section {
            position: relative;
            width: calc(100% - 340px);
            left: 340px;
            transition: all 0.5s ease;
            padding-top: 50px;
        }

        .grid-container {
            display: grid;
            grid-template-areas:
                'header header header header header header'
                'menu main main main main main';
            grid-gap: 10px;

            padding: 10px;
            width: 90%;

        }

        .grid-container>div {

            padding: 20px 0;


        }
    </style>
</head>

<body>


    <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>

    <section class="home-section">
        <div class="grid-container">

            <div class="item1">
                <h2 class="table_topic">Work Shedule</h2>
            </div>
            <div class="item2"><?php include "../FacilityWorker/shiftCalendar.php"; ?></div>
            <div class="item3">
                <div class="form-body">
                    <br> <br>
                    <h3 class="table_topic">Shift</h3>
                    <div class="display_box">
                        <p>Morning</p>
                    </div>
                    <br>
                    <h3 class="table_topic">Duration</h3>
                    <div class="display_box">
                        <p>6.30 AM - 2.30 PM</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
</body>

</html>