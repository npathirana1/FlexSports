<?php
session_start();

include("../../../config/db.php");

if (isset($_POST['submit'])) {

    $NIC = $_POST['nic'];
    $UserType = 'customer';

    $fetch_query = "SELECT * FROM customer WHERE NIC='$NIC'";
    $fetch_result = mysqli_query($conn, $fetch_query);
    $fetch_row = mysqli_fetch_assoc($fetch_result);
    $user_id = $fetch_row["UserID"];

    $dlt_user = "DELETE FROM user_login WHERE ID='$user_id' ";
    $dlt_user_result = mysqli_query($conn, $dlt_user);

    if($dlt_user_result){
        $query = "DELETE FROM customer WHERE NIC='$NIC' ";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>
                alert('Customer account has been successfully deleted');
                window.location.href='../customerList.php';
            </script>";
        } else {
            echo "<script>alert('Deletion failed');</script>";
            echo "<script>window.location.href = '../customerList.php';</script>";
        }
    }else{
        echo "<script>alert('Could not delete the customer account');</script>";
        echo "<script>window.location.href = '../customerList.php';</script>";
    }
}

mysqli_close($conn);
