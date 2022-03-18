<?php

include("../../../config/db.php");

if (isset($_POST['Accept'])) {
    $leaveNo= $_POST['Accept'];

    $Accquery1 = mysqli_query($conn, "UPDATE leave_request SET LeaveStatus='Approved' WHERE LeaveNo='$leaveNo' ");
    if ($Accquery1) {
        echo "<script>alert('Leave requested Accepted');
        window.location.href = '../handelLeave.php'; </script>";
    } else {
        echo "<script>alert('Action Failed');
        window.location.href = '../handelLeave.php';</script>";
    }
}elseif (isset($_POST['Reject'])) {
    $lNo= $_POST['Reject'];
    $Reason= $_POST['rejReason'];

    $Rejquery1 = mysqli_query($conn, "UPDATE leave_request SET RejectReason='$Reason', LeaveStatus='Declined' WHERE LeaveNo='$lNo' ");
    
    if ($Rejquery1) {
        echo "<script>alert('Leave requested has been rejected');
        window.location.href = '../handelLeave.php'; </script>";
    } else {
        echo "<script>alert('Action Failed');
        window.location.href = '../handelLeave.php';</script>";
    }
}

mysqli_close($conn);
