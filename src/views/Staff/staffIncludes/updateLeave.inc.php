<?php
session_start();

include("../../../config/db.php");

if (isset($_POST['leave-submit'])) {

    $ldate = $_POST['ldate'];
    $edate = $_POST['edate'];
    $desc = $_POST['leavReason'];
    $LeaveMode = $_POST['type1'];
    $id = $_POST['leaveID'];

    if ($LeaveMode == 'Casual') {
        if(!empty($_POST['ldate']) && !empty($_POST['leavReason'])) {
            $query1 = "UPDATE leave_request SET LDate='$ldate', LDescription='$desc' WHERE LeaveNo='$id' ";
            $result1 = mysqli_query($conn, $query1);

            if ($result1) {
                echo "<script>
                    alert('Leave status has been successfully updated');
                    window.location.href='../personalLeave.php';
                </script>";
            } else {
                echo "<script>alert('Update failed');</script>";
                echo "<script>window.location.href = '../personalLeave.php';</script>";
            }
        }
    }
    
    if ($LeaveMode == 'Annual'){
        if(!empty($_POST['ldate']) && !empty($_POST['leavReason'])  && !empty($_POST['edate'])) {
            $query2 = "UPDATE leave_request SET LDate='$ldate', EDate='$edate', LDescription='$desc' WHERE LeaveNo='$id' ";
            $result2 = mysqli_query($conn, $query2);

            if ($result2) {
                echo "<script>
                    alert('Leave status has been successfully updated');
                    window.location.href='../personalLeave.php';
                </script>";
            } else {
                echo "<script>alert('Update failed');</script>";
                echo "<script>window.location.href = '../personalLeave.php';</script>";
            }
        }
    }
}

mysqli_close($conn);
