<!DOCTYPE html>
<html>

<head>
    <title>Facility Schedule</title>
    <!--link rel="stylesheet" type="text/css" href="../../assets/CSS/shedule.css"-->
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* .leave {
            width: 150px;
            font-weight: bold;
            background-color: #0F305B;
        }

        .update {
            background-color: Green;

        }

        .box-1,
        .box-2 {
            display: inline-block;
            width: 50%;
            height: 10px;
        }

        .box-2 {
            text-align: right;
        }

        h2 {
            transform: translate(0%, -80%);
        }

        .home-section .breadcrumb-nav {
            display: flex;
            justify-content: space-between;
            height: 30px;
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
        } */
    </style>

</head>

<body>

    <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>
    <section class="home-section">
        <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Facility Shedule</li>
                        <li class="breadcrumb-item"><a href="todaySchedule.php" style="color: #42ecf5;">Today</a></li>
                    </ul>
                </div>

            </div>
        </nav>
        <div class="header"></br></br></br>
            <div class="box-1 table_topic">
                <h2>Today's Schedule</h2>
            </div>


        </div>
        </br>



        <table class="table_view">
            <thead>
                <tr>
                    <th>Facility</th>
                    <th>Reservation Time</th>
                    <th>Customer Name</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Badminton</td>
                    <td>10-11am</td>
                    <td>S.Perera</td>

                </tr>

            </tbody>
        </table>
        </div>




    </section>
</body>

</html>