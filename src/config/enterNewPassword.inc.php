<?php
include "db.php";

if (isset($_POST['enter-newpwd'])) {
    $password = $_POST['pwd'];
    $cpassword = $_POST['cpwd'];
    $email = $_POST['email'];

    if (!empty($_POST['pwd']) && !empty($_POST['cpwd'])) {
        if ($password   == $cpassword) {
            $sql1 = "SELECT * FROM user_login WHERE Email='$email' ";
            $user = mysqli_query($conn, $sql1);
            $result = mysqli_fetch_assoc($user);

            if ($result) {
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                $pwd_query = "UPDATE user_login SET UserPsword='$hashedPwd' WHERE Email='$email'";
                $result1 = mysqli_query($conn, $pwd_query);

                if ($result1) {
                    echo "<script type='text/javascript'>
                    alert('Password successfully updated. Login with the new password');
                    window.location.href='../views/login.php';           
                    </script>";
                }
            }
        } else {
            echo "<script type='text/javascript'>
                    alert('Passwords do not match');
                    window.history.back();           
                </script>";
        }
    } else {
        echo
        "<script>
            alert('empty fields');
            window.history.back(); 
        </script>";
    }
}
