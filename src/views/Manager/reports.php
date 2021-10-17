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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .form_title {
            color: #0F305B;
        }

        select {
            height: 2%;
            width: 50%;
            font-size: 18px;
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
            <span onclick="goBack()" style="float: right;" class="go_back">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </span>
            <!--h2 class="form_title">Reports</h2-->
            <div class="left">
                <div>
                    <div class="topic">This Weeks reservations</div>
                    <div class="top-sales box" style="height: 328px;">
                        <div class="wrapper">
                            <div class="container">
                                <div class="chart-wrapper">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <script src="../../assets/JS/charts.js"></script>
                    </div>
                </div>
                <div>
                    <div class="topic">Monthly Customer Registration</div>
                    <div class="top-sales box" style="height: 328px;">
                        <div class="wrapper">
                            <div class="container">
                                <div class="chart-wrapper">
                                    <canvas id="myLine"></canvas>
                                </div>
                            </div>
                        </div>

                        <script src="../../assets/JS/lineGraph.js"></script>
                    </div>
                </div>

            </div>

            <div class="right">
                <div>
                    <select>
                        <option value="" disabled selected>Select Section</option>
                        <option name="Reservation" value="reservation">Reservations</option>
                        <option name="Customers" value="customers">Customers</option>
                    </select>
                    <select placeholder="Select month">
                        <option name="" value="" disabled selected>Select Month</option>
                        <option name="January" value="Jan">January</option>
                        <option name="February" value="Feb">February</option>
                        <option name="March" value="Mar">March</option>
                        <option name="April" value="Apr">April</option>
                        <option name="May" value="May">May</option>
                        <option name="June" value="Jun">June</option>
                        <option name="July" value="Jul">July</option>
                        <option name="August" value="Aug">August</option>
                        <option name="September" value="Sep">September</option>
                        <option name="October" value="Oct">October</option>
                        <option name="November" value="Nov">November</option>
                        <option name="December" value="Dec">December</option>
                    </select>
                    <button type="submit" id="report">
                        <a href="#report" download><i class='bx bxs-arrow-to-bottom' style="color: #f1f1f1"></i> Generate Report
                        </a></button>
                </div>
            </div>
        </div>
    </section>

</html>
<?php
}else {
  header('Location: ../login.php');
}

?>