<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            Shift Management
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/modal.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

        <style>
            table {
                width: 50%;
            }

            td {

                padding: 2%;
                text-align: left;
            }
        </style>

    </head>

    <body>
        <?php include 'managerIncludes/ManagerNavigation.php'; ?>
        <section class="home-section">
            <nav class="breadcrumb-nav">
                <div class="top-breadcrumb">
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" style="color:#fff;">Shifts</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <!--<img src="images/profile.jpg" alt="">-->
                    <span class="admin_name"><?php echo $_SESSION['managerID']; ?></span>
                    <!--i class='bx bx-chevron-down'></i-->
                </div>

            </nav>

            <div class="home-content" style="padding-top: 10%; margin-left: 0;">
                <div class="tab">
                    <button class="tablinks" onclick="openTable(event, 'today')" id="defaultOpen">Today</button>
                    <button class="tablinks" onclick="openTable(event, 'thisweek')">This Week</button>
                </div>
                <div id="today" class="tabcontent" style="padding-top:5%;">
                    <h2>Todays' Shift</h2>
                    <table>
                        <tr>
                            <td><strong>Manager:</strong></td>
                            <td>Sandali Boteju</td>
                            <td></td>
                            <td>071 4546854</td>
                        </tr>
                        <tr style="margin-top: 7%;">
                            <td><strong>Reception:</strong></td>
                            <td><strong>Morning:</strong></td>
                            <td>Sandali Boteju</td>
                            <td>071 4546854</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><strong>Evening:</strong></td>
                            <td>Sandali Boteju</td>
                            <td>071 4546854</td>
                        </tr>

                    </table>
                    <center>
                        
                        <table class="table_view" style="width:90%; ">
                            <thead>
                                <tr>
                                    <th style="width: 15%;">Facility</th>
                                    <th style="width: 15%;">Shift</th>
                                    <th style="width: 30%;">Employee Name</th>
                                    <th style="width: 15%;">Contact No</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Basket Ball</td>
                                    <td>Morning</td>
                                    <td>Vihara De Silva</td>
                                    <td>011 2336 325</td>
                                    <td style="text-align:center;">
                                        <a href="./updateShift.php">
                                            <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                                            </button>
                                        </a>
                                        <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Basketball</td>
                                    <td>Evening</td>
                                    <td>Bawantha Perera</td>
                                    <td>011 2546 325</td>
                                    <td style="text-align:center;">
                                        <a href="./updateShift.php">
                                            <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                                            </button>
                                        </a>
                                        <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Volleyball</td>
                                    <td>Morning</td>
                                    <td>Rohana Perera</td>
                                    <td>011 2546 998</td>
                                    <td style="text-align:center;">
                                        <a href="./updateShift.php">
                                            <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                                            </button>
                                        </a>
                                        <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </center>

                </div>
                <div id="thisweek" class="tabcontent" style="padding-top:5%;">
                    <h2>This Weeks' Shifts</h2>
                    <center>
                    <?php
                        //check the current day
                        if (date('D') != 'Mon') {
                            //take the last monday
                            $staticstart = date('Y-m-d', strtotime('last Monday'));
                        } else {
                            $staticstart = date('Y-m-d');
                        }

                        //always next saturday

                        if (date('D') != 'Sat') {
                            $staticfinish = date('Y-m-d', strtotime('next Saturday'));
                        } else {

                            $staticfinish = date('Y-m-d');
                        }

                        $query1= mysqli_query($conn,"SELECT * FROM 'emp_shift' WHERE Date >=' $staticstart' && Date <='$staticfinish'");
                        $ShiftData=mysqli_fetch_assoc($runQ1);
                        if (mysqli_num_rows($ShiftData) > 0) {
                            $i = 0;
                            while ($row = mysqli_fetch_array($ShiftData)) {
                                $EmpID = $row["EmpID"];
                                $FaciID= $row["FacilityNo"];
                                $query2=mysqli_query($conn,"SELECT UserType FROM user_login WHERE ID='$EmpID'");
                                $row2 = mysqli_fetch_assoc($query2);
                                    $UserType = $row2["UserType"];
                                    if ($UserType == 'manager') {
                                        $query3=;//start from here
                                    } elseif ($UserType == 'receptionist') {
                                        $UserType = "Receptionist";
                                    } elseif ($UserType == 'facilityworker') {
                                        $UserType = "Faclility Worker";
                                    }
                        ?>
                        <table class="table_view" style="width:90%; ">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">Facility</th>
                                    <th style="width: 15%;">Date</th>
                                    <th style="width: 15%;">Shift</th>
                                    <th style="width: 25%;">Employee Name</th>
                                    <th style="width: 15%;">Contact No</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $row["FacilityName"]; ?></td>
                                    <td><?php echo $row["Date"]; ?></td>
                                    <td><?php echo $row["Shift"]; ?></td>
                                    <td><?php echo $row["EmployeeName"]; ?></td>
                                    <td><?php echo $row["ContactNumber"]; ?></td>
                                    <td style="text-align:center;">
                                        <a href="./updateShift.php">
                                            <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                                            </button>
                                        </a>
                                        <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Basketball</td>
                                    <td>10/02/2021</td>
                                    <td>Evening</td>
                                    <td>Bawantha Perera</td>
                                    <td>011 2546 325</td>
                                    <td style="text-align:center;">
                                        <a href="./updateShift.php">
                                            <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                                            </button>
                                        </a>
                                        <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Billiards</td>
                                    <td>11/02/2021</td>
                                    <td>Morning</td>
                                    <td>Rohana Perera</td>
                                    <td>011 2546 998</td>
                                    <td style="text-align:center;">
                                        <a href="./updateShift.php">
                                            <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                                            </button>
                                        </a>
                                        <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </div>
                <div class="wrapper">
                    <div class="icon add">
                        <div class="tooltip">Add Shift</div>
                        <span><a href="./addShifts3.php" class="link-1" id="modal-closed"><i class="fas fa-plus" style="font-size: 25px;"></i></a></span>
                    </div>
                </div>
            </div>
        </section>
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
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>