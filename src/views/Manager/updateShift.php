<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>
            Update Shift
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .table_view {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                min-width: 400px;
                border-radius: 5px 5px 0 0;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }

            .form_box input[type=date],
            input[type=tel],
            input[type=email],
            input[type=text],
            input[type=password],
            select {
                width: 100%;
            }

            .home-section .form_box {
                margin-left: 0;
            }

            .right {
                padding-top: 0;
                margin-top: 0;
            }

            .left {
                padding-left: 0;
            }

            label {
                color: #0F305B;
            }
        </style>

    </head>

    <body>
        <?php
        include "managerIncludes/ManagerNavigation.php";
        ?>
        <section class="home-section">
            <nav class="breadcrumb-nav">
                <div class="top-breadcrumb">
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./viewShift.php" style="color: #42ecf5;">Shifts</a></li>
                            <li class="breadcrumb-item" style="color: #fff;">Update Shift</li>
                            <!-- <li class="breadcrumb-item"><a href="../StaffReservation/addReservation.php">Add Reservation</a></li> -->
                        </ul>
                    </div>
                </div>
                <div>
                    <!--<img src="images/profile.jpg" alt="">-->
                    <span class="admin_name"><?php echo $_SESSION['managerID']; ?></span>
                    <!--i class='bx bx-chevron-down'></i-->
                </div>

            </nav>

            <div class="home-content" style="padding-top: 10%;">



                <div class="left" style="margin-left: 0;">
                    <?php
                    //*******************************Get the shift****************************** */
                    $ShiftID = $_REQUEST["s"];
                    $get_allabout_shift_query = mysqli_query($conn, "SELECT * FROM emp_shift WHERE ShiftNo=$ShiftID");
                    $get_allabout_shift_result = mysqli_fetch_assoc($get_allabout_shift_query);

                    $date = $get_allabout_shift_result['Date'];
                    $shift = $get_allabout_shift_result['Shift'];
                    $empid = $get_allabout_shift_result['EmpID'];

                    //******************************Get the facility Name******************************* */
                    $get_facility_query = mysqli_query($conn, "SELECT FacilityName FROM facility WHERE FacilityNo='$get_allabout_shift_result[FacilityNo]';");
                    $get_facility_result = mysqli_fetch_assoc($get_facility_query);
                    $facility = $get_facility_result['FacilityName'];

                    //********************************Get the table relate to the relavent employee************************ */
                    if ($facility = 'Reception') {
                        $TableName = 'receptionist_staff';
                    } elseif ($facility = 'Office') {
                        $TableName = 'manager_staff';
                    } else {
                        $TableName = 'facility_staff';
                    }
                    // echo $ID;
                    // echo $Shift;
                    //echo $Date;
                    ?>
                    <form class="form_body" method="POST" action="./managerIncludes/addShift.inc.php">
                        <div class="form_box">
                            <p class="form_title">Update Shift</p>
                            <div class="form_content">
                                <input placeholder="Select Date" type="text" id="date" name="date" value="<?= $date ?>" readonly>
                                <input type="text" name="preShift" id="preShift" value="<?= $shift ?>" readonly>
                                <input type="text" name="facility" id="facility" value="<?= $facility ?>" readonly>
                                <input type="text" name="Empid" id="Empid" value="<?= $empid  ?>">

                                <input type="hidden" name="shiftID" id="shiftID" value="<?= $ShiftID ?>">
                            </div>
                            <div style="text-align:center; padding-bottom: 2%; margin:2%;">
                                <button onclick="getValues()" type="submit" name="update" class="submit_btn">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--center-->
                <div class="right">
                    <div class="form_body">
                        <div class="form_box">
                            <h2 class="form_title">Available Employees</h2>
                            <div class="form_content">
                                <table class="table_view">
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Employee Name</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
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



                                        $candi1 = array();
                                        $candi2 = array();
                                        $candi3 = array();
                                        $temp1 = array();
                                        $finalList = array();

                                        //*************************Get all the possible employees************** */
                                        $get_allemp_query = mysqli_query($conn, "SELECT EmpID FROM $TableName WHERE EmpID!='$empid';");
                                        //echo $TableName;
                                        while ($get_allemp_result = mysqli_fetch_array($get_allemp_query)) {
                                            $fcandiEmpID = $get_allemp_result['EmpID'];
                                            $candi1[] = $fcandiEmpID;
                                        }
                                        //*************************Get employees with less than 5 shifts in the week************************ */
                                        for ($i = 0; $i < sizeof($candi1); $i++) {
                                            $get_shiftless5_query = mysqli_query($conn, "SELECT EmpID,COUNT(EmpID)AS ShiftCount FROM emp_shift WHERE(Date>='$staticstart' AND Date<='$staticfinish') AND EmpID='$candi1[$i]'; ");
                                            while ($get_shiftless5_result = mysqli_fetch_array($get_shiftless5_query)) {
                                                $shift_count = $get_shiftless5_result['ShiftCount'];
                                                $scandiEmpID = $get_shiftless5_result['EmpID'];
                                                if ($shift_count < 5) {
                                                    $candi2[] = $scandiEmpID;
                                                }
                                            }
                                        }
                                        //*************************************Check for employees with the day free******************** */
                                        for ($j = 0; $j < sizeof($candi2); $j++) {
                                            $get_freeemp_query = mysqli_query($conn, "SELECT EmpID FROM emp_shift WHERE EmpID=$candi2[$j] AND Date= '$date' ;");
                                            while ($get_freeemp_result = mysqli_fetch_array($get_freeemp_query)) {
                                                $tcandiEmpID = $get_freeemp_result['EmpID'];
                                                echo $tcandiEmpID;
                                                $temp1[] = $tcandiEmpID;
                                            }
                                        }
                                        if (empty($temp)) {
                                            $candi3 = $candi2;
                                        } else {
                                            for ($l = 0; $l < sizeof($candi2); $l++) {
                                                for ($m = 0; $m < sizeof($temp1); $m++) {

                                                    if ($candi2[$l] == $temp1[$m]) {
                                                        continue;
                                                    } else {
                                                        $candi3[] = $candi2[$l];
                                                    }
                                                }
                                            }
                                        }
                                        //*************************Check if they are on leave************************** */
                                        // for ($j = 0; $j < sizeof($candi2); $j++) {
                                        //     $get_freeemp_query = mysqli_query($conn, "SELECT EmpID FROM leave_request WHERE LDate!=$date AND (LDate>$date AND EDate< $date OR EDate= NULL) AND EmpID=$candi2[$j];");
                                        //     while ($get_freeemp_result = mysqli_fetch_array($get_freeemp_query)) {
                                        //         $tcandiEmpID = $get_freeemp_result['EmpID'];

                                        //         //$candi3[] = $tcandiEmpID;
                                        //     }
                                        // }
                                        ?>
                                        <?php
                                        // print_r($candi1);
                                        // print_r($candi2);
                                        // print_r($candi3);
                                        // print_r($temp1);
                                        for ($k = 0; $k < sizeof($candi3); $k++) {
                                            $display_availableEmp_query = mysqli_query($conn, "SELECT EmpID,FName,LName FROM $TableName WHERE EmpID='$candi3[$k]';");
                                            while ($display_availableEmp_result = mysqli_fetch_assoc($display_availableEmp_query)) {
                                                $selectID = $display_availableEmp_result['EmpID'];
                                                $selectFname = $display_availableEmp_result['FName'];
                                                $selectLname = $display_availableEmp_result['LName'];
                                        ?>
                                                <tr>

                                                    <td><?php echo "$selectID"; ?></td>
                                                    <td><?php echo "$selectFname" . " " . "$selectLname"; ?></td>

                                                </tr>
                                        <?php

                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/center-->

            </div>
        </section>

        <script>
            function goBack() {
                window.history.back();
            }

            function getValues() {
                var id = <?php echo json_encode($ID); ?>;
                var shift = <?php echo json_encode($Shift); ?>;
                var date = <?php echo json_encode($Date); ?>;
                sessionStorage.setItem("EmpId", id);
                sessionStorage.setItem("Shift", shift);
                sessionStorage.setItem("Date", date);
                window.location.href = "./managerIncludes/addShift.inc.php";


                // to set into local storage
                /* localStorage.setItem("NAME", name);
                localStorage.setItem("SURNAME", surname); */





            }
        </script>
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>