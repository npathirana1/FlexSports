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
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/profile.css">
        <style>
         .home-section {
            padding-top: 0;
        }
        </style>
    </head>

    <body>
        <?php include "managerIncludes/ManagerNavigation.php"; ?>

        <section class="home-section">
            <nav>
                <div class="sidebar-button">
                    <!-- <i class='bx bx-menu sidebarBtn'></i> -->
                    <span class="dashboard">My Profile</span>
                    <div>
                        <ul class="breadcrumb">
                            <li>My Profile</li>
                            <li>Account Settings</li>
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
            
            <div class="grid-container">
                <div class="item1">My Profile</div>
                <div class="item2">
                    <img src="../../assets/Images/managerProfilePicture.jpg" class="rec"></img>
                    <p>Sandali Boteju</p>
                    <p style="font-size: 16px;">Role : Manager</p>
                </div>
                <div class="item3">
                    <h3>Profile Details</h3>
                    <table>
                        <tr>
                            <td>NIC &nbsp;</td>
                            <td>: 997952782V</td>
                        </tr>
                        <tr>
                            <td>Date of birth &nbsp;</td>
                            <td>: 21/10/1999</td>
                        </tr>
                        <tr>
                            <td>Address &nbsp;</td>
                            <td>: No. 554/3, Bokundara Road, Arewwala, Pannipitiya</td>
                        </tr>
                        <tr>
                            <td>Contact Number &nbsp;</td>
                            <td>: 071 454 6854</td>
                        </tr>
                        <tr>
                            <td>Gender &nbsp;</td>
                            <td>: Female</td>
                        </tr>
                        <tr>
                            <td>Email address &nbsp;</td>
                            <td>: sandaliboteju@gmail.com</td>
                        </tr>
                    </table>
                </div>
                <div class="item4">
                    <h3>Change Password</h3>
                    <form action="" method="post" class="profSettings">
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" placeholder="Enter the current password" name="oldPW" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" placeholder="Enter new password" name="newPW" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" placeholder="Re-enter the password" name="rnewPW" class="form-control">
                        </div>
                        <div>
                            <button type="submit" name="submit" class="changepsword">Update password</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </section>
</body>

</html>
<?php
}else {
  header('Location: ../login.php');
}

?>