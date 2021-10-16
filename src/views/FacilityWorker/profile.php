<!doctype html>
<html lang="en">

<head>
    <title>My profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/profile.css">

    <style>
    .home-section .breadcrumb-nav {
            display: flex;
            justify-content: space-between;
            height: 30px;
            background: #fff;
            align-items: center;
            position: fixed;
            width: calc(100% - 240px);
            left: 240px;
            z-index: 100;
            padding: 0 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            transition: all 0.5s ease;
        }

       
        .home-section .content{
            padding-top: 5%;
            position: relative;
        }

        /* Display list items side by side */

ul.breadcrumb li {
    display: inline;
    font-size: 18px;
}


/* Add a slash symbol (/) before/behind each list item */

ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: "/\00a0";
}


/* Add a color to all links inside the list */

ul.breadcrumb li a {
    color: #01447e;
    text-decoration: none;
}


/* Add a color on mouse-over */

ul.breadcrumb li a:hover {
    color: #0a5ea8;
    text-decoration: underline;
}

  </style>

</head>

<body>
    <?php include "./facilityWorkerIncludes/sideNavigation.php"; ?>

    <section class="home-section">
    <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
            <div>
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item">Profile</li>
                    
                    
                    </ul> 
                </div>

            </div>
        </nav>

        <div class="content">

        <div class="grid-container">
            <div class="item1">My Profile</div>
            <div class="item2">
                <!--img src="../../assets/Images/receptionist.png" class="rec"></img-->
                <img src="profile.png" class="rec"></img>
                <p>Damitha Wickramasinghe</p>
                <p style="color:black; font-size:15px;"> Facility Worker</p>
            </div>
            <div class="item3">
                <h3>Profile Details</h3>
                <table>
                    <tr>
                        <td>NIC &nbsp;</td>
                        <td>: 99123456V</td>
                    </tr>
                    <tr>
                        <td>Date of birth &nbsp;</td>
                        <td>: 03/06/1999</td>
                    </tr>
                    <tr>
                        <td>Address &nbsp;</td>
                        <td>: Piliyandala Rd, Maharagama</td>
                    </tr>
                    <tr>
                        <td>Contact Number &nbsp;</td>
                        <td>: 075 679 3424</td>
                    </tr>
                    <tr>
                        <td>Gender &nbsp;</td>
                        <td>: Male</td>
                    </tr>
                    <tr>
                        <td>Email address &nbsp;</td>
                        <td>: damitha123@gmail.com</td>
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

</html>