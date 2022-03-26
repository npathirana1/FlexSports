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

                <?php 
                         if (isset($_SESSION['managerID'])) {
                            $selectProf = "SELECT * FROM manager_staff WHERE EMAIL='$userEmail'";
                            $profResult = mysqli_query($conn, $selectProf);
                            $row = mysqli_fetch_assoc($profResult);
                            $role = "Manager";

                        }else if (isset($_SESSION['receptionistID'])) {
                            $selectProf = "SELECT * FROM receptionist_staff WHERE EMAIL='$userEmail'";
                            $profResult = mysqli_query($conn, $selectProf);
                            $row = mysqli_fetch_assoc($profResult);
                            $role = "Receptionist";
                        }else{
                            $selectProf = "SELECT * FROM facility_staff WHERE EMAIL='$userEmail'";
                            $profResult = mysqli_query($conn, $selectProf);
                            $row = mysqli_fetch_assoc($profResult);
                            $role = "Facility Worker";
                        }
                    ?>


                <div class="pitem2">
                    <img src="../../assets/Images/receptionist.png" class="rec"></img>
                    <p><?php echo $row["FName"] . " " . $row["LName"]; ?></p>
                    <p style="font-size: 16px;">Role : <?php echo $role; ?></p>
                </div>
                <div class="pitem3">
                    <h3>Personal Details</h3>
                    <table>
                        <tr>
                            <td>NIC &nbsp;</td>
                            <td>: <?php echo $row["NIC"]; ?> </td>
                        </tr>
                        <tr>
                            <td>Date of birth &nbsp;</td>
                            <td>: <?php echo $row["DOB"]; ?></td>
                        </tr>
                        <tr>
                            <td>Address &nbsp;</td>
                            <td>: <?php echo $row["Address"]; ?></td>
                        </tr>
                        <tr>
                            <td>Contact Number &nbsp;</td>
                            <td>: <?php echo $row["ContactNo"]; ?></td>
                        </tr>
                        <tr>
                            <td>Gender &nbsp;</td>
                            <td>: <?php echo $row["Gender"]; ?></td>
                        </tr>
                        <tr>
                            <td>Email address &nbsp;</td>
                            <td>: <?php echo $row["Email"]; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="pitem4">
                    <h3>Change Password</h3>
                    <form action="./staffIncludes/changePassword.inc.php" method="post" class="profSettings">
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