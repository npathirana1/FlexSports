<?php
include "../../config/db.php";
?>

<?php if (isset($_SESSION['facilityworkerID'])) {
    $userEmail = $_SESSION['facilityworkerID'];
} ?>

<?php if (isset($_SESSION['managerID'])) {
    $userEmail = $_SESSION['managerID'];
} ?>

<?php if (isset($_SESSION['receptionistID'])) {
    $userEmail = $_SESSION['receptionistID'];
} ?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/modal.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Reservations</title>

    <style>
        .reserve {
            width: 150px;
            font-weight: bold;
            background-color: #0F305B;
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
    </style>

</head>

<body>

    <?php
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
                        <li class="breadcrumb-item"><a href="allReservations.php" style="color: #42ecf5;">Reservation List</a></li>
                        <!-- <li class="breadcrumb-item"><a href="../StaffReservation/addReservation.php">Add Reservation</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <div class="home-content">
            <div class="header"></br></br></br>
                <div class="box-1 table_topic">
                    <h2>Customer Reservations</h2>
                </div>
                <!-- <div class="box-2" style="float: right;"><button class="button reserve" onClick="window.location.href='addReservation.php';" style="padding:10px;">Add new reservation</button></div> -->
            </div>
            </br>
            <div class="tab">
                <button class="tablinks" onclick="openTable(event, 'Upcoming')" id="defaultOpen">Upcoming Reservation</button>
                <button class="tablinks" onclick="openTable(event, 'Past')">Past Reservation</button>
            </div>
            <div id="Upcoming" class="tabcontent">

                <div class="grid-container" style="margin-left: 110px;">
                    <div class="grid-item item1"><input type="text" id="search" placeholder="Search by facility.." title="facility"></div>
                    <div class="grid-item item2"><input type="text" id="search" placeholder="Search by date.." title="date"></div>
                </div>

                <table class="table_view">
                    <thead>
                        <tr>
                            <th>Reservation date</th>
                            <th>Time</th>
                            <th>Facility</th>
                            <th>Customer Name</th>
                            <th>Payment Status</th>
                            <th>Update</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>4/2/2020</td>
                            <td>10.30am-11.30am</td>
                            <td>Swimming - Lane 1</td>
                            <td>Nethmi Pathirana</td>
                            <td>Pending</td>
                            <td><button id="myBtn" class="button update">Update</button></td>
                            <td><button class="button remove">Delete</button></td>
                        </tr>
                        <tr>
                            <td>4/2/2020</td>
                            <td>5pm-6pm</td>
                            <td>Basketball</td>
                            <td>Sandali Boteju</td>
                            <td>Advance Paid</td>
                            <td><button id="myBtn" class="button update">Update</button></td>
                            <td><button class="button remove">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div id="Past" class="tabcontent">

                <div class="grid-container" style="margin-left: 110px;">
                    <div class="grid-item item1"><input type="text" id="search" placeholder="Search by facility.." title="facility"></div>
                    <div class="grid-item item2"><input type="text" id="search" placeholder="Search by customer name.." title="custName"></div>

                </div>

                <table class="table_view">
                    <thead>
                        <tr>
                            <th>Reservation date</th>
                            <th>Time</th>
                            <th>Facility</th>
                            <th>Customer Name</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>4/2/2020</td>
                            <td>10.30am-11.30am</td>
                            <td>Swimming - Lane 1</td>
                            <td>Nethmi Pathirana</td>
                            <td>Completed</td>
                        </tr>
                        <tr>
                            <td>4/2/2020</td>
                            <td>5pm-6pm</td>
                            <td>Basketball</td>
                            <td>Sandali Boteju</td>
                            <td>Completed</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="wrapper">
            <div class="icon add">
                <div class="tooltip">Add Reservation</div>
                <span><a href="../Staff/addReservation.php" class="link-1" id="modal-closed"><i class="fas fa-plus" style="font-size: 25px;"></i></a></span>
            </div>
        </div>

        <script>
            function openTable(evt, Period) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(Period).style.display = "block";
                evt.currentTarget.className += " active";
            }

            document.getElementById("defaultOpen").click();
        </script>

    </section>
</body>

</html>