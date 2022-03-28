<?php

include("../../../config/db.php");
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="../../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../../assets/CSS/staffMain.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .table_view {
                border-collapse: collapse;
                font-size: 0.9em;
                width: 100%;
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
        <table class="table_view">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $scheduledDate = '2022-04-06';
                $searchingFaci = 'reception';
                if ($searchingFaci == 'reception') {
                    $EmpTable = 'receptionist_staff';
                } elseif ($searchingFaci == 'office') {
                    $EmpTable = 'manager_staff';
                } else {
                    $EmpTable = 'facility_staff';
                }
                //check the current day
                if (date($scheduledDate, 'D') != 'Mon') {
                    //take the last monday
                    $staticstart = date('Y-m-d', strtotime('last Monday'), $scheduledDate);
                } else {
                    $staticstart = $scheduledDate;//date('Y-m-d', );
                }
$week=date('W',strtotime($scheduledDate));
$year=date('Y',strtotime($scheduledDate));
echo $week;
echo $year;

    $dto = new DateTime();
    $dto->setISODate($year, $week);
    $staticstart = $dto->format('Y-m-d');
    $dto->modify('+6 days');
    $staticfinish = $dto->format('Y-m-d');
    echo $staticstart;
    echo  $staticfinish;

 
  print_r($week_array);
                //always next saturday

                if (date($scheduledDate) == 'Sun') {
                    $staticfinish = date('Y-m-d');
                } else {
                    $staticfinish = date('Y-m-d', strtotime('next Sunday'));
                }
                

                $candi1 = array();
                $candi2 = array();
                $candi3 = array();
                $finalList = array();

                //*************************Get all the possible employees************** */
                $get_allemp_query = mysqli_query($conn, "SELECT EmpID FROM $EmpTable';");
                //echo $EmpTable;
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
                //*************************Check if they are on leave************************** */
                for ($j = 0; $j < sizeof($candi2); $j++) {
                    $get_freeemp_query = mysqli_query($conn, "SELECT EmpID FROM leave_request WHERE LDate!=$date AND (LDate>$date AND EDate< $date OR EDate= NULL) AND EmpID=$candi2[$j];");
                    while ($get_freeemp_result = mysqli_fetch_array($get_freeemp_query)) {
                        $tcandiEmpID = $get_freeemp_result['EmpID'];

                        $candi3[] = $tcandiEmpID;
                    }
                }
                ?>
                <?php
                print_r($candi1);
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
    </body>
    </head>
<?php
    mysqli_close($conn);
} else {
    header('Location: ../login.php');
}
