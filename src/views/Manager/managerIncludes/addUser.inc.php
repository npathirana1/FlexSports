<?php

include("../../../config/db.php");

if (isset($_POST['submit'])) {

    $FName = $_POST['fname'];
    $LName = $_POST['lname'];
    $Email = $_POST['email'];
    $TelephoneNo = $_POST['contactNo'];
    $NIC = $_POST['NIC'];
    $DOB = $_POST['DOB'];
    $Address = $_POST['address'];
    $Gender = $_POST['gender'];
    $UserType = $_POST['userType'];

    $str = "abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*_+";
    $s_str = str_shuffle($str);
    $UserPsword = substr($s_str, 0, 8);

    //$repeat = $_POST['UserPsword-repeat'];;
    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['contactNo']) && !empty($_POST['NIC']) && !empty($_POST['DOB']) && !empty($_POST['address']) && !empty($_POST['gender'])) {
        //check for customers with same email
        $sql1 = "SELECT * FROM user_login WHERE Email='$Email' AND UserType='$UserType'";
        $user = mysqli_query($conn, $sql1);

        $sql2 = "SELECT * FROM customer WHERE NIC='$NIC'";
        $user1 = mysqli_query($conn, $sql2);

        //check for user
        if (mysqli_num_rows($user) > 0) {
            echo
            "<script>
                alert('User already exists');
                window.location.href='../viewEmployee.php';
            </script>";
        }
        //check for user with same NIC
        elseif (mysqli_num_rows($user1) > 0) {
            echo
            "<script>
                alert('Account already exists with this NIC');
                window.location.href='../viewEmployee.php';
            </script>";
        }
        //Validate email address
        elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            echo
            "<script>
                alert('Enter a valid email address');
                window.location.href='../viewEmployee.php';
            </script>";
        }
        //confirm password-not working

        //create account
        else {
            $hashedPwd = password_hash($UserPsword, PASSWORD_DEFAULT);

            $login_query = "INSERT INTO user_login (Email, UserPsword, UserType) VALUES ('$Email','$hashedPwd','$UserType')";
            $result1 = mysqli_query($conn, $login_query);


            if ($result1) {
                $UserID = "SELECT ID FROM user_login WHERE Email='$Email' AND UserType='$UserType'"; //get the user id of the newly ceated user
                $result2 = mysqli_query($conn, $UserID);
                $row = mysqli_fetch_assoc($result2);
                $ID = $row["ID"]; //ASSIGN THE VALUE OF THE USER ID TO A VARIABLE
                if ($result2) {
                    if ($UserType == 'manager') { // enter user type manager users
                        $query = "INSERT INTO manager_staff (EmpID,NIC,FName,LName,Address,ContactNo,Email,Gender,DOB,UserPsword) VALUES ('$ID','$NIC','$FName','$LName','$Address','$TelephoneNo','$Email','$Gender','$DOB','$hashedPwd')";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            echo "<script>
                            alert('Manager account has been successfully created');
                            window.location.href='../viewEmployee.php';
                            
                            
                        </script>";
                        } else {
                            echo "<script>alert('failed');</script>";
                            echo "<script>window.location.href = '../viewEmployee.php';</script>";
                        }
                    } elseif ($UserType == 'receptionist') { // enter user type recptionist users
                        $query = "INSERT INTO receptionist_staff (EmpID,NIC,FName,LName,Address,ContactNo,Email,Gender,DOB,UserPsword) VALUES ('$ID','$NIC','$FName','$LName','$Address','$TelephoneNo','$Email','$Gender','$DOB','$hashedPwd')";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            $from = "sandaliboteju@gmail.com";
                            $mail_subject = 'FlexSports Receptionist Account';
                            $email_body   = "Message from FlexSports Administration: <br>";
                            $email_body   .= "<b>Login Credentials</b> {$fullname} <br>";
                            $email_body   .= "<b>User ID:</b> {$Email} <br>";
                            $email_body   .= "<b>Password:</b> {$UserPsword} <br>";
                            $email_body   .= "Kindly update your password upon logging in.<br>";

                            $header       = "From: {$from}\r\nContent-Type: text/html;";

                            $send_mail_result = mail($Email, $mail_subject, $email_body, $header);
                            echo "<script>
                            alert('Receptionist account has been successfully created');
                            window.location.href='../viewEmployee.php';
                            
                            
                        </script>";
                        } else {
                            echo "<script>alert('failed');</script>";
                            echo "<script>window.location.href = '../viewEmployee.php';</script>";
                        }
                    } elseif ($UserType == 'facilityworker') { // enter user type facility worker users
                        $query = "INSERT INTO facility_staff (EmpID,NIC,FName,LName,Address,ContactNo,Email,Gender,DOB,UserPsword) VALUES ('$ID','$NIC','$FName','$LName','$Address','$TelephoneNo','$Email','$Gender','$DOB','$hashedPwd')";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            echo "<script>
                            alert('Facility Worker account has been successfully created');
                            window.location.href='../viewEmployee.php';
                            
                            
                        </script>";
                        } else {
                            echo "<script>alert('failed');</script>";
                            echo "<script>window.location.href = '../viewEmployee.php';</script>";
                        }
                    }
                }
            }
        }
    } else {
        echo
        "<script>
            alert('empty fields');
            window.location.href = '../viewEmployee.php';
        </script>";
    }
} elseif (isset($_POST['update'])) {
    $ID = $_REQUEST["id"];
    $FName = $_POST['fname'];
    $LName = $_POST['lname'];
    $Email = $_POST['email'];
    $TelephoneNo = $_POST['contactNo'];
    $Address = $_POST['address'];
    $query1="SELECT UserType FROM user_login WHERE ID='$ID'";
    $exe1 = mysqli_query($conn, $query1);
    $row = mysqli_fetch_assoc($exe1);
    $UserType=  $row['UserType'];
    $sql1 = "SELECT Email FROM user_login WHERE Email='$Email' AND UserType='$UserType'";
    $user = mysqli_query($conn, $sql1);
    
    if ($UserType == 'manager') {
        $TableName = "manager_staff";
    } elseif ($UserType == 'receptionist') {
        $TableName = "receptionist_staff";
    } elseif ($UserType == 'facilityworker') {
        $TableName = "facility_staff";
    }

    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['contactNo']) && !empty($_POST['address'])) {
        //check for customers with same email


        $sql2 = "SELECT ContactNo FROM $TableName WHERE ContactNo=$TelephoneNo";
        $user1 = mysqli_query($conn, $sql2);

        //check for user
        if (mysqli_num_rows($user) >1) {
            echo
            "<script>
                alert('User already exists');
                window.location.href='../viewEmployee.php';
            </script>";
        }
        //check for user with same NIC
        elseif (mysqli_num_rows($user1) >1) {
            echo
            "<script>
                alert('User already exists with this Contact Number');
                window.location.href='../viewEmployee.php';
            </script>";
        }
        //Validate email address
        elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            echo
            "<script>
                alert('Enter a valid email address');
                window.location.href='../vieweEmployee.php';
            </script>";
        }
        //confirm password-not working

        //create account
        else {
            $query1 = "UPDATE $TableName SET FName= '$FName' , LName= '$LName' , Address='$Address', ContactNo= '$TelephoneNo', Email= '$Email' WHERE EmpID='$ID' ";
            $result1 = mysqli_query($conn, $query1);


            if ($result1) {
                echo "<script>
                            alert('Account Details successfully updated');
                            window.location.href='../viewEmployee.php';
                        </script>";
            } else {
                echo "<script>
                alert('Action Failed');
                window.location.href='../viewEmployee.php';
            </script>";
            }
        }
    } else {
        echo
        "<script>
            alert('empty fields');
            window.location.href = '../viewEmployee.php';
        </script>";
    }
}

mysqli_close($conn);
