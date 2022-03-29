<?php

include("../../../config/db.php");

if (isset($_POST['Accept'])) {
    $leaveNo= $_POST['Accept'];
    $Midget=mysqli_query($conn,"SELECT * FROM user_login WHERE Email='$_SESSION[managerID]'");
    $Mget=mysqli_fetch_assoc($Midget);
    $manageID=$Mget['ID'];
    $Accquery1 = mysqli_query($conn, "UPDATE leave_request SET LeaveStatus='Approved', ManagerEmpID='$manageID' WHERE LeaveNo='$leaveNo' ");
    if ($Accquery1) {
        echo "<script>alert('Leave requested Accepted');
        window.location.href = '../handelLeave.php'; </script>";
    } else {
        echo "<script>alert('Action Failed');
        window.location.href = '../handelLeave.php';</script>";
    }
}elseif (isset($_POST['Reject'])) {
    $lNo= $_POST['leave_no'];
    $Reason= $_POST['rejReason'];
    $Mid=mysqli_query($conn,"SELECT ID FROM user_login WHERE Email='$_SESSION[managerID]'");
    $Getinfo=mysqli_fetch_assoc($Mid);
    $mID=$Getinfo['ID'];

    $Rejquery1 = mysqli_query($conn, "UPDATE leave_request SET RejectReason='$Reason', LeaveStatus='Declined', ManagerEmpID='$mID' WHERE LeaveNo='$lNo' ");
    
    if ($Rejquery1) {
        echo "<script>alert('Leave requested has been rejected');
        window.location.href = '../handelLeave.php'; </script>";
    } else {
        echo "<script>alert('Action Failed');
        window.location.href = '../handelLeave.php';</script>";
    }
}

mysqli_close($conn);
