<?php 

    include("../../../Config/db.php");

    if (isset($_POST['submit'])) {

        $FName = $_POST['FName'];
        $LName = $_POST['LName'];
        $Email = $_POST['Email'];
        $TelephoneNo = $_POST['TelephoneNo'];
        $NIC = $_POST['NIC'];
        $UserPsword = $_POST['UserPsword'];
        $UserType = 'customer';


        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            header("Location:../register.php?error=invalidemail");
            exit();
        }

        //elseif//password check

        elseif (isset($_POST['FName']) && isset($_POST['LName']) && isset($_POST['Email']) && isset($_POST['TelephoneNo']) && isset($_POST['NIC']) && isset($_POST['NIC']) && isset($_POST['UserPsword'])) {
            if (!empty($_POST['FName']) && !empty($_POST['LName']) && !empty($_POST['Email']) && !empty($_POST['TelephoneNo']) && !empty($_POST['NIC']) && !empty($_POST['NIC']) && !empty($_POST['UserPsword'])) {
                
                $hashedPwd = password_hash($UserPsword, PASSWORD_DEFAULT);

                $query = "INSERT INTO customer (FName,LName,Email,TelephoneNo,NIC,UserPsword) VALUES ('$FName','$LName','$Email','$TelephoneNo','$NIC','$hashedPwd')";
                
                $result = mysqli_query($conn, $query);

                if ($result) {

                    $login_query = "INSERT INTO user_login (Email, UserPsword, UserType) VALUES ('$Email','$hashedPwd','$UserType')"; 
                    $result1 = mysqli_query($conn, $login_query);

                    echo "<script>
                            alert('Your Account has been successfully created');
                            window.location.href='./index.php';
                          </script>";
                    }

                else{
                    //registration fails if the same NIC is used more than once 
                    //add an alert for that
                        echo "<script>alert('failed');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                    }
                
            }else{
                echo "<script>alert('empty');</script>";
                echo "<script>window.location.href = '../registration.php';</script>";
            }
        }
    }


