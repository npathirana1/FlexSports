<?php
session_start();

include("../../../config/db.php");

if (isset($_POST['submit'])) {

    $user_id = $_POST['user_id'];
   // echo $user_id;

   /* $fetch_query = "SELECT * FROM customer WHERE NIC='$NIC'";
    $fetch_result = mysqli_query($conn, $fetch_query);
    $fetch_row = mysqli_fetch_assoc($fetch_result);
    $user_id = $fetch_row["UserID"];
*/
    $dlt_user = "DELETE FROM user_login WHERE ID='$user_id' ";
    $dlt_user_result = mysqli_query($conn, $dlt_user);

    if($dlt_user_result){
        // $query = "DELETE FROM $TableName WHERE EmpID='$user_id' ";
        // $result = mysqli_query($conn, $query);

        // if ($result) {
            echo "<script>
                alert('User account has been successfully deleted');
                window.location.href='../viewEmployee.php';
            </script>";
        } else {
            echo "<script>
            alert('Deletion Failed');
            window.location.href='../viewEmployee.php';
        </script>";
        }
    // }else{
    //     "<script>
    //             alert('Could not delete the user account');
    //             window.location.href='../viewEmployee.php';
    //         </script>";
    // }
}elseif (isset($_POST['remove'])) {

    $user_id = $_POST['user_id'];
    /*$NIC = $_POST['nic'];
    $fetch_userquery1="SELECT * FROM facility_staff WHERE NIC='$NIC'";
    $fetch_userresult1=mysqli_query($conn, $fetch_userquery1);
    if($fetch_userrow1=mysqli_fetch_assoc($fetch_userresult1)!= NULL){
        $UserType='facilityworker';
        $TableName='facility_staff';
        $user_id = $fetch_userrow1["EmpID"];

    }else{
        $fetch_userquery2="SELECT * FROM manager_staff WHERE NIC='$NIC'";
        $fetch_userresult2=mysqli_query($conn, $fetch_userquery2);
        if($fetch_userrow2=mysqli_fetch_assoc($fetch_userresult2)!= NULL){
            $UserType='manager';
            $TableName='manager_staff';
            $user_id = $fetch_userrow2["EmpID"];
        }else{
            $fetch_userquery3="SELECT * FROM receptionist_staff WHERE NIC='$NIC'";
            $fetch_userresult3=mysqli_query($conn, $fetch_userquery3);
            if($fetch_userrow2=mysqli_fetch_assoc($fetch_userresult2)!= NULL){
                $UserType='receptionist';
                $TableName='receptionist_staff';
                $user_id = $fetch_userrow3["EmpID"];
            }else{
                echo "<script>
                alert('User dosen't exist with the given NIC');
                window.location.href='../viewEmployee.php';
            </script>";

            }
        }

    }
    echo $UserType;
    echo $TableName;
    echo $user_id;
/*
    $fetch_query = "SELECT * FROM customer WHERE NIC='$NIC'";
    $fetch_result = mysqli_query($conn, $fetch_query);
    $fetch_row = mysqli_fetch_assoc($fetch_result);
    $user_id = $fetch_row["UserID"];*/

    $dlt_user = "DELETE FROM user_login WHERE ID='$user_id' ";
    $dlt_user_result = mysqli_query($conn, $dlt_user);

    if($dlt_user_result){
        // $query = "DELETE FROM $TableName WHERE EmpID='$user_id' ";
        // $result = mysqli_query($conn, $query);

        // if (!$result) {
            echo "<script>
                alert('User account has been successfully deleted');
                window.location.href='../viewEmployee.php';
            </script>";
        } else {
            echo "<script>
            alert('Deletion Failed');
            window.location.href='../viewEmployee.php';
        </script>";
        }
    // }else{
    //     "<script>
    //             alert('Could not delete the user account');
    //             window.location.href='../viewEmployee.php';
    //         </script>";
    // }
}

mysqli_close($conn);
