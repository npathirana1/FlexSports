<?php

include("../../../config/db.php");

if (isset($_POST['leave-submit'])) {

    $expression = $_SESSION['receptionistID'] || $_SESSION['managerID'] || $_SESSION['facilityworkerID'];

    if (isset($expression)) {

        if (isset($_SESSION['facilityworkerID'])) {
            $staffEmail = $_SESSION['facilityworkerID'];
        } elseif (isset($_SESSION['managerID'])) {
            $staffEmail = $_SESSION['managerID'];
        } else {
            $staffEmail = $_SESSION['receptionistID'];
        }

        $Date = date('Y-m-d', strtotime($_POST["ldate"]));
        $Description = $_POST['leavReason'];
        $LeaveMode = $_POST['type1'];
        $ApplyDate = date("Y-m-d");
        $Status = "Pending";

        //$staffEmail = $_SESSION['receptionistID'];

        $sqlID = "SELECT * from user_login where Email ='" . $staffEmail . "' ";
        $result = mysqli_query($conn, $sqlID);
        $row1 = mysqli_fetch_assoc($result);
        $userID = $row1['ID'];

        $find_same =  "SELECT * from leave_request where EmpID ='" . $userID . "' AND LDate ='" . $Date . "' ";
        $result_find_same = mysqli_query($conn, $find_same);
        if (mysqli_num_rows($result_find_same) > 0) {
            echo "<script>
                            alert('A leave application is already made for this date');
                            window.location.href='../personalLeave.php';
                        </script>";
        } else {

            if ($LeaveMode == 'Casual') {

                $LeaveType = $_POST['type'];

                if ($LeaveType == 'HalfDay') {

                    $Time = $_POST['time'];

                    $query1 = "INSERT INTO leave_request (LDate,LeaveType,LDescription,EmpID,StartTime,LeaveMode,AppiedDate,LeaveStatus) VALUES ('$Date','$LeaveType','$Description','$userID','$Time','$LeaveMode','$ApplyDate','$Status')";
                    $result1 = mysqli_query($conn, $query1);

                    if ($result1) {
                        echo "<script>
                            alert('Leave updated succesfully');
                            window.location.href='../personalLeave.php';
                        </script>";
                    }
                } else {

                    $query2 = "INSERT INTO leave_request (LDate,LeaveType,LDescription,EmpID,LeaveMode,LeaveStatus,AppiedDate) VALUES ('$Date','$LeaveType','$Description','$userID','$LeaveMode','$Status','$ApplyDate')";
                    $result2 = mysqli_query($conn, $query2);

                    if ($result2) {
                        echo "<script>
                            alert('Leave updated succesfully');
                            window.location.href='../personalLeave.php';
                        </script>";
                    }
                }
            } elseif ($LeaveMode == 'Annual') {

                $EDate = date('Y-m-d', strtotime($_POST["edate"]));

                $query3 = "INSERT INTO leave_request (LDate,LDescription,EmpID,EDate,LeaveMode,LeaveStatus,AppiedDate) VALUES ('$Date','$Description','$userID','$EDate','$LeaveMode','$Status','$ApplyDate')";
                $result3 = mysqli_query($conn, $query3);

                if ($result3) {
                    echo "<script>
                        alert('Leave updated succesfully');
                        window.location.href='../personalLeave.php';
                    </script>";
                }
            } else {
                echo
                "<script>
            alert('empty fields');
            window.location.href = '../personalLeave.php';
        </script>";
            }
        }
    }
}
