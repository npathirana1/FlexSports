<?php
include "../../config/db.php";
?>

<?php if (isset($_SESSION['managerID'])) {
    $userEmail = $_SESSION['managerID'];
}

if (isset($_SESSION['receptionistID'])) {
    $userEmail = $_SESSION['receptionistID'];
}
$today = date('Y-m-d');
?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/modal.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Today's Facility Schedule</title>

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

        #searchTime {
            background-image: url('../../assets/Images/searchIcon.png');
            background-size: 30px 30px;
            background-position: 5px 5px;
            background-repeat: no-repeat;
            width: 25%;
            height: 40px;
            font-size: 14px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            border-radius: 15px;
            margin-bottom: 12px;
            margin-right: 120px;
            float: right;
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
                        <li class="breadcrumb-item" style="color: #fff;">Today's Facility Schedule /</li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="home-content">
            <div class="header"></br></br></br>
                <div class="box-1 table_topic">
                    <h2>Today's Facility Schedule - All facilities</h2>
                </div>
                <!-- <div class="box-2" style="float: right;"><button class="button reserve" onClick="window.location.href='addReservation.php';" style="padding:10px;">Add new reservation</button></div> -->
            </div>
            </br>

        </div>
        <div class="grid-container" style="margin-left: 10%;">
            <div class="grid-item item1"><input type="text" id="searchTime" placeholder="Search by timeslot.." title="facility" onkeyup="searchTime()"></div>
        </div>

        <br>
        <table>
            <?php
            $bresult = mysqli_query($conn, "SELECT * FROM reservation WHERE Date='$today';");
            $bcount = mysqli_num_rows($bresult);
            ?>
            <tr>
                <td style="font-size: large;color:#0F305B;"><strong>Total number of bookings for today: <?php echo $bcount; ?></strong></td>
            </tr>
        </table>

        <table style="width:90%;" class="table_view" id="todayRes">
            <thead>
                <tr>
                    <th style="width: 20%;">Time</th>
                    <th style="width: 10%;">Facility</th>
                    <th style="width: 14%;">Customer Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $today = date('Y-m-d', time());
                $viewRes = "SELECT * FROM reservation WHERE date = '$today' AND NOT ReservationStatus = 'Cancelled' ORDER BY FacilityName ASC ";
                $rResult = mysqli_query($conn, $viewRes);
                while ($rowRes = mysqli_fetch_assoc($rResult)) { ?>
                    <tr>
                        <td><?php echo $rowRes["timeslot"]; ?></td>
                        <td><?php echo $rowRes["FacilityName"]; ?></td>
                        <td><?php echo $rowRes["CustName"]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </section>
</body>

</html>

<script>
    function searchTime() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchTime");
        filter = input.value.toUpperCase();
        table = document.getElementById("todayRes");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>