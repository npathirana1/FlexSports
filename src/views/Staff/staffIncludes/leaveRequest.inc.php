<?php

include("../../../config/db.php");
if (isset($_POST['leave-submit'])) {
    
    //$expression = $_SESSION['receptionistID'] || $_SESSION['managerID'] || $_SESSION['facilityworkerID'];
    if(isset($_SESSION['receptionistID']) || isset($_SESSION['managerID']) || isset($_SESSION['facilityworkerID'])){
        if (isset($_SESSION['facilityworkerID'])) {
            $staffEmail = $_SESSION['facilityworkerID'];
        }elseif (isset($_SESSION['managerID'])) {
            $staffEmail = $_SESSION['managerID'];
        }else{
            $staffEmail = $_SESSION['receptionistID'];
        }

        $leaveDate = date('Y-m-d', strtotime($_POST["ldate"]));
        $requestedDate =date('Y-m-d');
        $Description = $_POST['leavReason'];
        $LeaveMode = $_POST['type1'];

        //$staffEmail = $_SESSION['receptionistID'];

        $sqlID = "SELECT * from user_login where Email ='" . $staffEmail . "' ";
        $result = mysqli_query($conn, $sqlID);
        $row1 = mysqli_fetch_assoc($result);
        $userID = $row1['ID'];
//INSERT INTO `leave_request` (`Date`, `Description`, `EmpID`, `leavingDate`, `leaveType`, `startTime`) VALUES ('$requestedDate', '$Description',$userID, '$requestedDate','HalfDay' , '$Time');
        if ($LeaveMode == 'Casual') {
            $LeaveType = $_POST['type'];
            if ($LeaveType == 'HalfDay') {
                $Time = $_POST['time'];
                $query1 = "INSERT INTO `leave_request` (`Date`, `Description`, `EmpID`, `leavingDate`, `leaveType`, `startTime`) VALUES ('$requestedDate', '$Description',$userID, '$requestedDate','Half Day' , '$Time');";
                
                $result1 = mysqli_query($conn, $query1);
                if ($result1) {
                    echo "<script>
                            alert('Leave updated succesfully');
                            window.location.href='../personalLeave.php';
                        </script>";
                }
            } else {
                $query2 = "INSERT INTO `leave_request` (`Date`, `Description`, `EmpID`, `leavingDate`, `leaveType`) VALUES ('$requestedDate', '$Description',$userID, '$requestedDate','Full Day');";
                $result2 = mysqli_query($conn, $query2);
                if ($result2) {
                    echo "<script>
                            alert('Leave updated succesfully');
                            window.location.href='../personalLeave.php';
                        </script>";
                }
            }
        } elseif ($LeaveMode == 'Annual') {
            $endDate = $_POST['edate'];
            $EDate = date('Y-m-d', strtotime($_POST["edate"]));
            $query3 = "INSERT INTO `leave_request` (`Date`, `Description`, `EmpID`, `leavingDate`, `endDate`, `leaveType`) VALUES ('$requestedDate', '$Description', $userID, '$requestedDate', '$endDate', 'Annual');";echo $query3;
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
