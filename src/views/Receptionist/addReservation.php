<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Make Reservation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
   
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/addCustomer.css">

    <style>
        .grid-container {
            display: grid;
            grid-gap: 50px;
            grid-template-columns: auto auto auto;
            padding: 10px;
            width: 90%;
        }

        .grid-item {
            background-color: #0F305B;
            padding: 20px;
            text-align: center;
            height: 100px;
            border-radius: 12px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            width: 300px;
        }

        .grid-container .grid-item a {
            color: white;
            text-decoration: none;
            font-size: 30px;
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
            padding-top: 3%;
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
    <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>

    <section class="home-section">
        <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Reservations</li>
                        <li class="breadcrumb-item"><a href="allReservations.php">Reservations List</a></li>
                        <li class="breadcrumb-item"><a href="addReservation.php" style="color: #42ecf5;">Add Reservation</a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="content">
            <div class="header"></br></br></br>
                <div class="box-1 table_topic">
                    <h2>Make new Reservation</h2>
                </div></br>
                <div class="box-1 table_topic">
                    <h3>Select the sports facility</h3>
                </div></br>
            </div>

            <div class="grid-container">
                <div class="grid-item">
                    <a href="calendarIndex.php"><i class='bx bxs-basketball'></i>
                        <span class="links_name">&nbsp Basketball</span></a>
                </div>

                <div class="grid-item">
                    <a href="calendarIndex.php"><i class="fas fa-table-tennis"></i>
                        <span class="links_name">&nbspTable Tennis</span></a>
                </div>
                <div class="grid-item">
                    <a href="calendarIndex.php"><i class='bx bx-bowling-ball'></i>
                        <span class="links_name">&nbsp Billiards</span></a>
                </div>
                <div class="grid-item">
                    <a href="calendarIndex.php"><i class='bx bx-water'></i>
                        <span class="links_name">&nbsp Swimming</span></a>
                </div>
                <div class="grid-item">
                    <a href="calendarIndex.php"><i class='bx bx-water'></i>
                        <span class="links_name">&nbsp Badminton</span></a>
                </div>
                <div class="grid-item">
                    <a href="calendarIndex.php"><i class="fas fa-volleyball-ball"></i>
                        <span class="links_name">&nbsp Volleyball</span></a>
                </div>
            </div>
    </section>
</body>

</html>