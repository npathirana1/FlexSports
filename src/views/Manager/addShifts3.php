<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>
            Add Shift
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .form_body {
                color: #666;
                width: 90%;

                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                margin-top: 6%;
                margin-bottom: 1%;
                margin-left: 12%;
                border-top-right-radius: 5%;
                border-top-left-radius: 5%;
            }

            .table_view {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                min-width: 400px;
                border-radius: 5px 5px 0 0;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }

            input[type=date],
            input[type=tel],
            input[type=email],
            input[type=text],
            input[type=password],
            select {
                width: 90%;
                padding: 15px;
                margin: 5px 0 12px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;
            }

            .home-section .form_box {
                margin-left: 0;
                width: 100%;
            }

            .left {
                padding-left: 0;
                text-align: center;

            }

            .searchEmp {
                border: solid;
                border-color: #122747;
                padding: 5%;
                border-radius: 5%;
            }
        </style>
        <script>
            function leaveMode(y) {
                if (y == 2) {
                    document.getElementById("facility").style.display = "block";
                    document.getElementById("office").style.display = "none";
                    document.getElementById("reception").style.display = "none";
                } else if (y == 0) {
                    document.getElementById("office").style.display = "block";
                    document.getElementById("facility").style.display = "none";
                    document.getElementById("reception").style.display = "none";
                } else if (y == 1) {
                    document.getElementById("reception").style.display = "block";
                    document.getElementById("office").style.display = "none";
                    document.getElementById("facility").style.display = "none";
                }
                return;
            }
        </script>

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
                            <li class="breadcrumb-item" style="color: #fff;">Add Shift</li>
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



                <div style="text-align:center; margin-right:25%; margin-left:15%;">
                    <div class="form_body">
                        <div class="form_box" style="text-align:center;">
                            <p class="form_title">Add Shift</p>
                        </div>

                        <?php
                        if (isset($_POST['search'])) {
                            $selectedDate = $_POST['date'];
                            $selectedShift = $_POST['shift'];
                            $selectedfaci = $_POST['facility'];

                            $check_forshift_query = mysqli_query($conn, "SELECT * FROM emp_shift INNER JOIN facility ON emp_shift.FacilityNo=facility.FacilityNo AND facility.SubFacilityName='$selectedfaci' AND emp_shift.Date='$selectedDate' AND emp_shift.Shift='$selectedShift'; ");
                            $check_forshift_result = mysqli_fetch_array($check_forshift_query);

                            if ($check_forshift_result > 0 || $check_forshift_result != NULL) { ?>
                                <label style="color: #122747;">Search results for:</label>&nbsp; &nbsp; &nbsp;<br>
                                <label style="color: #122747;">Date:<?php echo "$selectedDate"; ?></label>&nbsp; &nbsp; &nbsp;
                                <label style="color: #122747;">Shift:<?php echo "$selectedShift"; ?></label>&nbsp; &nbsp; &nbsp;
                                <label style="color: #122747;">Work place:<?php echo "$selectedfaci"; ?></label>&nbsp; &nbsp; &nbsp;<br>
                                <label style="color: #122747;">This Shift has aleady been scheduled</label>&nbsp; &nbsp; &nbsp;
                            <?php
                            } else {



                                if ($selectedfaci == 'reception') {
                                    $EmpTable = 'receptionist_staff';
                                } elseif ($selectedfaci == 'office') {
                                    $EmpTable = 'manager_staff';
                                } else {
                                    $EmpTable = 'facility_staff';
                                }
                                $candi1 = array();
                                $candi2 = array();
                                $candi3 = array();
                                $temp1 = array();
                                $finalList = array();

                                $week = date('W', strtotime($selectedDate));
                                $year = date('Y', strtotime($selectedDate));
                                $dto = new DateTime();
                                $dto->setISODate($year, $week);
                                $staticstart = $dto->format('Y-m-d');
                                $dto->modify('+6 days');
                                $staticfinish = $dto->format('Y-m-d');
                                // echo $staticstart;
                                // echo  $staticfinish;

                                //*************************Get all the possible employees************** */
                                $get_allemp_query = mysqli_query($conn, "SELECT EmpID FROM $EmpTable;");
                                //echo $EmpTable;
                                while ($get_allemp_result = mysqli_fetch_array($get_allemp_query)) {
                                    $fcandiEmpID = $get_allemp_result['EmpID'];
                                    $candi1[] = $fcandiEmpID;
                                }
                                //*************************Get employees with less than 5 shifts in the week************************ */
                                for ($i = 0; $i < sizeof($candi1); $i++) {
                                    $get_shiftless5_query = mysqli_query($conn, "SELECT EmpID,COUNT(EmpID)AS ShiftCount FROM emp_shift WHERE(Date>='$staticstart' AND Date<='$staticfinish') AND EmpID='$candi1[$i]';");
                                    while ($get_shiftless5_result = mysqli_fetch_array($get_shiftless5_query)) {
                                        $shift_count = $get_shiftless5_result['ShiftCount'];
                                        $scandiEmpID = $get_shiftless5_result['EmpID'];
                                        //echo $shift_count;
                                        //echo $scandiEmpID;
                                        if ($shift_count < 5) {
                                            $candi2[] = $scandiEmpID;
                                        } else{
                                            $candi2[] = $candi1[$i];
                                        }
                                    }
                                }
                                //*************************************Check for employees with the day free******************** */
                                for ($j = 0; $j < sizeof($candi2); $j++) {
                                    $get_freeemp_query = mysqli_query($conn, "SELECT EmpID FROM emp_shift WHERE EmpID=$candi2[$j] AND Date= '$selectedDate' ;");
                                    while ($get_freeemp_result = mysqli_fetch_array($get_freeemp_query)) {

                                        $tcandiEmpID = $get_freeemp_result['EmpID'];
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
                                // print_r($candi1);
                                // print_r($candi2);
                                // print_r($candi3);
                                // print_r($temp1);
                            ?><div class="form_content">
                                    <form method="POST" action="./managerIncludes/addShift.inc.php">
                                        <table class="table_view" style="margin-left:5%;">

                                            <label style="color: #122747;">Search results for:</label>&nbsp; &nbsp; &nbsp;<br>
                                            <input type="hidden" name="date" id="date" class="form-control" value="<?php echo $selectedDate ?>" readonly>
                                            <input type="hidden" name="shift" id="shift" class="form-control" value="<?php echo $selectedShift ?>" readonly>
                                            <input type="hidden" name="facility" id="facility" class="form-control" value="<?php echo $selectedfaci ?>" readonly>
                                            <!-- <input type="hidden" name="empid" id="empid" class="form-control" value="<?php echo $selectID ?>" readonly> -->
                                            <label style="color: #122747;">Date:<?php echo "$selectedDate"; ?></label>&nbsp; &nbsp; &nbsp;
                                            <label style="color: #122747;">Shift:<?php echo "$selectedShift"; ?></label>&nbsp; &nbsp; &nbsp;
                                            <label style="color: #122747;">Work place:<?php echo "$selectedfaci"; ?></label>&nbsp; &nbsp; &nbsp;
                                            <thead>
                                                <tr>
                                                    <th>Employee ID</th>
                                                    <th>Employee Name</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                //print_r($candi1);
                                                //print_r($candi2);
                                               // print_r($candi3);
                                                for ($k = 0; $k < sizeof($candi3); $k++) {
                                                    $display_availableEmp_query = mysqli_query($conn, "SELECT EmpID,FName,LName FROM $EmpTable WHERE EmpID='$candi3[$k]';");
                                                    while ($display_availableEmp_result = mysqli_fetch_assoc($display_availableEmp_query)) {
                                                        $selectID = $display_availableEmp_result['EmpID'];
                                                        $selectFname = $display_availableEmp_result['FName'];
                                                        $selectLname = $display_availableEmp_result['LName'];
                                                ?>
                                                        <tr>

                                                            <td><?php echo "$selectID"; ?></td>
                                                            <td><?php echo "$selectFname" . " " . "$selectLname"; ?></td>
                                                            <td>
                                                                <div style="padding: -10%;">

                                                                    <button type="submit" name="submit" value="<?php echo $selectID ?>" class="changepsword">Add</button>

                                                                </div>
                                                            </td>

                                                        </tr>
                                                <?php

                                                    }
                                                }

                                                ?>

                                            </tbody>
                                        </table>
                                    </form>
                                    <!-- <iframe src="./managerIncludes/searchAvaEmployees.php" width="100%" height="100%" frameborder="0" allowfullscreen></iframe> -->
                                    <div style="padding-bottom: 5%;"></div>
                                </div>
                            <?php
                            }
                        } else {

                            ?>
                            <form method="POST" action="./addShifts3.php">
                                <div class="form_content">

                                    <input placeholder="Select Date" type="text" onfocus="(this.type = 'date')" id="date" name="date">
                                    <select name="shift">
                                        <option value="" disabled selected>Select the shift</option>
                                        <option value="morning">Morning</option>
                                        <option value="evening">Evening</option>
                                    </select>
                                    <div class="radio-btn" style="color: #122747;">
                                        <label for="ltype" style="color: #122747;">Select the Workplace</label>&nbsp; &nbsp; &nbsp;
                                        <input type="radio" id="type1" name="type1" value="OFFICE" onclick="leaveMode(0)" />
                                        <label for="type1" style="color: #122747;" checked> Office</label>&nbsp;&nbsp;
                                        <input type="radio" id="type1" name="type1" value="RECEPTION" onclick="leaveMode(1)" />
                                        <label for="type1" style="color: #122747;"> Reception</label>&nbsp;&nbsp;
                                        <input type="radio" id="type1" name="type1" value="Facility" onclick="leaveMode(2)" />
                                        <label for="type2" style="color: #122747;">Facility</label><br>
                                    </div>
                                    <div>
                                        <div id="facility" style="display:none">
                                            <select name="facility">
                                                <option value="" disabled selected>Select the Workplace</option>
                                                <option value="badmintonc1">Badminton Court-1</option>
                                                <option value="badmintonc2">Badminton Court-2</option>
                                                <option value="basketballc1">Basketball Court</option>
                                                <option value="biliards">Biliards</option>
                                                <option value="swimming">Swimming Pool</option>
                                                <option value="tabletennis">Tabletennis</option>
                                                <option value="volleyball">Volleyball</option>
                                            </select>
                                        </div>
                                        <div id="office" style="display:none">
                                            <select name="facility">
                                                <option value="office" selected>Office</option>
                                            </select>
                                        </div>
                                        <div id="reception" style="display:none">
                                            <select name="facility">
                                                <option value="reception" selected>Reception</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- <input type="text" name="empid" placeholder="Enter the Employee ID"> -->
                                </div>
                                <div style="text-align:center; padding-bottom: 2%; margin:2%;">
                                    <button type="search" name="search" class="submit_btn">
                                        Search
                                    </button>
                                </div>
                    </div>
                    </form>
                <?php
                        } ?>
                </div>


            </div>
        </section>
        <script>
            function reload() {
                document.getElementById('iframeid').src += '';
            }
            btn.onclick = reload;
        </script>
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>