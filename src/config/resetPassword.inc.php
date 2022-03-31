<?php
include "db.php";

if (isset($_POST['forgot-password'])) {
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);

    if ($Email != "") {
        $sql_query = "SELECT * FROM user_login WHERE Email ='" . $Email . "' ";
        $result = mysqli_query($conn, $sql_query);

        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $code = rand(999999, 111111);
            $insert_code = "UPDATE user_login SET Code = '$code' WHERE Email = '$Email'";

            $run_query =  mysqli_query($conn, $insert_code);

            if ($run_query) {

                $from = "flexsports6@gmail.com";
                    $mail_subject = 'Password Reset for Flexsports Account';
                    $email_body   = "Please enter the below OTP to update your password: <br>";
                    $email_body   .= "<b>OTP:</b> {$code} <br>";

                    $header       = "From: {$from}\r\nContent-Type: text/html;";

                    $send_mail_result = mail($Email, $mail_subject, $email_body, $header);


                echo "<script type='text/javascript'>
                    alert('An OTP has been sent to this email address');
                    window.location.href='../views/enterOTP.php';           
                    </script>";
                exit();
            }
        } else {
            echo "<script type='text/javascript'>
                    alert('Invalid User Email');
                    window.history.back();           
                    </script>";
            exit();
        }
    }
} else {
    echo "<script type='text/javascript'>
    alert(Error');
    window.location.href='../views/forgotPassword.php';           
    </script>";
    exit();
}

if (isset($_POST['enter-OTP'])) {
    $otp_code = mysqli_real_escape_string($conn, $_POST['OTP']);
    $check_code = "SELECT * FROM user_login WHERE Code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);

    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;

        echo "<script type='text/javascript'>
                    alert('Enter a new password to update');
                    window.location.href='../views/enterOTP.php';           
                    </script>";
        exit();
    }
}

