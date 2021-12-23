<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Reports</title>
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <style>
            .reportBox {
                /*border-style: solid;*/
                border-radius: 5%;
                border-width: 0.1%;
                margin: 1%;
                margin-bottom: 5%;

            }

            .topRow {
                display: grid;
                grid-template-columns: 66% 33%;

            }

            .reservationUsers {
                float: left;
                margin-left: 2%;


            }

            .middleRow {
                display: grid;
                grid-template-columns: 33% 33% 33%;
            }

            .otherDetails {
                float: left;
                margin-left: 2%;
            }

            .Registration {
                float: left;

            }

            #reservationReport {
                transform: scale(0.9);
            }

            #report {
                height: 40px;
                width: 50%;
                font-size: 18px;
                background-color: #0F305B;
                color: #f1f1ff;
                text-align: center;
                border: none;
            }

            #report a,
            a:hover,
            a:focus,
            a:active {
                text-decoration: none;
                color: inherit;
            }

            /*text decorations of the reports*/
            .maintopic {
                font-size: 25px;
                font-weight: 500;
                padding-bottom: 5%;
            }

            .subtopic {
                font-size: 20px;
                font-weight: 300;
                padding-top: 5%;
            }

            .values {
                font-size: 35px;
                font-weight: 600;
            }

            .count {
                padding-left: 20%;
            }

            .userRow {
                padding-top: 25%;
            }

            td {
                font-size: 15px;
                font-weight: 500;
            }
        </style>

    </head>

    <body>

        <?php include "managerIncludes/managerNavigation.php"; ?>

        <section class="home-section">
            <nav>
                <div class="sidebar-button">
                    <!-- <i class='bx bx-menu sidebarBtn'></i> -->
                    <span class="dashboard">Reports</span>
                    <div>
                        <ul class="breadcrumb">

                            <li>Reports /</li>
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
                <!--span onclick="goBack()" style="float: right;" class="go_back">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </span-->
                <div>
                    <div class="topRow">
                        <div class="reportBox reservationUsers">
                            <div class="maintopic">Reservation
                            </div>
                            <div id="reservationReport">
                                <div class="top-sales box">
                                    <div id="mybar"></div>
                                    <script src="../../assets/JS/reservationSummary.js"></script>
                                </div>
                            </div>
                        </div>
                        <div class="reportBox reservationUsers">
                            <div style="margin-bottom: 20%; text-align:right;">
                                <button type="submit" id="report">
                                    <a href="#report" download><i class='bx bxs-arrow-to-bottom' style="color: #f1f1f1"></i> Generate Report
                                    </a>
                                </button>
                            </div>
                            <br>

                            <span class="maintopic">Users</span><br>
                            <table border="0">
                                <tr class="userRow">
                                    <td>Customers</td>
                                    <td class="count">30</td>
                                </tr>
                                <tr class="userRow">
                                    <td>Manager</td>
                                    <td class="count">2</td>
                                </tr>
                                <tr class="userRow">
                                    <td>Receptionist</td>
                                    <td class="count">4</td>
                                </tr>
                                <tr class="userRow">
                                    <td>Facility Worker</td>
                                    <td class="count">24</td>
                                </tr>
                                <tr class="userRow">
                                    <td class="subtopic">Total no. of Users</td>
                                    <td class="values count">60</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                    <div class="middleRow">
                        <div class="reportBox otherDetails">
                            <span class="maintopic">Recervation Summary</span><br><br>
                            <span class="subtopic">Total number of Reservetions Made</span><br>
                            <center> <span class="values">25</span><br></center>
                            <span class="subtopic">Total number of Reservetions Cancled</span><br>
                            <center><span class="values">2</span></center>
                        </div>
                        <div class="reportBox otherDetails">
                            <div>
                                <div class="maintopic">Inquires Recieved
                                </div>
                                <div id="noInquiry"></div>
                                <script src="../../assets/JS/inqCount.js"></script>
                            </div>
                            <div>
                                <span class="subtopic">Total No. of Inquires Recieved</span>
                                <center><span class="values">13</span></center>
                            </div>
                        </div>
                        <div class="reportBox otherDetails">
                            <div>
                                <div class="maintopic">Registrations
                                </div>
                                    <div id="myLine"></div>
                                    <script src="../../assets/JS/registraions.js"></script>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            </div>
        </section>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>