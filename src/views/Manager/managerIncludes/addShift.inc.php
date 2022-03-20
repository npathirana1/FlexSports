<?php

include("../../../config/db.php");

if (isset($_POST['submit'])) {

    $Date = date('Y-m-d', strtotime($_POST['date']));
    $Shift = $_POST['shift'];
    $Facility = $_POST['facility'];
    $EmpID = $_POST['empid'];
    //check for empthy fileds
    if (!empty($_POST['date']) && !empty($_POST['shift']) && !empty($_POST['facility']) && !empty($_POST['empid'])) {
        //check if the  emplyoee is available
        $sql1 = "SELECT * FROM user_login WHERE ID= '$EmpID'";
        $select = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($select)) {
            $GetDetails = mysqli_fetch_assoc($select);
            $UserType = $GetDetails["UserType"];
            if ($UserType == "customer") {
                echo "<script>alert('User is not a staff memeber');
            window.location.href = '../viewShift.php'; </script>";
            } else {
                $Msql = "SELECT * FROM user_login WHERE Email='$_SESSION[managerID]'";
                $Mrun = mysqli_query($conn, $Msql);
                $Mget = mysqli_fetch_assoc($Mrun);
                $manageID = $Mget['ID'];
                $sql2 = "SELECT FacilityNo FROM facility WHERE SubFacilityName='$Facility'";
                $facisqulrun = mysqli_query($conn, $sql2);
                $facilityDetails = mysqli_fetch_assoc($facisqulrun);
                $FaciNo = $facilityDetails["FacilityNo"];


                $query = "INSERT INTO emp_shift (Date,Shift,EmpID,ManagerEmpID,FacilityNo) VALUES ('$Date','$Shift','$EmpID','$manageID','$FaciNo')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "<script>alert('Shift added successfully');
                window.location.href = '../viewShift.php'; </script>";
                } else {
                    echo "<script>alert('Failed');
                window.location.href = '../viewShift.php';</script>";
                }
            }
        } else {
            echo
            "<script>
                alert('Invalid Employee ID');
                window.location.href = '../viewShift.php';
            </script>";
        }
    } else {
        echo
        "<script>
            alert('Empty Fields');
            window.location.href = '../viewShift.php';
        </script>";
    }
}

mysqli_close($conn);
