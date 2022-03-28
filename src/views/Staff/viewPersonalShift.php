<?php
include "../../config/db.php";
?>

<?php if (isset($_SESSION['facilityworkerID'])) {
    $userEmail = $_SESSION['facilityworkerID'];
} ?>

<?php if (isset($_SESSION['managerID'])) {
    $userEmail = $_SESSION['managerID'];
} ?>

<?php if (isset($_SESSION['receptionistID'])) {
    $userEmail = $_SESSION['receptionistID'];
} ?>

<!DOCTYPE html>
<html>

<head>
    <title>Shifts</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/modal.css">

    <style>
        .home-section .home-content {
            padding-top: 8%;
            position: relative;
        }

        .pgrid-container1 {
            display: grid;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 3%;
            margin-bottom: 1%;
            margin-left: 2%;
            margin-right: 3%;
            border-radius: 5px;
            padding: 10px;
        }

        td {
            vertical-align: middle;
        }

        .c1 {
            width: 9%;
            padding: 5px;
            background-color: #0f305b;
            color: #cccccc;
            font-weight: bold;
            border-radius: 3px;
        }

        .c2 {
            width: 13%;
            text-align: center;
            background-color: #e6e5e5;
        }

        .c3 {
            width: 13%;
            font-size: 13px;
            font-weight: bold;
        }

        .hc2 {
            width: 13%;
            font-size: 14px;
            color: #0f305b;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    //Check user login or not
    if (isset($_SESSION['managerID'])) {
        include "../Manager/managerIncludes/ManagerNavigation.php";
    } elseif (isset($_SESSION['receptionistID'])) {
        include "../Receptionist/receptionistIncludes/receptionistNavigation.php";
    } elseif (isset($_SESSION['facilityworkerID'])) {
        include "../FacilityWorker/facilityWorkerIncludes/sideNavigation.php";
    } ?>

    <section class="home-section">
        <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item" style="color:#fff;">Personal Shift /</li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="home-content">

            <?php
            //check the current day
            if (date('N') != '1') {
                //take the last monday
                $staticstart = date('Y-m-d', strtotime('last Monday'));
            } else {
                $staticstart = date('Y-m-d');
            }

            //always next Sunday
            if (date('N') == '7') {
                $staticfinish = date('Y-m-d');
            } else {
                $staticfinish = date('Y-m-d', strtotime('next Sunday'));
            }

            //Tuesday
            if (date('N') == 2) {
                $tuesday = date('Y-m-d');
            } else {
                $tuesday = date('Y-m-d', strtotime('next Tuesday'));
                if ($tuesday > $staticfinish) {
                    $tuesday = date('Y-m-d', strtotime('last Tuesday'));
                }
            }

            //Wednesday
            if (date('N') == '3') {
                $wednesday = date('Y-m-d');
            } else {
                $wednesday = date('Y-m-d', strtotime('next Wednesday'));
                if ($wednesday > $staticfinish) {
                    $wednesday = date('Y-m-d', strtotime('last Wednesday'));
                }
            }

            //Thursday
            if (date('N') == '4') {
                $thursday = date('Y-m-d');
            } else {
                $thursday = date('Y-m-d', strtotime('next Thursday'));
                if ($thursday > $staticfinish) {
                    $thursday = date('Y-m-d', strtotime('last Thursday'));
                }
            }

            //Friday
            if (date('N') == '5') {
                $friday = date('Y-m-d');
            } else {
                $friday = date('Y-m-d', strtotime('next Friday'));
                if ($friday > $staticfinish) {
                    $friday = date('Y-m-d', strtotime('last Friday'));
                }
            }

            //Saturday
            if (date('N') == '6') {
                $saturday = date('Y-m-d');
            } else {
                $saturday = date('Y-m-d', strtotime('next Saturday'));
                if ($saturday > $staticfinish) {
                    $saturday = date('Y-m-d', strtotime('last Saturday'));
                }
            }

            $nextMon = date('Y-m-d', strtotime($staticstart . ' + 7 days'));
            $nextTue = date('Y-m-d', strtotime($tuesday . ' + 7 days'));
            $nextWed = date('Y-m-d', strtotime($wednesday . ' + 7 days'));
            $nextThur = date('Y-m-d', strtotime($thursday . ' + 7 days'));
            $nextFri = date('Y-m-d', strtotime($friday . ' + 7 days'));
            $nextSat = date('Y-m-d', strtotime($saturday . ' + 7 days'));
            $nextSun = date('Y-m-d', strtotime($staticfinish . ' + 7 days'));

            ?>

            <div class="grid-container">
                <div class="table_topic">
                    &nbsp;&nbsp;<h2>Bi-Weekly Schedule </h2>
                </div>
            </div>
            <div class="pgrid-container1">
                <table>

                    <tr style="height: 30px;">
                        <td class="c1h"></td>
                        <td class="hc2">Monday</td>
                        <td class="hc2">Tuesday</td>
                        <td class="hc2">Wednesday</td>
                        <td class="hc2">Thursday</td>
                        <td class="hc2">Friday</td>
                        <td class="hc2">Saturday</td>
                        <td class="hc2">Sunday</td>

                    </tr>
                    <tr style="height: 10px;">
                        <td class="c1h"></td>
                        <td class="c3"><?php echo "$staticstart" ?></td>
                        <td class="c3"><?php echo "$tuesday" ?></td>
                        <td class="c3"><?php echo "$wednesday" ?></td>
                        <td class="c3"><?php echo "$thursday" ?></td>
                        <td class="c3"><?php echo "$friday" ?></td>
                        <td class="c3"><?php echo "$saturday" ?></td>
                        <td class="c3"><?php echo "$staticfinish" ?></td>

                    </tr>

                    <?php

                    $getID =  "SELECT * FROM user_login WHERE EMAIL='$userEmail' AND NOT UserType='customer' ";
                    $u_result =  mysqli_query($conn, $getID);
                    $u_row = mysqli_fetch_assoc($u_result);

                    $staffID = $u_row['ID'];

                    // $getLeave = "SELECT * FROM leave_request WHERE EmpID='$staffID' AND LeaveType='FullDay' AND LDate BETWEEN '$staticstart' AND '$nextSun'";
                    // $leave_result = mysqli_query($conn, $getLeave);
                    // $leave_row = mysqli_fetch_assoc($leave_result);


                    // $leaveSDate = $leave_row['LDate'];
                    // $leaveEDate = $leave_row['EDate'];


                    ?>

                    <tr style="height: 80px;">
                        <td class="c1" style="border-top: 1px solid #cccccc;border-bottom: 1px solid #cccccc;">Morning Shift</td>

                        <div>
                            <?php
                            $getShift = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$staticstart' AND Shift='morning' ";
                            $shift_result = mysqli_query($conn, $getShift);
                            $shift_row = mysqli_fetch_assoc($shift_result);

                            if ($shift_row) {

                            ?>
                                <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                            <?php
                            } else { ?>
                                <td class="c2"></td>
                            <?php
                            }

                            ?>
                        </div>

                        <?php
                        $getShift1 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$tuesday' AND Shift='morning' ";
                        $shift_result1 = mysqli_query($conn, $getShift1);
                        $shift_row1 = mysqli_fetch_assoc($shift_result1);

                        if ($shift_row1) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php

                        } else {
                        ?>
                            <td class="c2"></td>
                        <?php
                        }
                        ?>
                        <?php
                        $getShift2 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$wednesday' AND Shift='morning'";
                        $shift_result2 = mysqli_query($conn, $getShift2);
                        $shift_row2 = mysqli_fetch_assoc($shift_result2);

                        if ($shift_row2) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php

                        } else {
                        ?>
                            <td class="c2"></td>
                        <?php
                        }
                        ?>
                        <?php
                        $getShift3 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$thursday' AND Shift='morning'";
                        $shift_result3 = mysqli_query($conn, $getShift3);
                        $shift_row3 = mysqli_fetch_assoc($shift_result3);

                        if ($shift_row3) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php

                        } else {
                        ?>
                            <td class="c2"></td>
                        <?php
                        }
                        ?>
                        <?php
                        $getShift4 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$friday' AND Shift='morning'";
                        $shift_result4 = mysqli_query($conn, $getShift4);
                        $shift_row4 = mysqli_fetch_assoc($shift_result4);

                        if ($shift_row4) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else {
                        ?>
                            <td class="c2"></td>
                        <?php
                        }
                        ?>

                        <?php
                        $getShift5 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$saturday' AND Shift='morning'";
                        $shift_result5 = mysqli_query($conn, $getShift5);
                        $shift_row5 = mysqli_fetch_assoc($shift_result5);

                        if ($shift_row5) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else {
                        ?>
                            <td class="c2"></td>
                        <?php
                        }
                        ?>

                        <?php
                        $getShift6 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$staticfinish' AND Shift='morning' ";
                        $shift_result6 = mysqli_query($conn, $getShift6);
                        $shift_row6 = mysqli_fetch_assoc($shift_result6);

                        if ($shift_row6) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else {
                        ?>
                            <td class="c2"></td>
                        <?php
                        }
                        ?>
                    </tr>

                    <tr style="height: 80px;">
                        <td class="c1" style="border-top: 1px solid #cccccc;border-bottom: 1px solid #cccccc;">Evening Shift</td>
                        <?php
                        $getShift14 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$staticstart' AND Shift='evening'";
                        $shift_result14 = mysqli_query($conn, $getShift14);
                        $shift_row14 = mysqli_fetch_assoc($shift_result14);

                        if ($shift_row14) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else {
                        ?>
                            <td class="c2"></td>
                        <?php
                        }
                        ?>

                        <?php
                        $getShift15 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$tuesday' AND Shift='evening'";
                        $shift_result15 = mysqli_query($conn, $getShift15);
                        $shift_row15 = mysqli_fetch_assoc($shift_result15);

                        if ($shift_row15) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else {
                        ?>
                            <td class="c2"></td>
                        <?php
                        }
                        ?>
                        <?php
                        $getShift16 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$wednesday' AND Shift='evening' ";
                        $shift_result16 = mysqli_query($conn, $getShift16);
                        $shift_row16 = mysqli_fetch_assoc($shift_result16);

                        if ($shift_row16) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else {
                        ?>
                            <td class="c2"></td>
                        <?php
                        }
                        ?>

                        <?php
                        $getShift17 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$thursday' AND Shift='evening'";
                        $shift_result17 = mysqli_query($conn, $getShift17);
                        $shift_row17 = mysqli_fetch_assoc($shift_result17);

                        if ($shift_row17) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else {
                        ?>
                            <td class="c2"></td>
                        <?php
                        }
                        ?>

                        <?php
                        $getShift18 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$friday' AND Shift='evening'";
                        $shift_result18 = mysqli_query($conn, $getShift18);
                        $shift_row18 = mysqli_fetch_assoc($shift_result18);

                        if ($shift_row18) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else {
                        ?>
                            <td class="c2"></td>
                        <?php
                        }
                        ?>

                        <?php
                        $getShift19 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$saturday' AND Shift='evening'";
                        $shift_result19 = mysqli_query($conn, $getShift19);
                        $shift_row19 = mysqli_fetch_assoc($shift_result19);

                        if ($shift_row19) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else {
                        ?>
                            <td class="c2"></td>
                        <?php
                        }
                        ?>

                        <?php
                        $getShift20 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$staticfinish' AND Shift='evening' ";
                        $shift_result20 = mysqli_query($conn, $getShift20);
                        $shift_row20 = mysqli_fetch_assoc($shift_result20);

                        if ($shift_row20) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else {
                        ?>
                            <td class="c2"></td>
                        <?php
                        }
                        ?>

                    </tr>
                </table>
            </div>

            <div class="pgrid-container1">
                <table>

                    <tr style="height: 30px;">
                        <td class="c1h"></td>
                        <td class="hc2">Monday</td>
                        <td class="hc2">Tuesday</td>
                        <td class="hc2">Wednesday</td>
                        <td class="hc2">Thursday</td>
                        <td class="hc2">Friday</td>
                        <td class="hc2">Saturday</td>
                        <td class="hc2">Sunday</td>

                    </tr>
                    <tr style="height: 10px;">
                        <td class="c1h"></td>
                        <td class="c3"><?php echo "$nextMon" ?></td>
                        <td class="c3"><?php echo "$nextTue" ?></td>
                        <td class="c3"><?php echo "$nextWed" ?></td>
                        <td class="c3"><?php echo "$nextThur" ?></td>
                        <td class="c3"><?php echo "$nextFri" ?></td>
                        <td class="c3"><?php echo "$nextSat" ?></td>
                        <td class="c3"><?php echo "$nextSun" ?></td>

                    </tr>
                    <tr style="height: 80px;">
                        <td class="c1" style="border-top: 1px solid #cccccc;border-bottom: 1px solid #cccccc;">Morning Shift</td>
                        <?php
                        $getShift7 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$nextMon'  AND Shift='morning' ";
                        $shift_result7 = mysqli_query($conn, $getShift7);
                        $shift_row7 = mysqli_fetch_assoc($shift_result7);

                        if ($shift_row7) {
                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else { ?>
                            <td class="c2"></td>
                        <?php
                        }
                        ?>

                        <?php
                        $$getShift30 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$nextTue'  AND Shift='morning' ";
                        $shift_result30 = mysqli_query($conn, $getShift30);
                        $shift_row30 = mysqli_fetch_assoc($shift_result30);

                        if ($shift_row30) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else { ?>
                            <td class="c2"></td>
                        <?php
                        }

                        ?>
                        <?php
                        $getShift9 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$nextWed'  AND Shift='morning'";
                        $shift_result9 = mysqli_query($conn, $getShift9);
                        $shift_row9 = mysqli_fetch_assoc($shift_result9);

                        if ($shift_row9) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else { ?>
                            <td class="c2"></td>
                        <?php
                        }

                        ?>
                        <?php
                        $getShift10 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$nextThur'  AND Shift='morning'";
                        $shift_result10 = mysqli_query($conn, $getShift10);
                        $shift_row10 = mysqli_fetch_assoc($shift_result10);

                        if ($shift_row10) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else { ?>
                            <td class="c2"></td>
                        <?php
                        }

                        ?>
                        <?php
                        $getShift11 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$nextFri'  AND Shift='morning' ";
                        $shift_result11 = mysqli_query($conn, $getShift11);
                        $shift_row11 = mysqli_fetch_assoc($shift_result11);

                        if ($shift_row11) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else { ?>
                            <td class="c2"></td>
                        <?php
                        }

                        ?>
                        <?php
                        $getShift12 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$nextSat'  AND Shift='morning'";
                        $shift_result12 = mysqli_query($conn, $getShift12);
                        $shift_row12 = mysqli_fetch_assoc($shift_result12);

                        if ($shift_row12) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else { ?>
                            <td class="c2"></td>
                        <?php
                        }

                        ?>
                        <?php
                        $getShift13 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$nextSun' AND Shift='morning'";
                        $shift_result13 = mysqli_query($conn, $getShift13);
                        $shift_row13 = mysqli_fetch_assoc($shift_result13);

                        if ($shift_row13) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else { ?>
                            <td class="c2"></td>
                        <?php
                        }


                        ?>
                    </tr>
                    <tr style="height: 80px;">
                        <td class="c1" style="border-top: 1px solid #cccccc;border-bottom: 1px solid #cccccc;">Evening Shift</td>
                        <?php
                        $getShift21 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$nextMon'  AND Shift='evening' ";
                        $shift_result21 = mysqli_query($conn, $getShift21);
                        $shift_row21 = mysqli_fetch_assoc($shift_result21);
                        if ($shift_row21) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else { ?>
                            <td class="c2"></td>
                        <?php }
                        ?>

                        <?php
                        $$getShift22 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$nextTue'  AND Shift='evening' ";
                        $shift_result22 = mysqli_query($conn, $getShift22);
                        $shift_row22 = mysqli_fetch_assoc($shift_result22);

                        if ($shift_row22) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else { ?>
                            <td class="c2"></td>
                        <?php }
                        ?>

                        <?php
                        $getShift23 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$nextWed'  AND Shift='evening'";
                        $shift_result23 = mysqli_query($conn, $getShift23);
                        $shift_row23 = mysqli_fetch_assoc($shift_result23);

                        if ($shift_row23) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else { ?>
                            <td class="c2"></td>
                        <?php }
                        ?>

                        <?php
                        $getShift24 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$nextThur'  AND Shift='evening'";
                        $shift_result24 = mysqli_query($conn, $getShift24);
                        $shift_row24 = mysqli_fetch_assoc($shift_result24);

                        if ($shift_row24) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else { ?>
                            <td class="c2"></td>
                        <?php }
                        ?>

                        <?php
                        $getShift25 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$nextFri'  AND Shift='evening' ";
                        $shift_result25 = mysqli_query($conn, $getShift25);
                        $shift_row25 = mysqli_fetch_assoc($shift_result25);

                        if ($shift_row25) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else { ?>
                            <td class="c2"></td>
                        <?php }
                        ?>

                        <?php
                        $getShift26 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$nextSat'  AND Shift='evening'";
                        $shift_result26 = mysqli_query($conn, $getShift26);
                        $shift_row26 = mysqli_fetch_assoc($shift_result26);

                        if ($shift_row26) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else { ?>
                            <td class="c2"></td>
                        <?php }
                        ?>

                        <?php
                        $getShift27 = "SELECT * FROM emp_shift WHERE EmpID='$staffID' AND Date='$nextSun' AND Shift='evening'";
                        $shift_result27 = mysqli_query($conn, $getShift27);
                        $shift_row27 = mysqli_fetch_assoc($shift_result27);

                        if ($shift_row27) {

                        ?>
                            <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                        <?php
                        } else { ?>
                            <td class="c2"></td>
                        <?php }
                        ?>

                    </tr>
                </table>
            </div>
        </div>
    </section>

</body>

</html>