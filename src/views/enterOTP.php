<html>

<?php
// if (isset($_POST['enter-OTP'])) {
//     $otp_code = mysqli_real_escape_string($conn, $_POST['OTP']);
//     $check_code = "SELECT * FROM user_login WHERE Code = $otp_code";
//     $code_res = mysqli_query($conn, $check_code);

//     if (mysqli_num_rows($code_res) > 0) {
//         $fetch_data = mysqli_fetch_assoc($code_res);
//         $email = $fetch_data['email'];
//         $_SESSION['email'] = $email;

//         echo "<script type='text/javascript'>
//                     alert('Enter a new password to update');
//                     window.location.href='../views/enterOTP.php';           
//                     </script>";
//         exit();
//     }
// }
?>

<head>
    <meta charset="utf-8">
    <title>OTP</title>
    <link rel="stylesheet" type="text/css" href="../assets/CSS/login.css">
    <link rel="shortcut icon" type="image/png" href="../assets/Images/icon.png" />
</head>

<body>
    <div class="login-root">
        <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
            <div class="loginbackground box-background--white padding-top--64">
                <div class="loginbackground-shapes">
                    <!--The background shapes-->
                    <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                        <div class="box-root box-background--cyan" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                        <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                        <div class="box-root box-background--gray animationLeftRight tans3s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                        <div class="box-root box-background--cyan animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                        <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                        <div class="box-root box-background--gray animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                </div>
            </div>
            <!--Form placement-->
            <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
                <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
                    <h1>FlexSports</h1>
                </div>
                <div class="formbg-outer">
                    <div class="formbg">
                        <div class="formbg-inner padding-horizontal--48">
                            <div class="back-login">
                                <a href="login.php">Go back to login</a>
                            </div>
                            <span class="padding-bottom--15">Enter the OTP</span>
                            <!--Sign in form-->
                            <form action="../config/enterOTP.inc.php" method="post">
                                <div class="form_body">

                                    <input type="text" placeholder="Enter the One Time Password" name="OTP" id="email" required>
                                    <div>
                                        <input type="submit" class="form_btn" name="enter-OTP" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer-link padding-top--24">
                        <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
                            <span><a href="#">© FlexSports</a></span>
                            <span><a href="#">Contact</a></span>
                            <span><a href="#">Privacy & terms</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>