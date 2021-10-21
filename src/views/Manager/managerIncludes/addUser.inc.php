<?php

include("../../../config/db.php");

if (isset($_POST['submit'])) {

    $FName = $_POST['fname'];
    $LName = $_POST['lname'];
    $Email = $_POST['email'];
    $TelephoneNo = $_POST['contactNo'];
    $NIC = $_POST['NIC'];
    $DOB = $_POST['DOB'];
    $UserPsword = $_POST['UserPsword'];
    $Address = $_POST['address'];
    $Gender = $_POST['gender'];
    $UserType = $_POST['userType'];
    //$repeat = $_POST['UserPsword-repeat'];;
    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['contactNo']) && !empty($_POST['NIC']) && !empty($_POST['DOB']) && !empty($_POST['UserPsword']) && !empty($_POST['address']) && !empty($_POST['gender'])) {
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
                window.location.href='../addEmployee.php';
            </script>";
        }
        //check for user with same NIC
        elseif (mysqli_num_rows($user1) > 0) {
            echo
            "<script>
                alert('Account already exists with this NIC');
                window.location.href='../addEmployee.php';
            </script>";
        }
        //Validate email address
        elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            echo
            "<script>
                alert('Enter a valid email address');
                window.location.href='../addEmployee.php';
            </script>";
        }
        //confirm password-not working

        //create account
        else {
            $hashedPwd = password_hash($UserPsword, PASSWORD_DEFAULT);

            $login_query = "INSERT INTO user_login (Email, UserPsword, UserType) VALUES ('$Email','$hashedPwd','$UserType')";
            $result1 = mysqli_query($conn, $login_query);


            if ($result1) {
                $UserID = "SELECT ID FROM user_login WHERE Email='$Email' AND UserType='$UserType'";//get the user id of the newly ceated user
                $result2 = mysqli_query($conn, $UserID);
                $row = mysqli_fetch_assoc($result2);
                $ID = $row["ID"];//ASSIGN THE VALUE OF THE USER ID TO A VARIABLE
                if ($result2) {
                    if ($UserType == 'manager') {// enter user type manager users
                        $query = "INSERT INTO manager_staff (EmpID,NIC,FName,LName,Mail,ContactNo,Email,Gender,DOB,UserPsword) VALUES ('$ID','$NIC','$FName','$LName','$Address','$TelephoneNo','$Email','$Gender','$DOB','$hashedPwd')";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            echo "<script>
                            window.location.href='../viewEmployee.php';
                            alert('Manager account has been successfully created');
                            
                        </script>";
                        } else {
                            echo "<script>alert('failed');</script>";
                            echo "<script>window.location.href = '../addEmployee.php';</script>";
                        }
                    }elseif ($UserType == 'receptionist') {// enter user type recptionist users
                        $query = "INSERT INTO receptionist_staff (EmpID,NIC,FName,LName,Address,ContactNo,Email,Gender,DOB,UserPsword) VALUES ('$ID','$NIC','$FName','$LName','$Address','$TelephoneNo','$Email','$Gender','$DOB','$hashedPwd')";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            echo "<script>
                            window.location.href='../viewEmployee.php';
                            alert('Receptionist account has been successfully created');
                            
                        </script>";
                        } else {
                            echo "<script>alert('failed');</script>";
                            echo "<script>window.location.href = '../addEmployee.php';</script>";
                        }
                    }elseif ($UserType == 'facilityworker') {// enter user type facility worker users
                        $query = "INSERT INTO facility_staff (EmpID,NIC,FName,LName,Address,ContactNo,Email,Gender,DOB,UserPsword) VALUES ('$ID','$NIC','$FName','$LName','$Address','$TelephoneNo','$Email','$Gender','$DOB','$hashedPwd')";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            echo "<script>
                            window.location.href='../viewEmployee.php';
                            alert('Facility Worker account has been successfully created');
                            
                        </script>";
                        } else {
                            echo "<script>alert('failed');</script>";
                            echo "<script>window.location.href = '../addEmployee.php';</script>";
                        }
                    }
                }
            }
        }
    } else {
        echo
        "<script>
            alert('empty fields');
            window.location.href = '../addEmployee.php';
        </script>";
    }
}

mysqli_close($conn);
