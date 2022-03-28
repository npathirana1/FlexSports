<?php
include "../../config/db.php";
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Make Reservation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">

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

        .grid-container .grid-item button {
            color: white;
            text-decoration: none;
            font-size: 30px;
            background: none;
            outline: inherit;
            border: none;
            cursor: pointer;    
            padding: 20px;
            margin-top: -12px;
        }


        .badmin {
            width: 14%;
            height: auto;
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

                        <?php
                            //Check user is logged as a manager 
                            if (isset($_SESSION['managerID'])) { ?>
                                <li class="breadcrumb-item"><a href="allReservations.php">Reservations List</a></li>
                        <?php
                            }
                            //Check user is logged as a receptionist 
                            elseif (isset($_SESSION['receptionistID'])) { ?>
                                <li class="breadcrumb-item"><a href="allReservations.php">Reservations List</a></li>

                        <?php } ?>

                        <li class="breadcrumb-item"><a href="addReservation.php" style="color: #42ecf5;">Add Reservation</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="home-content">
            <div class="header"></br></br></br>
                <div class="box-1 table_topic">
                    <h2>Make new Reservation</h2>
                </div></br>
                <div class="box-1 table_topic">
                    <h3>Select the sports facility</h3>
                </div></br>
            </div>

            <div class="grid-container">

            <form action="calendarIndex.php" method="$_POST"> 
            <input type="hidden" id="FacilityID" name="FacilityID" value="Basketball"> 
                <div class="grid-item">
                <button><i class='bx bxs-basketball'></i>
                        <span class="links_name">&nbsp Basketball</span></button>
                </div>
            </form> 

            <form action="calendarIndex.php" method="$_POST"> 
            <input type="hidden" id="FacilityID" name="FacilityID" value="Table Tennis"> 
                <div class="grid-item">
                    <button><i class="fas fa-table-tennis"></i>
                        <span class="links_name">&nbspTable Tennis</span> </button>
                </div>
            </form> 

            <form action="calendarIndex.php" method="$_POST"> 
            <input type="hidden" id="FacilityID" name="FacilityID" value="Billiards"> 
                <div class="grid-item">
                    <button><i class='bx bx-bowling-ball'></i>
                        <span class="links_name">&nbsp Billiards</span></button>
                </div>
            </form> 

            <form action="calendarIndex.php" method="$_POST"> 
            <input type="hidden" id="FacilityID" name="FacilityID" value="Swimming">
                <div class="grid-item">
                    <button><i class='bx bx-water'></i>
                        <span class="links_name">&nbsp Swimming</span></button>
                </div>
            </form>

            <form action="calendarIndex.php" method="$_POST"> 
            <input type="hidden" id="FacilityID" name="FacilityID" value="Badminton">
                <div class="grid-item">
                    <button><img src="../../assets/Images/badmin.png" class="badmin"></img>
                        <span class="links_name">&nbsp Badminton</span></button>
                </div>
            </form>

            <form action="calendarIndex.php" method="$_POST"> 
            <input type="hidden" id="FacilityID" name="FacilityID" value="Volleyball">
                <div class="grid-item">
                    <button><i class="fas fa-volleyball-ball"></i>
                        <span class="links_name">&nbsp Volleyball</span></button>
                </div>
            </form>

            </div>

    </section>
</body>

</html>