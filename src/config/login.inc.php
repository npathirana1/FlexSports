<?php
include "db.php";
session_start();

if (isset($_POST['login-submit'])) {

    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = mysqli_real_escape_string($conn, $_POST['UserPsword']);

    if ($Email != "" && $password != "") {

        //$pwdCheck = password_verify($password, $row['UserPsword']);

        $sql_query = "select * from user_login where Email ='" . $Email . "' ";
        $result = mysqli_query($conn, $sql_query);

        $count = mysqli_num_rows($result);

        //$row1 = mysqli_fetch_assoc($result);
        //$UserType = $row1['UserType'];


        if ($count > 0) {
            $row1 = mysqli_fetch_assoc($result);
            $UserType = $row1['UserType'];

            $pwdCheck = password_verify($password, $row1['UserPsword']);

            if ($pwdCheck === true) {

                if ($UserType == 'customer') {
                    unset($_SESSION['receptionistID']);
                    $_SESSION['customerEmail'] = $Email;
                    header('Location: home.php');
                    exit();
                } elseif ($UserType == 'receptionist') {
                    unset($_SESSION['customerID']);
                    $_SESSION['receptionistID'] = $Email;
                    header('Location: ../views/Receptionist/receptionistIndex.php');
                    exit();
                }
            }
        } else {
            echo "Invalid username";
            exit();
        }
    }
} else {
    header("Location: index.php?error=login unsuccessful");
    exit();
}

$conn->close();