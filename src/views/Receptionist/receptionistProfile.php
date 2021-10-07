<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/profile.css" />
</head>

<body>
<?php include "./receptionistIncludes/receptionistNavigation.php"; ?>

<section class="home-section">
    <div class="grid-container">
        <div class="item1">My Profile</div>
        <div class="item2">
            <img src="../../assets/Images/receptionist.png" class="rec"></img>
            <p>Nethmi Pathirana</p>
        </div>
        <div class="item3">
            <h3>Profile Details</h3>
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
</section>
</html>