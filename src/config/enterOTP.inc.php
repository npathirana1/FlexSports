<?php
include "db.php";

if (isset($_POST['enter-OTP'])) {
    $otp_code = mysqli_real_escape_string($conn, $_POST['OTP']);
    $check_code = "SELECT * FROM user_login WHERE Code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);

    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['Email'];
        $_SESSION['Email'] = $email;

        echo "<script type='text/javascript'>
                    alert('Enter a new password to update');
                    window.location.href='../views/enterNewPassword.php';           
                    </script>";
        exit();
    }
}

