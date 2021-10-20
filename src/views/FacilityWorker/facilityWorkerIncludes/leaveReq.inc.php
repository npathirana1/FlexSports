<?php

include("../../../config/db.php"); 

if (isset($_POST['leave-submit'])) {

    if (isset($_SESSION['facilityworkerID'])) {
        $Date = date('Y-m-d', strtotime($_POST["ldate"]));
        $LeaveType = $_POST['type'];
        $Description = $_POST['leavReason'];

        $staffEmail = $_SESSION['facilityworkerID'];

        $sqlID = "SELECT * from user_login where Email ='" . $staffEmail . "' ";
        $result = mysqli_query($conn, $sqlID);
        $row1 = mysqli_fetch_assoc($result);
        $userID = $row1['ID'];

        if (!empty($_POST['ldate']) && !empty($_POST['type']) && !empty($_POST['leavReason']) && !empty($_POST['time'])) {

            $Time = $_POST['time'];
            $query1 = "INSERT INTO leave_request (LDate,LeaveType,LDescription,EmpID,StartTime) VALUES ('$Date','$LeaveType','$Description','$userID','$Time')";
            $result1 = mysqli_query($conn, $query1);

            if ($result1) {
                echo "<script>
                            alert('Leave updated succesfully');
                            window.location.href='../fWLeaves.php';
                        </script>";
            }
        }
        elseif (!empty($_POST['ldate']) && !empty($_POST['type']) && !empty($_POST['leavReason'])) {
            
            $query2 = "INSERT INTO leave_request (LDate,LeaveType,LDescription,EmpID) VALUES ('$Date','$LeaveType','$Description','$userID')";
            $result2 = mysqli_query($conn, $query2);

            if ($result2) {
                echo "<script>
                            alert('Leave updated succesfully');
                            window.location.href='../fWLeaves.php';
                        </script>";
            }
        }else {
            echo
            "<script>
            alert('empty fields');
            window.location.href = '../fWLeaves.php';
        </script>";
        }
    }
}