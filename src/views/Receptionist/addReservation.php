<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Make Reservation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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

        a {
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
        }

       
        .home-section .content{
            padding-top: 2%;
            position: relative;
        }
    </style>
</head>

<body>
    <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>

    <section class="home-section">
    <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
            <!--div>
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Manage Shifts</a></li>
                    <li class="breadcrumb-item"><a href="#">Shift List</a></li>
                    <li class="breadcrumb-item">Add Shift </li>
                    </ul> 
                </div-->

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
                <a href="../Customer/calendar/index.php"><i class='bx bxs-basketball'></i>
                    <span class="links_name">&nbsp Basketball</span></a>
            </div>

            <div class="grid-item">
                <a href="#"><i class='bx bxs-tennis-ball'></i>
                    <span class="links_name">&nbsp Tennis</span></a>
            </div>
            <div class="grid-item">
                <a href="#"><i class='bx bx-bowling-ball'></i>
                    <span class="links_name">&nbsp Bowling</span></a>
            </div>
            <div class="grid-item">
                <a href="#"><i class='bx bx-water'></i>
                    <span class="links_name">&nbsp Swimming</span></a>
            </div>
            <div class="grid-item"><a href="#"><i class='bx bx-water'></i>
                    <span class="links_name">&nbsp Badminton</span></a>
            </div>
            <div class="grid-item">
                <a href="#"><i class='bx bx-water'></i>
                    <span class="links_name">&nbsp Volleyball</span></a>
            </div>
            </div>
    </section>
</body>

</html>