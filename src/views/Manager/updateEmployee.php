<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            Update Employee
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <style>
            input[type=date],
            input[type=tel],
            input[type=email],
            input[type=text],
            input[type=password],
            select {
                width: 100%;
                padding: 10px;
                margin: 5px 0 22px 0;
                border: none;
                border-radius: none;
                background: #f1f1f1;
            }
        </style>
    </head>

    <body>
        <?php include "managerIncludes/ManagerNavigation.php"; ?>

        <section class="home-section">
            <nav>
                <div class="sidebar-button">
                    <!-- <i class='bx bx-menu sidebarBtn'></i> -->
                    <span class="dashboard">Employees</span>
                    <div>
                        <ul class="breadcrumb">
                            <li>Users</li>
                            <li><a href="viewEmployee.php">Employees</a></li>
                            <li>Update Employee</li>
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

                <form class="form_body" method="post">
                    <div class="form_box">
                        <p class="form_title">Update Details</p>
                        <div class="form_content">
                            <!--label>
                        NIC
                    </label-->
                            <input type="text" name="nic" placeholder="NIC">
                            <br />
                            <!--label>
                        First Name
                    </label-->
                            <input type="text" name="fname" placeholder="First Name">
                            <br />
                            <!--label>
                        Last Name
                    </label-->
                            <input type="text" name="lname" placeholder="Last Name">
                            <br />
                            <!--label>
                        Date of Birth
                    </label-->
                            <input type="date" name="DOB" placeholder="Date of Birth">
                            <br />
                            <!--label>
                        Gender
                    </label-->
                            <select>
                                <option name="gender" value="male">Male</option>
                                <option name="gender" value="female">Female</option>
                            </select>
                            <br />
                            <!--label>
                        Address
                    </label-->
                            <input type="text" name="address" placeholder="Address">
                            <br />
                            <!--label>
                        Contact No.
                    </label-->
                            <input type="tel" name="contactNo" placeholder="Contact Number">
                            <br />
                            <!--label>
                        Email
                    </label-->
                            <input type="email" name="email" placeholder="Email Address">
                            <br>
                            <input type="password" name="password" placeholder="New Password">
                        </div>
                        <div style="text-align:center; padding-top: 2%; padding-bottom: 2%;">
                            <button type="submit" class="submit_btn">
                                Submit
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </section>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>