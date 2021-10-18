<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            Facility Schedule
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
        <style>
            .radio-btn {
                padding-top: 1%;
                color: #666;
            }

            select{
                width: 25%;
                float: left;
                margin-left: 2%;
            }

        </style>
    </head>

    <body>
        <?php include "managerIncludes/ManagerNavigation.php"; ?>

        <section class="home-section">
            <nav>
                <div class="sidebar-button">
                    <!-- <i class='bx bx-menu sidebarBtn'></i> -->
                    <span class="dashboard">Facility Schedule</span>
                    <div>
                        <ul class="breadcrumb">
                            <li>Facility Schedule</li>
                            <li>Today's schedule</li>
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
                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>
                </span>
                <h2 class="form_title">Today's schedule for <span><script></script></span></h2>
                <div class="item3">
                    <div class="item4">
                        <div class="dropdown">
                            <label for="facility">Select Facility: </label>
                            <select name="facility" id="facility">
                                <option value="bb">Basketball</option>
                                <option value="bad">Badminton</option>
                                <option value="bill">Billiard</option>
                                <option value="tt">Table tennis</option>
                                <option value="volley">Volleyball</option>
                                <option value="swim">Swimming pool</option>


                            </select>
                        </div>
                    </div>
                    <div class="form-body">
                        <table class="table_view">
                            <thead>
                                <tr>
                                    <th>Facility</th>
                                    <th>Reservation Time</th>
                                    <th>Customer Name</th>

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

                </div>

            </div>
        </section>
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>