<?php
session_start();

include("../../../config/db.php");

if (isset($_POST['submit'])) {

    $FName = $_POST['fname'];
    $LName = $_POST['lname'];
    $Email = $_POST['email'];
    $TelephoneNo = $_POST['telNo'];
    $NIC = $_POST['nic'];

    $UserType = 'customer';

    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['telNo'])) {

        $sql2 = "SELECT * FROM customer WHERE NIC='$NIC'";
        $user1 = mysqli_query($conn, $sql2);
        $row_user1 = mysqli_fetch_assoc($user1);

        //check if the customer email is also being updated
        if ($row_user1["Email"] !=  $Email) {

            $sql2 = "SELECT * FROM customer WHERE Email='$Email'";
            $user1 = mysqli_query($conn, $sql2);

            if (mysqli_num_rows($user1)) {
                echo
                "<script>
                alert('An account already exists with this email');
                history.back(2);
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

            //create account
            else {

                $user_id = $row_user1["UserID"];
                $update_query = "UPDATE user_login SET Email='$Email' WHERE ID='$user_id'";
                $result1 = mysqli_query($conn, $update_query);

                if ($result1) {

                    $query = "UPDATE customer SET Email='$Email', FName='$FName', LName='$LName', TelephoneNo='$TelephoneNo' WHERE NIC='$NIC' ";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        echo "<script>
                            alert('Customer account has been successfully updated');
                            window.location.href='../customerList.php';
                        </script>";
                    } else {
                        echo "<script>alert('Update failed');</script>";
                        echo "<script>window.location.href = '../customerList.php';</script>";
                    }
                }
            }
        } else {
            $query1 = "UPDATE customer SET FName='$FName', LName='$LName', TelephoneNo='$TelephoneNo' WHERE NIC='$NIC' ";
            $result2 = mysqli_query($conn, $query1);

            if ($result2) {
                echo "<script>
                    alert('Customer account has been successfully updated');
                    window.location.href='../customerList.php';
                </script>";
            } else {
                echo "<script>alert('Update failed');</script>";
                echo "<script>window.location.href = '../customerList.php';</script>";
            }
        }
    } else {
        echo
        "<script>
            alert('empty fields');
            history.back();   
        </script>";
    }
}

mysqli_close($conn);
