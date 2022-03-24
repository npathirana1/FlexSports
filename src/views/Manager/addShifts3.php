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


                <span onclick="goBack()" style="float: right;" class="go_back">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </span>
                <div class="left" style="margin-left: 0;">
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
                                <select name="facility">
                                    <option value="" disabled selected>Select the Workplace</option>
                                    <option value="office">Office</option>
                                    <option value="reception">Reception</option>
                                    <option value="badmintonc1">Badminton Court-1</option>
                                    <option value="badmintonc2">Badminton Court-2</option>
                                    <option value="basketballc1">Basketball Court</option>
                                    <option value="biliards">Biliards</option>
                                    <option value="swimming">Swimming Pool</option>
                                    <option value="tabletennis">Tabletennis</option>
                                    <option value="volleyball">Volleyball</option>
                                </select>
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
                    <div class="form_body">
                        <div class="form_box">
                            <h2 class="form_title">Available Employees</h2>
                            <div class="form_content">
                                <div class="searchEmp">

                                    <div class="horizontal-group" >
                                        <div class="form-group left" style="margin-top: 0;">
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
                                                <option value="badmintonc1">Badminton Court-1</option>
                                                <option value="badmintonc2">Badminton Court-2</option>
                                                <option value="basketballc1">Basketball Court</option>
                                                <option value="biliards">Biliards</option>
                                                <option value="swimming">Swimming Pool</option>
                                                <option value="tabletennis">Tabletennis</option>
                                                <option value="volleyball">Volleyball</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input placeholder="Select Date" type="text" onfocus="(this.type = 'date')" id="date" name="date">
                                    <div>
                                        <button type="submit" name="submit" class="changepsword">Search</button>
                                    </div>
                                </div>

                                <table class="table_view">
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Employee Name</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $scheduledDate='2022-03-24';
                                        $searchingFaci='reception';
                                        if ($searchingFaci=='reception'){
                                            $EmpTable='receptionist_staff';
                                        }elseif ($searchingFaci=='office') {
                                            $EmpTable='manager_staff';
                                        }else{
                                            $EmpTable='facility_staff';
                                        }
                                        
                                        $call1 = "SELECT facility_staff.EmpID FROM facility_staff INNER JOIN emp_shift ON facility_staff.EmpID=emp_shift.EmpID AND (emp_shift.Date>='2022-03-21' AND emp_shift.Date<='2022-03-27'); ";
                                        //SELECT facility_staff.EmpID FROM facility_staff INNER JOIN emp_shift ON facility_staff.EmpID=emp_shift.EmpID AND (emp_shift.Date>='2022-03-21' AND emp_shift.Date<='2022-03-27')GROUP BY facility_staff.EmpID; 
                                        //SELECT facility_staff.EmpID,COUNT(facility_staff.EmpID)AS ShiftCount FROM facility_staff INNER JOIN emp_shift ON facility_staff.EmpID=emp_shift.EmpID AND (emp_shift.Date>='2022-03-21' AND emp_shift.Date<='2022-03-27')GROUP BY facility_staff.EmpID; 
                                        $result = mysqli_query($conn, $call1);
                                        if (mysqli_num_rows($result) > 0) {
                                            $i = 0;
                                            while ($row = mysqli_fetch_array($result)) {
                                        /*
                                        $call1 = "SELECT manager_staff.EmpID FROM manager_staff INNER JOIN leave_request ON leave_request.EmpID=manager_staff.EmpID AND (leave_request.LDate>'2022-03-24' OR leave_request.EDate<'2022-03-24') OR (leave_request.LDate>'2022-03-24' AND leave_request.EDate<'2022-03-24') ";
                                        $result = mysqli_query($conn, $call1);
                                        if (mysqli_num_rows($result) > 0) {
                                            $i = 0;
                                            while ($row = mysqli_fetch_array($result)) {
                                               */
                                       
                                        ?>
                                        <tr>
                                            <td>11</td>
                                            <td>Rohana Perera</td>
                                            </tr>
<?php
                                            }
 $i++;
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
        </script>
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>