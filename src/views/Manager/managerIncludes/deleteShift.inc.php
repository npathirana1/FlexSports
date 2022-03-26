<?php
session_start();

include("../../../config/db.php");

if (isset($_POST['submit'])) {

    $shift_id = $_POST['shift_id'];

    $dlt_user = "DELETE FROM emp_shift WHERE ShiftNo='$shift_id' ";
    $dlt_user_result = mysqli_query($conn, $dlt_user);

    if ($dlt_user_result) {
        echo "<script>
                alert('Shift has been successfully deleted');
                window.location.href='../viewShift.php';
            </script>";
    } else {
        echo "<script>alert('Could not delete the shift');</script>";
        echo "<script>window.location.href = '../viewShift.php';</script>";
    }
} elseif (isset($_POST['remove'])) {

    $shift_id = $_POST['shift_id'];

    $dlt_user = "DELETE FROM emp_shift WHERE ShiftNo='$shift_id' ";
    $dlt_user_result = mysqli_query($conn, $dlt_user);

    if ($dlt_user_result) {
        echo "<script>
                alert('Shift has been successfully deleted');
                window.location.href='../viewShift.php';
            </script>";
    } else {
        echo "<script>alert('Could not delete the shift');</script>";
        echo "<script>window.location.href = '../viewShift.php';</script>";
    }
}

mysqli_close($conn);
