<?php
include("../../../config/db.php");

if (isset($_POST['submit'])) {

    if (isset($_SESSION['managerID'])) {
        $userEmail = $_SESSION['managerID'];
    } elseif (isset($_SESSION['receptionistID'])) {
        $userEmail = $_SESSION['receptionistID'];
    }elseif (isset($_SESSION['facilityworkerID'])) {
        $userEmail = $_SESSION['facilityworkerID'];
    }

    $leave_id = $_POST['leave_id'];

    // $get_EmpID = "SELECT * from user_login where Email ='" . $userEmail . "' ";
    // $result = mysqli_query($conn, $get_EmpID);
    // $row = mysqli_fetch_assoc($result);
    // $empid = $row['ID'];
    
    $cancel_l = "DELETE FROM leave_request WHERE LeaveNo ='$leave_id'";
    $result_l = mysqli_query($conn, $cancel_l);

    if ($result_l) {

        //Sending the confirmation email to the user 
        // $from = "nethmi.pathirana@gmail.com";
        // $mail_subject = 'FlexSports Customer Account';
        // $email_body   = "Message from FlexSports Administration: <br>";
        // $email_body   .= "<b>Login Credentials</b> {$fullname} <br>";
        // $email_body   .= "<b>User ID:</b> {$Email} <br>";
        // $email_body   .= "<b>Password:</b> {$UserPsword} <br>";
        // $email_body   .= "You can update your password upon logging in.<br>";

        // $header       = "From: {$from}\r\nContent-Type: text/html;";

        // $send_mail_result = mail($Email, $mail_subject, $email_body, $header);

        //     if (isset($_SESSION['managerID'])) {
                echo "<script>
                alert('Leave request has been successfully cancelled');
                window.location.href= '../personalLeave.php';
                </script>";
            // } 
            // if (isset($_SESSION['receptionistID'])) {
            //     echo "<script>
            //     alert('Customer account has been successfully created');
            //     window.location.href= '../Receptionist/customerList.php';
            //     </script>";
            // }

    } else {
        echo "<script>
            alert('failed');
            window.history.back();
            </script>";
    }
}