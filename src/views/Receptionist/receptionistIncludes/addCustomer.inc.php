<?php

include("../../../config/db.php");

if (isset($_POST['submit'])) {

    $FName = $_POST['FName'];
    $LName = $_POST['LName'];
    $Email = $_POST['Email'];
    $TelephoneNo = $_POST['TelephoneNo'];
    $NIC = $_POST['NIC'];
    $UserPsword = $_POST['UserPsword'];
    $repeat = $_POST['UserPsword-repeat'];
    $UserType = 'customer';

    if (!empty($_POST['FName']) && !empty($_POST['LName']) && !empty($_POST['Email']) && !empty($_POST['TelephoneNo']) && !empty($_POST['NIC']) && !empty($_POST['UserPsword']) && !empty($_POST['UserPsword-repeat'])) {
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
                window.location.href='../addCustomer.php';
            </script>";
        }
        //check for user with same NIC
        elseif (mysqli_num_rows($user1) > 0) {
            echo
            "<script>
                alert('Account already exists with this NIC');
                window.location.href='../addCustomer.php';
            </script>";
        }
        //Validate email address
        elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            echo
            "<script>
                alert('Enter a valid email address');
                window.location.href='../addCustomer.php';
            </script>";
        }
        //confirm password-not working
        elseif ( $_POST['UserPsword'] !== $_POST['UserPsword-repeat']) {
            echo
            "<script>
                alert('Passwords don't match');
                window.location.href='../addCustomer.php';
            </script>";
        }
        //create account
        else {
            $hashedPwd = password_hash($UserPsword, PASSWORD_DEFAULT);

            $login_query = "INSERT INTO user_login (Email, UserPsword, UserType) VALUES ('$Email','$hashedPwd','$UserType')";
            $result1 = mysqli_query($conn, $login_query);

            if ($result1) {

                $query = "INSERT INTO customer (FName,LName,Email,TelephoneNo,NIC,UserPsword) VALUES ('$FName','$LName','$Email','$TelephoneNo','$NIC','$hashedPwd')";
                $result = mysqli_query($conn, $query);

                if ($result) {
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
            window.location.href = '../addCustomer.php';
        </script>";
    }
}
