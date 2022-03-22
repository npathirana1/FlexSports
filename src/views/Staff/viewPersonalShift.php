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

<?php 
        function check_in_range($startdate, $enddate, $userdate){
           if(($userdate >= $startdate) && ($userdate <= $enddate)){
                return true;
            }
        }
?>

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
            width: 95%;
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
                if( $tuesday> $staticfinish){
                    $tuesday = date('Y-m-d', strtotime('last Tuesday'));
                }
            }

            //Wednesday
            if (date('N') == 'Wednes') {
                $wednesday = date('Y-m-d');
            } else {
                $wednesday = date('Y-m-d', strtotime('next Wednesday'));
                if( $wednesday> $staticfinish){
                    $wednesday = date('Y-m-d', strtotime('last Wednesday'));
                }
            }

            //Thursday
            if (date('N') == 'Thurs') {
                $thursday = date('Y-m-d');
            } else {
                $thursday = date('Y-m-d', strtotime('next Thursday'));
                if( $thursday> $staticfinish){
                    $thursday = date('Y-m-d', strtotime('last Thursday'));
                }
            }

            //Friday
            if (date('N') == 'Fri') {
                $friday = date('Y-m-d');
            } else {
                $friday = date('Y-m-d', strtotime('next Friday'));
                if( $friday> $staticfinish){
                    $friday = date('Y-m-d', strtotime('last Friday'));
                }
            }  
            
            //Saturday
            if (date('N') == 'Satur') {
                $saturday = date('Y-m-d');
            } else {
                $saturday = date('Y-m-d', strtotime('next Saturday'));
                if( $saturday> $staticfinish){
                    $saturday = date('Y-m-d', strtotime('last Saturday'));
                }
            }  

            $nextMon = date('Y-m-d', strtotime($staticstart. ' + 7 days'));
            $nextTue = date('Y-m-d', strtotime($tuesday. ' + 7 days'));
            $nextWed = date('Y-m-d', strtotime($wednesday. ' + 7 days'));
            $nextThur = date('Y-m-d', strtotime($thursday. ' + 7 days'));
            $nextFri = date('Y-m-d', strtotime($friday. ' + 7 days'));
            $nextSat = date('Y-m-d', strtotime($saturday. ' + 7 days'));
            $nextSun = date('Y-m-d', strtotime($staticfinish. ' + 7 days'));

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
                        <td class="c3"><?php echo "$staticstart"?></td>
                        <td class="c3"><?php echo "$tuesday"?></td>
                        <td class="c3"><?php echo "$wednesday"?></td>
                        <td class="c3"><?php echo "$thursday"?></td>
                        <td class="c3"><?php echo "$friday"?></td>
                        <td class="c3"><?php echo "$saturday"?></td>
                        <td class="c3"><?php echo "$staticfinish"?></td>

                    </tr>

                    <?php 

                        $getID =  "SELECT * FROM user_login WHERE EMAIL='$userEmail' AND NOT UserType='customer' ";
                        $u_result =  mysqli_query($conn, $getID);
                        $u_row = mysqli_fetch_assoc($u_result);
                        
                        $staffID = $u_row['ID'];
                        $getShift = "SELECT * FROM emp_shift WHERE EmpID='$staffID' ";
                        $shift_result = mysqli_query($conn, $getShift);
                        $shift_row = mysqli_fetch_assoc($shift_result);

                        $getLeave = "SELECT * FROM leave_request WHERE EmpID='$staffID' AND NOT LeaveType='HalfDay' ";
                        $leave_result = mysqli_query($conn, $getLeave);
                        $leave_row = mysqli_fetch_assoc($leave_result);
            
                    ?>

                    <tr style="height: 80px;">
                        <td class="c1" style="border-top: 1px solid #cccccc;border-bottom: 1px solid #cccccc;">Morning Shift</td>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $staticstart ){
                                    if($shift == 'morning'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $tuesday){
                                    if($shift == 'morning'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                       <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                
                                if($shiftDate == $wednesday ){
                                    if($shift == 'morning'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $thursday ){
                                    if($shift == 'morning'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $friday ){
                                    if($shift == 'morning'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $saturday ){
                                    if($shift == 'morning'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                $leaveSDate = $leave_row['LDate'];
                                $leaveEDate = $leave_row['EDate'];

                                if($leaveSDate == $staticfinish){
                                ?>
                                    <td class="c2" style="background-color: red; color:#fff;">On Leave</td>
                                <?php
                                }else{
                                if($shiftDate == $staticfinish ){
                                    if($shift == 'morning'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            }
                            
                        ?>
                    </tr>
                    <tr style="height: 80px;">
                        <td class="c1" style="border-top: 1px solid #cccccc;border-bottom: 1px solid #cccccc;">Evening Shift</td>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $staticstart){  
                                    if($shift == 'evening'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                    <td class="c2"></td>
                                <?php } 
                        ?>
                         <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $monday){  
                                    if($shift == 'evening'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                    <td class="c2"></td>
                                <?php } 
                        ?>
                         <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $tuesday){  
                                    if($shift == 'evening'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                    <td class="c2"></td>
                                <?php } 
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $wednesday){  
                                    if($shift == 'evening'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                    <td class="c2"></td>
                                <?php } 
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $thursday){  
                                    if($shift == 'evening'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                    <td class="c2"></td>
                                <?php } 
                        ?>
                        
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $friday){  
                                    if($shift == 'evening'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                    <td class="c2"></td>
                                <?php } 
                        ?>
                         <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $saturday){  
                                    if($shift == 'evening'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                    <td class="c2"></td>
                                <?php } 
                        ?>
                         <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $staticfinish){  
                                    if($shift == 'evening'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                    <td class="c2"></td>
                                <?php } 
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
                        <td class="c3"><?php echo "$nextMon"?></td>
                        <td class="c3"><?php echo "$nextTue"?></td>
                        <td class="c3"><?php echo "$nextWed"?></td>
                        <td class="c3"><?php echo "$nextThur"?></td>
                        <td class="c3"><?php echo "$nextFri"?></td>
                        <td class="c3"><?php echo "$nextSat"?></td>
                        <td class="c3"><?php echo "$nextSun"?></td>

                    </tr>
                    <tr style="height: 80px;">
                        <td class="c1" style="border-top: 1px solid #cccccc;border-bottom: 1px solid #cccccc;">Morning Shift</td>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $nextMon ){
                                    if($shift == 'morning'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];


                                if($shiftDate == $nextTue){
                                    if($shift == 'morning'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                       <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $nextWed ){
                                    if($shift == 'morning'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $nextThur ){
                                    if($shift == 'morning'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $nextFri ){
                                    if($shift == 'morning'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $nextSat ){
                                    if($shift == 'morning'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $nextSun ){
                                    if($shift == 'morning'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                    </tr>
                    <tr style="height: 80px;">
                        <td class="c1" style="border-top: 1px solid #cccccc;border-bottom: 1px solid #cccccc;">Evening Shift</td>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $nextMon ){
                                    if($shift == 'evening'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $nextTue){
                                    if($shift == 'evening'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                       <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $nextWed ){
                                    if($shift == 'evening'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $nextThur ){
                                    if($shift == 'evening'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $nextFri ){
                                    if($shift == 'evening'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $nextSat ){
                                    if($shift == 'evening'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                        <?php 
                                $shiftDate = $shift_row['Date'];
                                $shift = $shift_row['Shift'];
                                if($shiftDate == $nextSun ){
                                    if($shift == 'evening'){
                                   ?>
                                         <td class="c2" style="background-color: green; color:#fff;">Scheduled</td>
                                    <?php
                                    }
                                }else{?>
                                        <td class="c2"></td>
                                    <?php
                                }
                            
                        ?>
                    </tr>
                </table>
            </div>
</div>
    </section>

</body>

</html>