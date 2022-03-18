<?php

include("../../../config/db.php");

if (isset($_POST['submit'])) {

    $FName = $_POST['FName'];
    $LName = $_POST['LName'];
    $Email = $_POST['Email'];
    $TelephoneNo = $_POST['TelephoneNo'];
    $NIC = $_POST['NIC'];

    $str = "abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*_+";
    $s_str = str_shuffle($str);
    $UserPsword = substr($s_str, 0, 8);

    $UserType = 'customer';

    if (!empty($_POST['FName']) && !empty($_POST['LName']) && !empty($_POST['Email']) && !empty($_POST['TelephoneNo'])) {
        //check for customers with same email
        $sql1 = "SELECT * FROM user_login WHERE Email='$Email' AND UserType='$UserType'";
        $user = mysqli_query($conn, $sql1);

        $sql2 = "SELECT * FROM customer WHERE NIC='$NIC'";
        $user1 = mysqli_query($conn, $sql2);

        //check for user with same NIC
        if (mysqli_num_rows($user1) > 0) {
            echo
            "<script>
                alert('Account already exists with this NIC');
                window.history.back();
            </script>";
        }
        //Validate email address
        elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            echo
            "<script>
                alert('Enter a valid email address');
                window.history.back();
            </script>";
        }
        //confirm password-not working

        //create account
        else {
            $hashedPwd = password_hash($UserPsword, PASSWORD_DEFAULT);

            $login_query = "INSERT INTO user_login (Email, UserPsword, UserType) VALUES ('$Email','$hashedPwd','$UserType')";
            $result1 = mysqli_query($conn, $login_query);

            $UserID = mysqli_insert_id($conn);

            if ($result1) {

                $query = "INSERT INTO customer (FName,LName,Email,TelephoneNo,NIC,UserPsword,UserID) VALUES ('$FName','$LName','$Email','$TelephoneNo','$NIC','$hashedPwd','$UserID')";
                $result = mysqli_query($conn, $query);

                if ($result) {


                    //Sending the confirmation email to the user 
                    $from = "nethmi.pathirana@gmail.com";
                    $mail_subject = 'FlexSports Customer Account';
                    $email_body   = "Message from FlexSports Administration: <br>";
                    $email_body   .= "<b>Login Credentials</b> {$fullname} <br>";
                    $email_body   .= "<b>User ID:</b> {$Email} <br>";
                    $email_body   .= "<b>Password:</b> {$UserPsword} <br>";
                    $email_body   .= "You can update your password upon logging in.<br>";

                    $header       = "From: {$from}\r\nContent-Type: text/html;";

                    $send_mail_result = mail($Email, $mail_subject, $email_body, $header);

                    echo "<script>
                            alert('Customer account has been successfully created');
                            window.location.href='../customerList.php';
                        </script>";
                } else {
                    echo "<script>alert('failed');</script>";
                    echo "<script>window.location.href = '../addCustomer.php';</script>";
                }
            }
        }
    } else {
        echo
        "<script>
            alert('empty fields');
            window.history.back();   
        </script>";
    }
}

mysqli_close($conn);
