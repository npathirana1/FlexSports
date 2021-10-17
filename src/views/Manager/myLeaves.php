<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            My Profile
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/leave.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
        <style>
            .home-section {
                padding-top: 0;
            }

            .leave {
                width: 150px;
                font-weight: bold;
                background-color: #0F305B;
            }

            .update {
                background-color: green;
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
        <?php include "managerIncludes/ManagerNavigation.php"; ?>

        <section class="home-section">
            <nav>
                <div class="sidebar-button">
                    <!-- <i class='bx bx-menu sidebarBtn'></i> -->
                    <span class="dashboard">My Leaves</span>
                    <div>
                        <ul class="breadcrumb">
                            <li>My Profile</li>
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
                <div class="header"></br></br></br>
                    <div class="box-1 table_topic">
                        <h2>Applied Leave</h2>
                    </div>
                    <div class="box-2" style="float: right;"><button class="button leave" onClick="window.location.href='leaveForm.php';" style="padding:10px;">Apply for leave</button></div>
                </div>
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
                                <td>4/2/2020</td>
                                <td>2/2/2020</td>
                                <td>Full day</td>
                                <td>Personal Reasons</td>
                                <td>Pending</td>
                                <td><button class="button update">Update</button></td>
                                <td><button class="button remove">Delete</button></td>
                            </tr>
                            <tr>
                                <td>4/2/2020</td>
                                <td>2/2/2020</td>
                                <td>Full day</td>
                                <td>Personal Reasons</td>
                                <td>Pending</td>
                                <td><button class="button update">Update</button></td>
                                <td><button class="button remove">Delete</button></td>
                            </tr>


                        </tbody>
                    </table>
                </div>

                <div id="Approved" class="tabcontent">

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
                                <td>4/2/2020</td>
                                <td>2/2/2020</td>
                                <td>Full day</td>
                                <td>Personal Reasons</td>
                                <td>Approved</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div id="Rejected" class="tabcontent">

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
                                <td>4/2/2020</td>
                                <td>2/2/2020</td>
                                <td>Full day</td>
                                <td>Personal Reasons</td>
                                <td>Rejected</td>
                                <td>The number of reservations are too high</td>
                            </tr>

                        </tbody>
                    </table>
                    </center>
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
            </div>
        </section>
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>