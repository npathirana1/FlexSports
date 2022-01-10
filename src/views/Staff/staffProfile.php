<?php
include "../../config/db.php";
?>


<?php if (isset($_SESSION['facilityworkerID'])) {
    $userEmail = $_SESSION['facilityworkerID'];
} ?>

<?php if (isset($_SESSION['managerID'])) {
    $userEmail = $_SESSION['managerID'];
} ?>

<?php if (isset($_SESSION['receptionistID'])) {
    $userEmail = $_SESSION['receptionistID'];
} ?>

<!doctype html>
<html lang="en">

<head>
    <title>My profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
</head>

<body>
    <?php
    //Check user login or not
    if (isset($_SESSION['managerID'])) {
        include "../Manager/managerIncludes/ManagerNavigation.php";
    } elseif (isset($_SESSION['receptionistID'])) {
        include "../Receptionist/receptionistIncludes/receptionistNavigation.php";
    } elseif (isset($_SESSION['facilityworkerID'])) {
        include "../FacilityWorker/facilityWorkerIncludes/sideNavigation.php";
    } ?>

    <section class="home-section">
        <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item" style="color: #fff;">My Profile</li>
                        <li class="breadcrumb-item"><a href="staffProfile.php" style="color: #42ecf5;">Account Settings</a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="home-content">
            <div class="pgrid-container">
                <div class="pitem1">Profile Settings</div>
                <div class="pitem2">
                    <img src="../../assets/Images/receptionist.png" class="rec"></img>
                    <p>Nethmi Pathirana</p>
                    <p style="font-size: 16px;">Role : Receptionist</p>
                </div>
                <div class="pitem3">
                    <h3>Personal Details</h3>
                    <table>
                        <tr>
                            <td>NIC &nbsp;</td>
                            <td>: 996130215V</td>
                        </tr>
                        <tr>
                            <td>Date of birth &nbsp;</td>
                            <td>: 22/04/1999</td>
                        </tr>
                        <tr>
                            <td>Address &nbsp;</td>
                            <td>: No. 25, Gajaba road, Gampaha</td>
                        </tr>
                        <tr>
                            <td>Contact Number &nbsp;</td>
                            <td>: 071 778 8422</td>
                        </tr>
                        <tr>
                            <td>Gender &nbsp;</td>
                            <td>: Female</td>
                        </tr>
                        <tr>
                            <td>Email address &nbsp;</td>
                            <td>: nethmi.pathirana@gmail.com</td>
                        </tr>
                    </table>
                </div>
                <div class="pitem4">
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