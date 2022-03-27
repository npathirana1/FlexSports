<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Reports</title>
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.esm.min.js"></script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script><!-- used for charts-->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script><used to generate the PDF>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>used to generate the PDF -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <!--script type="text/javascript" src="./node_modules/html2canvas/dist/html2canvas.js"></script-->
        <!-- used to generate the PDF-->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <style>
            .reportBox {
                /*border-style: solid;*/
                border-radius: 5%;
                border-width: 0.1%;
                margin: 1%;
                margin-bottom: 5%;

            }

            .topRow {
                display: grid;
                grid-template-columns: 66% 33%;

            }

            .reservationUsers {
                float: left;
                margin-left: 2%;


            }

            .middleRow {
                display: grid;
                grid-template-columns: 33% 33% 33%;
            }

            .otherDetails {
                float: left;
                margin-left: 2%;
            }

            .Registration {
                float: left;

            }

            #reservationReport {
                transform: scale(0.9);
            }

            #report {
                height: 40px;
                width: 50%;
                font-size: 18px;
                background-color: #0F305B;
                color: #f1f1ff;
                text-align: center;
                border: none;
            }

            #report a,
            a:hover,
            a:focus,
            a:active {
                text-decoration: none;
                color: inherit;
            }

            /*text decorations of the reports*/
            .maintopic {
                font-size: 25px;
                font-weight: 500;
                padding-bottom: 5%;
            }

            .subtopic {
                font-size: 17px;
                font-weight: 300;
                padding-top: 5%;
            }

            .values {
                font-size: 25px;
                font-weight: 600;
                text-align: right;
            }

            .count {
                padding-left: 20%;
            }

            .userRow {
                padding-top: 25%;
            }

            td {
                font-size: 15px;
                font-weight: 500;
            }
        </style>

    </head>

    <body>

        <?php include "managerIncludes/managerNavigation.php"; ?>

        <section class="home-section">
            <nav class="breadcrumb-nav">
                <div class="top-breadcrumb">
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" style="color: #fff;">Reports</li>
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
                <!--span onclick="goBack()" style="float: right;" class="go_back">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </span-->
                <?php
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
                //previous week start date and end date
                $staticlastfinist = date('Y-m-d', strtotime($staticstart . "-1 days"));
                $staticlaststart = date('Y-m-d', strtotime($staticlastfinist . "-6 days"));
                ?>
                <div id="ToPrint">
                    <div id="Row1">
                        <div class="topRow">
                            <div class="reportBox reservationUsers" id="ReservationTable">
                                <div class="maintopic">Reservation
                                </div>
                                <div id="reservationReport">
                                    <div class="top-sales box" width="400" height="400">
                                        <canvas id="mybar"></canvas>
                                        <!-- <script src="../../assets/JS/reservationSummary.js"></script> -->
                                    </div>
                                </div>
                            </div>
                            <div class="reportBox reservationUsers">
                                <div style="margin-bottom: 10%; text-align:right;">
                                    <button type="submit" id="report">
                                        <a href="./managerIncludes/fetchReportData.php" id="download" target="_blank">Generate Report
                                        </a>
                                    </button>
                                </div>
                                <div id="ResSummary">
                                    <?php
                                    // $reservaion_query = "SELECT  COUNT(ReservationNo) AS TotalRes FROM reservation WHERE date>='$staticstart' AND date<='$staticfinish';";
                                    $recervation_query = mysqli_query($conn, "SELECT  COUNT(ReservationNo) AS TotalRes FROM reservation WHERE date>='$staticstart' AND date<='$staticfinish';");
                                    $recervation_result = mysqli_fetch_assoc($recervation_query);
                                    $confirmed_recervation_query = mysqli_query($conn, "SELECT  COUNT(ReservationNo) AS ConfirmRes FROM reservation WHERE date>='$staticstart' AND date<='$staticfinish' AND ReservationStatus='Confirmed';");
                                    $confirmed_recervation_result = mysqli_fetch_assoc($confirmed_recervation_query);
                                    $pending_recervation_query = mysqli_query($conn, "SELECT  COUNT(ReservationNo) AS PendingRes FROM reservation WHERE date>='$staticstart' AND date<='$staticfinish' AND ReservationStatus='Pending';");
                                    $pending_recervation_result = mysqli_fetch_assoc($pending_recervation_query);
                                    $cancel_recervation_query = mysqli_query($conn, "SELECT  COUNT(ReservationNo) AS CancelRes FROM reservation WHERE date>='$staticstart' AND date<='$staticfinish' AND ReservationStatus='Cancelled';");
                                    $cancel_recervation_result = mysqli_fetch_assoc($cancel_recervation_query);
                                    ?>
                                    <div class="reportBox otherDetails">
                                        <span class="maintopic">
                                            <center>This Weeks Reservation Summary</center>
                                        </span><br><br>
                                        <table>
                                            <tr>
                                                <td><span class="subtopic">Total number of Reservetions Made</span></td>
                                                <td style="padding-left: 5%;"><span class="values"><?php echo $recervation_result['TotalRes']; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="subtopic">Total number of Reservetions Confirmed</span></td>
                                                <td style="padding-left: 5%;"><span class="values"><?php echo $confirmed_recervation_result['ConfirmRes']; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="subtopic">Total number of Reservetions Pending</span></td>
                                                <td style="padding-left: 5%;"><span class="values"><?php echo $pending_recervation_result['PendingRes']; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="subtopic">Total number of Reservetions Cancelled</span></td>
                                                <td style="padding-left: 5%;"><span class="values"><?php echo $cancel_recervation_result['CancelRes']; ?></span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="middleRow">


                            <div class="reportBox otherDetails" id="resinquiries">

                                <?php
                                // $reservaion_query = "SELECT  COUNT(ReservationNo) AS TotalRes FROM reservation WHERE date>='$staticstart' AND date<='$staticfinish';";
                                $inquiry_query = mysqli_query($conn, "SELECT  COUNT(InquiryNo) AS Totalinq FROM inquiry WHERE date>='$staticstart' AND date<='$staticfinish';;");
                                $inquiry_result = mysqli_fetch_assoc($inquiry_query);

                                ?>
                                <div class="maintopic">
                                    Inquires Recieved
                                </div>

                                <div style="margin-bottom: 45%;">

                                    <div style="height:6vh; width:15vw">
                                        <canvas id="noInquiry"></canvas>
                                        <!-- <script src="../../assets/JS/inqCount.js"></script> -->
                                    </div>
                                </div>
                                <div></div>
                                <div style="margin-top:20%;">
                                    <table>
                                        <tr>
                                            <td><span class="subtopic">Total No. of Inquires Recieved</span></td>
                                            <td style="padding-left: 5%;">
                                                <center><span class="values"><?php echo $inquiry_result['Totalinq']; ?></span></center>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            <div id="usersummary">
                                <?php
                                // $reservaion_query = "SELECT  COUNT(ReservationNo) AS TotalRes FROM reservation WHERE date>='$staticstart' AND date<='$staticfinish';";
                                $users_query = mysqli_query($conn, "SELECT  COUNT(ID) AS Totalusers FROM user_login;");
                                $users_result = mysqli_fetch_assoc($users_query);
                                $customer_query = mysqli_query($conn, "SELECT  COUNT(CustomerID) AS Totalcust FROM customer;");
                                $customer_result = mysqli_fetch_assoc($customer_query);
                                $manager_query = mysqli_query($conn, "SELECT  COUNT(EmpID) AS Totalmang FROM manager_staff;");
                                $manager_result = mysqli_fetch_assoc($manager_query);
                                $reception_query = mysqli_query($conn, "SELECT  COUNT(EmpID) AS Totalrec FROM receptionist_staff;");
                                $reception_result = mysqli_fetch_assoc($reception_query);
                                $facilityworker_query = mysqli_query($conn, "SELECT  COUNT(EmpID) AS Totalfaci FROM facility_staff;");
                                $facilityworker_result = mysqli_fetch_assoc($facilityworker_query);
                                ?>
                                <span class="maintopic">Users</span><br>
                                <table border="0">
                                    <tr class="userRow">
                                        <td>Customers</td>
                                        <td class="count"><?php echo $customer_result['Totalcust']; ?></td>
                                    </tr>
                                    <tr class="userRow">
                                        <td>Manager</td>
                                        <td class="count"><?php echo $manager_result['Totalmang']; ?></td>
                                    </tr>
                                    <tr class="userRow">
                                        <td>Receptionist</td>
                                        <td class="count"><?php echo $reception_result['Totalrec']; ?></td>
                                    </tr>
                                    <tr class="userRow">
                                        <td>Facility Worker</td>
                                        <td class="count"><?php echo $facilityworker_result['Totalfaci']; ?></td>
                                    </tr>
                                    <tr class="userRow">
                                        <td class="subtopic">Total no. of Users</td>
                                        <td class="values count"><?php echo $users_result['Totalusers']; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="reportBox otherDetails" id="regsummary">
                                <div>
                                    <div class="maintopic">Registrations
                                    </div>
                                    <div>
                                        <canvas id="myLine"></canvas>
                                        <!--<script src="../../assets/JS/registraions.js"></script> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="editor" style="display:none">
                    <img src="">
                </div>
            </div>
            <?php
            //******************************Reservation data***************************** */
            $get_facilities_query = mysqli_query($conn, "SELECT FacilityName FROM facility WHERE FacilityName!='Office' AND FacilityName!='Reception'GROUP BY FacilityName;");
            $facilities = array();
            $noOfReservation_thisweek = array();
            $noOfReservation_lastweek = array();

            while ($get_facilities_result = mysqli_fetch_assoc($get_facilities_query)) {
                $FaciName = $get_facilities_result["FacilityName"];
                $facilities[] = $FaciName;
                $data_reservation_query = mysqli_query($conn, "SELECT COUNT(ReservationNo) AS FaciRes FROM reservation WHERE date>='$staticstart' AND date<='$staticfinish' AND FacilityName='$FaciName';");
                while ($data_reservation_result = mysqli_fetch_assoc($data_reservation_query)) {
                    $this_week = $data_reservation_result['FaciRes'];
                    $noOfReservation_thisweek[] = $this_week;
                }
                $lastweek_reservation_query = mysqli_query($conn, "SELECT COUNT(ReservationNo) AS FaciRes FROM reservation WHERE date>='$staticlaststart' AND date<='$staticlastfinist' AND FacilityName='$FaciName';");
                while ($lastweek_reservation_result = mysqli_fetch_assoc($lastweek_reservation_query)) {
                    $last_week = $lastweek_reservation_result['FaciRes'];
                    $noOfReservation_lastweek[] = $last_week;
                }
            }
            //*****************************Inquiry data******************************* */
            $inquiry_type = array();
            $inquiry_type_count = array();

            $get_inquiry_query = mysqli_query($conn, "SELECT InquiryType, COUNT(InquiryNo) AS TotalInq FROM inquiry WHERE date>='$staticstart' AND date<='$staticfinish' GROUP BY InquiryType ;");
            while ($get_inquiry_result = mysqli_fetch_assoc($get_inquiry_query)) {
                $type = $get_inquiry_result['InquiryType'];
                $type_count = $get_inquiry_result['TotalInq'];
                $inquiry_type[] = $type;
                $inquiry_type_count[] = $type_count;
            }

            //*************************************Registration data**************************** */

            $registrations = array();
            

            for($lk=1;$lk<=12;$lk++){
                $get_regrestration_query = mysqli_query($conn, "SELECT MONTH(Date), COUNT(ID) AS regrastaraion FROM `user_login` WHERE UserType='customer' AND MONTH(Date)=$lk;");
                while ($get_regrestration_result = mysqli_fetch_assoc($get_regrestration_query)) {
                    $REGNo = $get_regrestration_result["regrastaraion"];
                    $registrations[] = $REGNo;
                }
            }
            // 

            // 
            // 
            ?>
            </div>
        </section>
        <!--Reservaton barchart-->
        <script>
            const ctx = document.getElementById('mybar').getContext('2d');
            const label = <?php echo json_encode($facilities); ?>;
            const infor1 = <?php echo json_encode($noOfReservation_thisweek); ?>;
            const infor2 = <?php echo json_encode($noOfReservation_lastweek); ?>;
            const mybar = new Chart(ctx, {
                type: 'bar',

                data: {
                    labels: label,
                    datasets: [{
                            label: 'Current Week',
                            data: infor1,
                            backgroundColor: [
                                'rgba(15, 48, 91)'
                            ],
                            borderColor: [
                                'rgba(15, 48, 91)'
                            ],
                            borderWidth: 1
                        },
                        {
                            label: 'Last Week',
                            data: infor2,
                            backgroundColor: [
                                'rgba(156, 156, 156)'
                            ],
                            borderColor: [
                                'rgba(156, 156, 156)'
                            ],
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        <!--Regisstration barchart-->
        <script>
            const reg = document.getElementById('myLine').getContext('2d');
            const regno =<?php echo json_encode($registrations); ?>;
            const myLine = new Chart(reg, {
                type: 'bar',

                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Number Of Registrations',
                        data: regno,
                        backgroundColor: [
                            'rgba(15, 48, 91)'
                        ],
                        borderColor: [
                            'rgba(15, 48, 91)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        <!--Inquiries doughnutchart-->
        <script>
            const inq = document.getElementById('noInquiry').getContext('2d');
            const InqType = <?php echo json_encode($inquiry_type); ?>;
            const Inqcount = <?php echo json_encode($inquiry_type_count); ?>;
            const noInquiry = new Chart(inq, {
                type: 'doughnut',

                data: {
                    labels: InqType,
                    datasets: [{
                        label: 'Number Of Registrations',
                        data: Inqcount,
                        backgroundColor: [
                            'rgba(15, 48, 91)',
                            'rgba(122, 122, 122)',
                            'rgba(26, 83, 158)',
                            'rgba(156, 156, 156)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    width: 50
                }
            });
        </script>

    </html>
<?php
} else {
    header('Location: ../login.php');
}
?>