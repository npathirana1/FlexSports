<?php

include("../../../config/db.php");
//check the current day
if (date('D') != 'Mon') {
    //take the last monday
    $staticstart = date('Y-m-d', strtotime('last Monday'));
} else {
    $staticstart = date('Y-m-d');
}

//always next saturday

if (date('D') == 'Sun') {
    $staticfinish = date('Y-m-d');
} else {
    $staticfinish = date('Y-m-d', strtotime('next Sunday'));
}

if (isset($_POST['submit'])) {

    $Date = date('Y-m-d', strtotime($_POST['date']));
    $Shift = $_POST['shift'];
    $FacilityType = $_POST['type1'];

    if ($FacilityType == 'RECEPTION') {
        $Facility = $_POST['reception'];
    } else if ($FacilityType == 'OFFICE') {
        $Facility = $_POST['office'];
    } else {
        $Facility = $_POST['facility'];
    }

    $EmpID = $_POST['empid'];
    //check for empthy fileds
    if (!empty($_POST['date']) && !empty($_POST['shift']) && !empty($Facility) && !empty($_POST['empid'])) {
        $sql2 = "SELECT FacilityNo FROM facility WHERE SubFacilityName='$Facility'";
        $facisqulrun = mysqli_query($conn, $sql2);
        $facilityDetails = mysqli_fetch_assoc($facisqulrun);
        $FaciNo = $facilityDetails["FacilityNo"];

        $query0 = "SELECT * FROM emp_shift WHERE emp_shift.Date='$Date' AND emp_shift.Shift='$Shift' AND  FacilityNo='$FaciNo'";
        $result0 = mysqli_query($conn, $query0);
        if (mysqli_num_rows($result0) > 0) {
            echo
            "<script>
            alert('The slot is already filled');
            window.location.href='../viewShift.php';
        </script>";
        } else {
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
                    $check_for_query = mysqli_query($conn, "SELECT * FROM emp_shift WHERE Date= '$Date' AND EmpID='$EmpID';");
                    if (mysqli_num_rows($check_for_query) > 0) {
                        echo
                        "<script>
                        alert('User already has a shift scheduled');
                        window.location.href='../viewShift.php';
                    </script>";
                    } else {

                        if ($UserType == 'receptionist' &&  $FacilityType != 'RECEPTION') {
                            echo "<script>alert('Invalid facility type');
                                            window.location.href = '../viewShift.php'; 
                                        </script>";
                        } else {

                            if ($UserType == 'manager' &&  $FacilityType != 'OFFICE') {
                                echo "<script>alert('Invalid facility type');
                            window.location.href = '../viewShift.php'; 
                        </script>";
                            } else {

                                if ($UserType == 'facilityworker' &&  ($FacilityType == 'OFFICE' || $FacilityType == 'RECEPTION')) {
                                    echo "<script>alert('Invalid facility type');
                                    window.location.href = '../viewShift.php'; 
                                </script>";
                                } else {
                                    $totalshiftcount_query = mysqli_query($conn, "SELECT COUNT(EmpID)AS ShiftCount FROM emp_shift WHERE(Date>='$staticstart' AND Date<='$staticfinish') AND EmpID='$EmpID';");
                                    $totalshiftcount_result = mysqli_fetch_assoc($totalshiftcount_query);
                                    $shift_count = $totalshiftcount_result['ShiftCount'];
                                    if ($shift_count >= 5) {
                                        echo "<script>alert('This user has alreday assigned with maximum number of shifts for the week');
                                    window.location.href = '../viewShift.php'; 
                                </script>";
                                    } else {
                                        $Msql = "SELECT * FROM user_login WHERE Email='$_SESSION[managerID]'";
                                        $Mrun = mysqli_query($conn, $Msql);
                                        $Mget = mysqli_fetch_assoc($Mrun);
                                        $manageID = $Mget['ID'];



                                        $query = "INSERT INTO emp_shift (Date,Shift,EmpID,ManagerEmpID,FacilityNo) VALUES ('$Date','$Shift','$EmpID','$manageID','$FaciNo')";
                                        $result = mysqli_query($conn, $query);

                                        if ($result) {
                                            echo "<script>alert('Shift added successfully');
                                            window.location.href = '../viewShift.php'; 
                                        </script>";
                                        } else {
                                            echo "<script>alert('Failed');
                                            window.location.href = '../viewShift.php';
                                        </script>";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                echo
                "<script>
                alert('Invalid Employee ID');
                window.location.href = '../viewShift.php';
            </script>";
            }
        }
    } else {
        echo
        "<script>
            alert('Empty Fields');
            window.location.href = '../viewShift.php';
        </script>";
    }
} elseif (isset($_POST['update'])) {
    /*echo "
    <script>
        var ID = sessionStorage.getItem('EmpId');
        sessionStorage.removeItem('EmpId');
        var Shift = sessionStorage.getItem('Shift');
        sessionStorage.removeItem('Shift');
        var Date = sessionStorage.getItem('Date');
        sessionStorage.removeItem('Date');
    </script>";
    $preID = "<script>document.writeln(ID);</script>";
    $preShift = "<script>document.writeln(Shift);</script>";
    $preDate = "<script>document.writeln(Date);</script>";*/
    $preID = $_POST['Empid'];
    $FacilityType = $_POST['facility'];
    $shiftID = $_POST['shiftID'];

    if (!empty($preID)) {
        //echo $preID;
        $query1 = mysqli_query($conn, "SELECT * FROM user_login WHERE ID='$preID';");
        $result1 = mysqli_fetch_assoc($query1);
        $UserType = $result1['UserType'];
        //echo $UserType;
        if ($UserType == 'customer') {
            echo "<script>alert('User is not a staff memeber');
    window.location.href = '../viewShift.php'; </script>";
        } else {

            if ($UserType == 'receptionist' &&  $FacilityType != 'Reception') {
                echo "<script>alert('Invalid facility type');
                window.location.href = '../viewShift.php'; 
            </script>";
            } else {
                if ($UserType == 'manager' &&  $FacilityType != 'Office') {
                    echo "<script>alert('Invalid facility type');
                window.location.href = '../viewShift.php'; 
            </script>";
                } else {
                    if ($UserType == 'facilityworker' &&  ($FacilityType == 'Office' || $FacilityType == 'Reception')) {
                        echo "<script>alert('Invalid facility type');
                        window.location.href = '../viewShift.php'; 
                    </script>";
                    } else {
                        $totalshiftcount_query = mysqli_query($conn, "SELECT COUNT(EmpID)AS ShiftCount FROM emp_shift WHERE(Date>='$staticstart' AND Date<='$staticfinish') AND EmpID='$preID';");
                        $totalshiftcount_result = mysqli_fetch_assoc($totalshiftcount_query);
                        $shift_count = $totalshiftcount_result['ShiftCount'];
                        if ($shift_count >= 5) {
                            echo "<script>alert('This user has alreday assigned with maximum number of shifts for the week');
                        window.location.href = '../viewShift.php'; 
                    </script>";
                        } else {

                            $query2 = "UPDATE emp_shift SET EmpID= '$preID' WHERE ShiftNo='$shiftID' ";
                            $result2 = mysqli_query($conn, $query2);


                            if ($result2) {
                                echo "<script>
                        alert('Shift successfully updated');
                        window.location.href='../viewShift.php';
                    </script>";
                            } else {
                                echo "<script>
            alert('Action Failed');
            window.location.href='../viewShift.php';
        </script>";
                            }
                        }
                    }
                }
            }
        }
    } else {
        echo
        "<script>
        alert('Empty fields');
        window.location.href = '../viewShift.php';
    </script>";
    }
}


mysqli_close($conn);
