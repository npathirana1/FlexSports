<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            Apply for Leave
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <style>
            .radio-btn {
                padding-top: 1%;
                color: #666;
            }

            label,
            input[type="radio"] {
                color: #666;
                font-weight: 900;
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
                            <li><a href="./myLeaves.php">My Leaves</a></li>
                            <li>Apply for Leave</li>
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
                <form action="" method="post" class="form_body">
                    <div class="form_box">

                        <div class="form-header">
                            <h1 class="form_title"> Apply for leave</h1>
                        </div>
                        <div class="form_content">
                            <div class="form-body">
                                <div class="form-group-left">
                                    <label for="ldate">Leave Date</label>
                                    <input type="date" id="ldate" name="ldate" value="" style="height:35px; width:300px;">
                                </div>

                                <div class="radio-btn">
                                    <label for="ltype">Leave Mode</label>&nbsp; &nbsp; &nbsp;
                                    <input type="radio" id="type1" name="type1" value="Casual" onclick="leaveMode(0)" />
                                    <label for="type1"> Casual</label>
                                    <input type="radio" id="type1" name="type1" value="Annual" onclick="leaveMode(1)" />
                                    <label for="type2"> annual</label><br>
                                </div>

                                <div>
                                    <div class="form-group-left" id="eDate" style="display:none">
                                        <label for="edate">End Date</label>
                                        <input type="date" id="edate" name="edate" value="" style="height:35px; width:300px;">
                                    </div>

                                    <div id="casual" style="display:none">
                                        <div class="radio-btn">
                                            <label for="">Leave Type</label>&nbsp; &nbsp; &nbsp;
                                            <input type="radio" name="type" value="FullDay" onclick="leaveTime(1)" />
                                              <label for="">Full Day</label>
                                            <input type="radio" name="type" value="HalfDay" id="hday" onclick="leaveTime(0)" />
                                              <label for="">Half Day</label>
                                        </div>

                                        <div class="form-group" id="time" style="display:none">
                                            <label for="start-time">Start Time</label> </br>
                                            <input style="min-width:422px; min-height:43px; margin-top:4px;" type="time" name="time" class="form-control" min="06:00" max="22:00">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for=""></label>
                                    <input type="text" placeholder="Reason for leave" name="leavReason" class="form-control">
                                </div>

                            </div>

                        </div>

                        <div class="form-footer" style="text-align:center; padding-bottom: 2%; margin:2%;">
                            <center>
                                <button type="submit" name="submit" class="submit_btn">Apply for leave</button>
                            </center>
                        </div>

                </form>

            </div>
        </section>
        <script>
            function leaveTime(x) {
                if (x == 0) document.getElementById("time").style.display = "block";
                else document.getElementById("time").style.display = "none";
                return;
            }

            function leaveMode(y) {
                if (y == 0) {
                    document.getElementById("casual").style.display = "block";
                    document.getElementById("eDate").style.display = "none";
                } else {
                    document.getElementById("eDate").style.display = "block";
                    document.getElementById("casual").style.display = "none";
                }
                return;
            }
        </script>

    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>