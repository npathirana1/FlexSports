<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            My Leaves
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/leave.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <style>
            .form_title {
                color: #0F305B;
            }

            .home-section {
                margin-top: 0;
            }

            .leave {
                width: 150px;
                font-weight: bold;
                background-color: #0F305B;
            }

            .update {
                background-color: green;
            }

            .home-content{
                margin-top: 5%;
            }

            .home-content .overview-boxes {
                display: flex;
                align-items: right;
                justify-content: space-between;
                flex-wrap: wrap;
                padding: 0 2%;
                margin-bottom: 26px;
                margin-right: 5%;
                margin-left: 5%;
                margin-top: 5%;
            }

            .overview-boxes .box {
                display: flex;
                align-items: center;
                justify-content: center;
                width: calc(100% / 4 - 15px);
                height: 150px;
                background: #fff;
                padding: 15px 14px;
                border-radius: 12px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            }

            .overview-boxes .box-topic {
                font-size: 20px;
                font-weight: 500;
            }

            .home-content .box .number {
                display: inline-block;
                font-size: 35px;
                margin-top: -6px;
                font-weight: 500;
            }

            .add_btn {
                margin-right: 2%;
            }

            a,
            a:hover,
            a:focus,
            a:active {
                text-decoration: none;
                color: inherit;
            }
        </style>
    </head>

    <body>
        <?php include "managerIncludes/ManagerNavigation.php"; ?>

        <section class="home-section">
            <nav>
                <div class="sidebar-button">
                    <!-- <i class='bx bx-menu sidebarBtn'></i> -->
                    <span class="dashboard">My Leaves</span>
                    <div>
                        <ul class="breadcrumb">
                            <li><a href="managerProfile.php">My Profile</a></li>
                            <li>My Leaves</li>
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
                <center>

                    <div class="header">
                        <div class="overview-boxes">
                            <div class="box">
                                <div class="right-side">
                                    <div class="box-topic">Casual Leaves available for this month</div>
                                    <div class="number">02</div>
                                    <div class="indicator">
                                        <i class='bx bxs-circle' style='color:#ea6f57'></i>
                                        <span class="text">Only 05 left for this year </span>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="right-side">
                                    <div class="box-topic">Annual Leaves available for this month</div>
                                    <div class="number">14</div>
                                    <div class="indicator">
                                        <i class='bx bxs-circle' style='color:#ea6f57'></i>
                                        <span class="text">Only 14 left for this Year </span>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="right-side">
                                    <div class="box-topic">Total leaves available for this Year</div>
                                    <div class="number">19</div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="color: #0F305B; width:75%; margin-bottom: 2%;">
                </center>



                <div class="box-1 table_topic">
                    <h2 class="form_title">Applied Leave</h2>
                </div>
                <button class="add_btn" onClick="window.location.href='leaveForm.php';">
                    Apply for leave
                </button>

                </br>

                <div class="tab">
                    <button class="tablinks" onclick="openTable(event, 'Pending')" id="defaultOpen">Pending Leave</button>
                    <button class="tablinks" onclick="openTable(event, 'Approved')">Approved Leave</button>
                    <button class="tablinks" onclick="openTable(event, 'Rejected')">Rejected Leave</button>

                </div>
                <div id="Pending" class="tabcontent">
                    <center>
                        <table class="table_view">
                            <thead>
                                <tr>
                                    <th>Leave date</th>
                                    <th>Requested date</th>
                                    <th>Leave type</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Update</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>04/06/2021</td>
                                    <td>31/05/2021</td>
                                    <td>Full day</td>
                                    <td>Personal Reasons</td>
                                    <td>Pending</td>
                                    <td><button class="button update"><a href="./updateLeave.php">Update</a></button></td>
                                    <td><button class="button remove">Delete</button></td>
                                </tr>
                                <tr>
                                    <td>04/02/2021</td>
                                    <td>02/02/2021</td>
                                    <td>Full day</td>
                                    <td>Personal Reasons</td>
                                    <td>Pending</td>
                                    <td><button class="button update"><a href="./updateLeave.php">Update</a></button></td>
                                    <td><button class="button remove">Delete</button></td>
                                </tr>


                            </tbody>
                        </table>
                    </center>
                </div>

                <div id="Approved" class="tabcontent">
                    <center>
                        <table class="table_view">
                            <thead>
                                <tr>
                                    <th>Leave date</th>
                                    <th>Requested date</th>
                                    <th>Leave type</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>26/02/2021</td>
                                    <td>02/02/2021</td>
                                    <td>Full day</td>
                                    <td>Personal Reasons</td>
                                    <td>Approved</td>
                                </tr>

                            </tbody>
                        </table>
                    </center>
                </div>

                <div id="Rejected" class="tabcontent">
                    <center>
                        <table class="table_view">
                            <thead>
                                <tr>
                                    <th>Leave date</th>
                                    <th>Requested date</th>
                                    <th>Leave type</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Rejected reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>03/03/2021</td>
                                    <td>02/03/2021</td>
                                    <td>Full day</td>
                                    <td>Personal Reasons</td>
                                    <td>Rejected</td>
                                    <td>The number of reservations are too high</td>
                                </tr>

                            </tbody>
                        </table>
                    </center>

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
            </div>
        </section>
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>