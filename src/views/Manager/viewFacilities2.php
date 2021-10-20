<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!doctype html>
    <html lang="en">

    <head>
        <title>
            Manage Shifts
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
        <style>
            .form_title {
                color: #0F305B;
            }

            .table_view {
                border-collapse: collapse;
                margin: 55px 25px;
                font-size: 0.9em;
                min-width: 400px;
                border-radius: 5px 5px 0 0;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }

            option {
                width: 50px;
                height: 5px;
            }

            .table_view td {
                padding: 0 15px;
            }

            .table_view tbody tr td select {
                width: 100px;
                height: 25px;
                border: 1px solid #C4C4C4;
                border-radius: 5px;
                background-color: #FEFDFB;
                text-decoration: #0F305B;
                margin: 6%;
                padding: 0;
            }

            .table_view tbody tr td select:nth-of-type(even) {
                background-color: #E0E0E0;
                text-decoration: #0F305B;
                margin: 6%;
                padding: 0;
            }
        </style>
    </head>

    <body>
        <?php include 'managerIncludes/ManagerNavigation.php'; ?>
        <section class="home-section">
            <nav>
                <div class="sidebar-button">
                    <!-- <i class='bx bx-menu sidebarBtn'></i> -->
                    <span class="dashboard">Shift list</span>
                    <div>
                        <ul class="breadcrumb">
                            <li><a href="viewFacilities1.php">Shifts</a></li>
                            <li>Shift List</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <!--<img src="images/profile.jpg" alt="">-->
                    <span class="admin_name"><?php echo $_SESSION['managerID']; ?></span>
                    <!--i class='bx bx-chevron-down'></i-->
                </div>

            </nav>

            <div class="home-content">
                <span onclick="goBack()" style="float: right;" class="go_back">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </span>
                <h2 class="form_title" id="scheduleName">Shifts for:
                    <script>
                        var faciShift = sessionStorage.getItem("FACI");
                        if (faciShift == 'basketball') {
                            document.write('Basketball Court');
                            sessionStorage.removeItem('FACI');
                        }
                        if (faciShift == 'billiards') {
                            document.write('Billiards');
                            sessionStorage.removeItem('FACI');
                        }
                        if (faciShift == 'badminton') {
                            document.write('Badminton Court');
                            sessionStorage.removeItem('FACI');
                        }
                        if (faciShift == 'volleyball') {
                            document.write('Volleyball Court');
                            sessionStorage.removeItem('FACI');
                        }
                        if (faciShift == 'swimming') {
                            document.write('Swimming Pool');
                            sessionStorage.removeItem('FACI');
                        }
                        if (faciShift == 'tabletennis') {
                            document.write('Table tennis Court');
                            sessionStorage.removeItem('FACI');
                        }
                    </script>

                </h2>
                <a href="addShifts3.php"><button class="add_btn">
                        Add Shift
                    </button></a>
                <center>
                    <table class="table_view" style="width:90%; ">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Shift</th>
                                <th>Employee Name</th>
                                <th>Contact No</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10/02/2021</td>
                                <td>Morning</td>
                                <td>Vihara De Silva</td>
                                <td>011 2336 325</td>
                                <td>
                                    <select name="action" onchange="seletced_option(this.value)">
                                        <option value="updateEmployee">Update</option>
                                        <option value="delete">Delete</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>10/02/2021</td>
                                <td>Evening</td>
                                <td>Bawantha Perera</td>
                                <td>011 2546 325</td>
                                <td>
                                    <select name="action" onchange="seletced_option(this.value)">
                                        <option value="updateEmployee">Update</option>
                                        <option value="delete">Delete</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>11/02/2021</td>
                                <td>Morning</td>
                                <td>Rohana Perera</td>
                                <td>011 2546 998</td>
                                <td>
                                    <select name="action" onchange="seletced_option(this.value)">
                                        <option value="updateEmployee">Update</option>
                                        <option value="delete">Delete</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </center>
            </div>
    </body>
    <script>

    </script>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>