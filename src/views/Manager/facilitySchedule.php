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
            .form_title {
                color: #0F305B;
            }

            .radio-btn {
                padding-top: 1%;
                color: #666;
            }

            select {
                width: 25%;
                float: left;
                margin-left: 2%;
            }

            .table_view {
                width: 60%;
                margin-left: 20%;
                padding-left: 0;
                margin-top: 5%;
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
                <h2 class="form_title">Today's schedule for: <span id="selfaci">
                        <script>
                            function getfacility() {
                                var facility = document.getElementById("facility").value;
                                switch (facility) {
                                    case 'basketball':
                                        document.getElementById("selfaci").innerHTML = "Basketball Court";
                                        openTable(facility);
                                        break;
                                    case 'badminton':
                                        document.getElementById("selfaci").innerHTML = "Badminton Court";
                                        openTable(facility);
                                        break;
                                    case 'billiards':
                                        document.getElementById("selfaci").innerHTML = "Billiards";
                                        openTable(facility);
                                        break;
                                    case 'tabletennis':
                                        document.getElementById("selfaci").innerHTML = "Table tennis Court";
                                        openTable(facility);
                                        break;
                                    case 'volleyball':
                                        document.getElementById("selfaci").innerHTML = "Volleyball Court";
                                        openTable(facility);
                                        break;
                                    case 'swimming':
                                        document.getElementById("selfaci").innerHTML = "Swimming Pool";
                                        openTable(facility);
                                        break;
                                }
                            }
                        </script>
                    </span></h2>

                <label for="facility" style="color:#0F305B; margin-left: 2%; margin-top:10%;">Select Facility: </label>
                <div class="dropdown">

                    <select name="facility" id="facility">
                        <option onclick="getfacility()" class="tablinks" value="basketball" selected="selected" id="defaultOpen">Basketball</option>
                        <option onclick="getfacility()" class="tablinks" value="badminton">Badminton</option>
                        <option onclick="getfacility()" class="tablinks" value="billiards">Billiards</option>
                        <option onclick="getfacility()" class="tablinks" value="tabletennis">Table tennis</option>
                        <option onclick="getfacility()" class="tablinks" value="volleyball">Volleyball</option>
                        <option onclick="getfacility()" class="tablinks" value="swimming">Swimming pool</option>


                    </select>
                </div>
                <!-- basketball facility schedule-->
                <div id="basketball" class="tabcontent">
                    <br>
                    <table class="table_view">
                        <thead>
                            <tr>
                                <th>Reservation Time</th>
                                <th>Facility</th>
                                <th>Customer Name</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10.00 am -11.00 am</td>
                                <td>Basketball Court</td>
                                <td>Saman Perera</td>

                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- badminton facility schedule-->
                <div id="badminton" class="tabcontent">
                    <br>
                    <table class="table_view">
                        <thead>
                            <tr>
                                <th>Reservation Time</th>
                                <th>Facility</th>
                                <th>Customer Name</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>6.00 pm - 7.00 pm</td>
                                <td>Badminton Court</td>
                                <td>Arun Fernando</td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- billiards facility schedule-->
            <div id="billiards" class="tabcontent">
                <br>
                <table class="table_view">
                    <thead>
                        <tr>
                            <th>Reservation Time</th>
                            <th>Facility</th>
                            <th>Customer Name</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>6.00 pm - 8.00 pm</td>
                            <td>Billiards</td>
                            <td>Kevin Gunathilake</td>

                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- tabletennis facility schedule-->
            <div id="tabletennis" class="tabcontent">
                <br>
                <table class="table_view">
                    <thead>
                        <tr>
                            <th>Reservation Time</th>
                            <th>Facility</th>
                            <th>Customer Name</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10.00 am - 11.00 am</td>
                            <td>Table tennis</td>
                            <td>Waruni Rathnayake</td>

                        </tr>
                        <tr>
                            <td>03.00 pm - 04.00 am</td>
                            <td>Table tennis</td>
                            <td>Asela Weeransinghe</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- volleyball facility schedule-->
            <div id="volleyball" class="tabcontent">
                <br>
                <table class="table_view">
                    <thead>
                        <tr>
                            <th>Reservation Time</th>
                            <th>Facility</th>
                            <th>Customer Name</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>8.00 am - 10.00 am</td>
                            <td>Volleyball</td>
                            <td>Ruwani Warnakulasooriya</td>

                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- swimming facility schedule-->
            <div id="swimming" class="tabcontent">
                <br>
                <table class="table_view">
                    <thead>
                        <tr>
                            <th>Reservation Time</th>
                            <th>Facility</th>
                            <th>Customer Name</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>3.00 pm - 4.00 pm</td>
                            <td>Swimming Pool</td>
                            <td>Samalya Gunawardana</td>

                        </tr>

                    </tbody>
                </table>
            </div>
            </div>
        </section>
        <script>
            function openTable(Period) {
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