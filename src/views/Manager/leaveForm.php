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
                                    <input placeholder="Leave Date" type="text" onfocus="(this.type = 'date')" id="date" name="ldate" value="">
                                </div>

                                <div class="radio-btn">
                                    <label for="ltype">Leave Mode</label>&nbsp; &nbsp; &nbsp;
                                    <input type="radio" id="type1" name="type1" value="Casual">
                                    <label for="type1"> Casual</label>
                                    <input type="radio" id="type2" name="type1" value="annual">
                                    <label for="type2"> Annual</label><br><br>
                                </div>

                                <div class="radio-btn">
                                    <label for="ltype">Leave Type</label>&nbsp; &nbsp; &nbsp;
                                    <input type="radio" id="ltype1" name="type2" value="Full Day">
                                      <label for="ltype1">Full Day</label>
                                    <input type="radio" id="ltype2" name="type2" value="Half Day">
                                      <label for="ltype2">Half Day</label><br><br>
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
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>