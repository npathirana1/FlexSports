<?php
session_start();

include("../../../config/db.php");

if (isset($_SESSION['facilityworkerID'])) {
    $userEmail = $_SESSION['facilityworkerID'];
}
if (isset($_SESSION['managerID'])) {
    $userEmail = $_SESSION['managerID'];
}
if (isset($_SESSION['receptionistID'])) {
    $userEmail = $_SESSION['receptionistID'];
}

if (isset($_POST['submit'])) {

    $opwd = $_POST['oldPW'];
    $npwd = $_POST['newPW'];
    $cpwd = $_POST['rnewPW'];

    $u_query = "SELECT * FROM user_login WHERE Email='$userEmail' AND NOT UserType='customer' ";
    $u_result =  mysqli_query($conn, $u_query);
    $u_row = mysqli_fetch_assoc($u_result);

    $pwdCheck = password_verify($opwd, $u_row['UserPsword']);

    if ($pwdCheck == $u_row['UserPsword']) {

        $hashedPwd = password_hash($npwd, PASSWORD_DEFAULT);

        if ($npwd ==  $cpwd) {

            $update_userlogin = "UPDATE user_login SET UserPsword='$hashedPwd' WHERE Email='$userEmail' AND NOT UserType='customer'";
            $result_userlogin =  mysqli_query($conn, $update_userlogin);

            if ($result_userlogin) {
                if (isset($_SESSION['managerID'])) {
                    $u_mpwd = "UPDATE manager_staff SET UserPsword='$hashedPwd' WHERE Email='$userEmail' ";
                    $result_mpwd =  mysqli_query($conn, $u_mpwd);
                } else if (isset($_SESSION['receptionistID'])) {
                    $u_rpwd = "UPDATE receptionist_staff SET UserPsword='$hashedPwd' WHERE Email='$userEmail' ";
                    $result_rpwd =  mysqli_query($conn, $u_rpwd);
                } else {
                    $u_fpwd = "UPDATE facility_staff SET UserPsword='$hashedPwd' WHERE Email='$userEmail' ";
                    $result_fpwd =  mysqli_query($conn, $u_fpwd);
                }
                echo "<script type='text/javascript'>
                alert('Password successfully updated');
                window.location.href = '../staffProfile.php';           
                </script>";
            } else {
                echo "<script type='text/javascript'>
                alert('Failed to update password');
                window.history.back();              
                </script>";
            }
        } else {
            echo "<script type='text/javascript'>
            alert('Confirmation of new password failed');
            window.history.back();           
            </script>";
        }
    } else {
        echo "<script type='text/javascript'>
        alert('Incorrect password');
        window.location.href = '../staffProfile.php';  
        </script>";
    }
}

mysqli_close($conn);
