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



                <div class="left" style="margin-left: 0; padding-top:0; margin-top:0">
                    <form class="form_body" method="POST" action="./managerIncludes/addShift.inc.php">
                        <div class="form_box">
                            <p class="form_title">Add Shift</p>
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
                                        <select name="office">
                                            <option value="office" selected>Office</option>
                                        </select>
                                    </div>
                                    <div id="reception" style="display:none">
                                        <select name="reception">
                                            <option value="reception" selected>Reception</option>
                                        </select>
                                    </div>
                                </div>

                                <input type="text" name="empid" placeholder="Enter the Employee ID">
                            </div>
                            <div style="text-align:center; padding-bottom: 2%; margin:2%;">
                                <button type="submit" name="submit" class="submit_btn">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <!--center-->
                <div class="right">
                    <div class="form_body" style="height: 100%;">
                        <div class="form_box">
                            <h2 class="form_title">Available Employees</h2>
                            <div class="form_content">
                                <div class="searchEmp">

                                    <form action="./addShifts3.php" method="POST">
                                        <div class="horizontal-group">
                                            <div class="form-group left" style="margin-top: 0; padding-top:0;margin-right: 0; padding-right:0;">
                                                <select name="shift">
                                                    <option value="" disabled selected>Select the shift</option>
                                                    <option value="morning">Morning</option>
                                                    <option value="evening">Evening</option>
                                                </select>
                                            </div>
                                            <div class="form-group right">
                                                <select name="facility">
                                                    <option value="" disabled selected>Select the Workplace</option>
                                                    <option value="office">Office</option>
                                                    <option value="reception">Reception</option>
                                                    <option value="facility">Facility</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <input placeholder="Select Date" type="text" onfocus="(this.type = 'date')" id="date" name="date">
                                        <div>

                                            <button type="submit" name="submit" class="changepsword">Search</button>

                                        </div>
                                    </form>
                                </div>
                                <div>
                                    <?php
                                    if (isset($_POST['submit'])) {
                                        $selectedDate = $_POST['date'];
                                        $selectedShift = $_POST['shift'];
                                        $selectedfaci = $_POST['facility'];

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
                                                }
                                                if ($shift_count == NULL) {
                                                    $candi2[] = $candi1[$i];
                                                }
                                            }
                                        }
                                        //print_r($candi1);
                                        //print_r($candi2);
                                    ?>
                                        <table class="table_view">
                                        <label style="color: #122747;">Search results for:</label>&nbsp; &nbsp; &nbsp;<br>
                                        <label style="color: #122747;">Date:<?php echo "$selectedDate"; ?></label>&nbsp; &nbsp; &nbsp;
                                        <label style="color: #122747;">Shift:<?php echo "$selectedShift"; ?></label>&nbsp; &nbsp; &nbsp;
                                        <label style="color: #122747;">Work place:<?php echo "$selectedfaci"; ?></label>&nbsp; &nbsp; &nbsp;
                                            <thead>
                                                <tr>
                                                    <th>Employee ID</th>
                                                    <th>Employee Name</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                //print_r($candi1);
                                                //print_r($candi2);
                                                //print_r($candi3);
                                                for ($k = 0; $k < sizeof($candi2); $k++) {
                                                    $display_availableEmp_query = mysqli_query($conn, "SELECT EmpID,FName,LName FROM $EmpTable WHERE EmpID='$candi2[$k]';");
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
                                        <!-- <iframe src="./managerIncludes/searchAvaEmployees.php" width="100%" height="100%" frameborder="0" allowfullscreen></iframe> -->
                                    <?php
                                    } ?>
                                </div>


                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!--/center-->

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