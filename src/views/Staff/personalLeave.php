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
}
$sqlID = "SELECT * from user_login where Email ='" . $userEmail . "' ";
$resultID = mysqli_query($conn, $sqlID);
$row2 = mysqli_fetch_assoc($resultID);
$userId = $row2['ID'];

?>


<!DOCTYPE html>
<html>

<head>
    <title>My Leaves</title>
    <!-- <link rel="stylesheet" type="text/css" href="../../assets/CSS/fWLeaves.css"> -->

    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/modal.css">

    <style>
        .content .overview-boxes {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 20px;
            float: left;
            margin-bottom: 26px;
        }

        .overview-boxes .box {
            display: flex;
            align-items: center;
            justify-content: center;
            width: calc(100% / 3 - 25px);
            height: 150px;
            background: #fff;
            padding: 15px 14px;
            border-radius: 12px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            margin-left: 0%;
        }

        .overview-boxes .box-topic {
            font-size: 20px;
            font-weight: 500;
        }

        .content .box .number {
            display: inline-block;
            font-size: 35px;
            margin-top: -6px;
            font-weight: 500;
        }

        .modal {
            width: 30%;
            position: relative;
            overflow-y: auto;
        }

        input[type=text] {
            width: 100%;
            padding: 15px;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=date]:focus {
            background-color: #ddd;
            outline: none;
        }



        input[type=date] {
            font-size: 13px;
            background: #FEFDFB;
            padding: 10px;
            border-radius: 9px;
            font-family: sans-serif;
        }

        .radio-btn {
            padding-top: 30px;
        }
    </style>

    <script>
        function leaveTime(x) {
            if (x == 0) document.getElementById("time").style.display = "block";
            else document.getElementById("time").style.display = "none";
            return;
        }

        function leaveMode(y) {
            if (y == 0) {
                document.getElementById("casual").style.display = "block";
                document.getElementById("eDate").style.display = "none";
            } else {
                document.getElementById("eDate").style.display = "block";
                document.getElementById("casual").style.display = "none";
            }
            return;
        }
    </script>
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
                        <li class="breadcrumb-item" style="color: #fff;">My Profile</li>
                        <li class="breadcrumb-item"><a href="personalLeave.php" style="color: #42ecf5;">Applied Leave</a></li>
                        <!-- <li class="breadcrumb-item"><a href="leaveForm.php">Apply for leave</a></li> -->
                    </ul>
                </div>

            </div>
        </nav>

        <div class="home-content">
            <div class="header"></br></br></br>
                <div class="box-1 table_topic">
                    <h2>Applied Leave</h2>
                </div></br>
                <div class="overview-boxes">
                    <div class="box">
                        <div class="right-side">
                            <div class="box-topic">Casual Leaves available for this Year</div>
                            <div class="number">
                                <?php
                                $numberOfCasualLeaves = 7;
                                $query = "SELECT COUNT(LeaveNo) AS days FROM leave_request WHERE EmpID =$userId AND LeaveStatus = 'Approved' AND LeaveMode = 'Casual';";
                                //$query = "SELECT COUNT(LeaveNo) AS days FROM leave_request WHERE EmpID =$userId AND LeaveType = 'Casual';";
                                $Result = mysqli_query($conn, $query);
                                $casualLeaves = mysqli_fetch_assoc($Result);
                                $available1 = $numberOfCasualLeaves - $casualLeaves['days'];
                                echo $available1;
                                ?>
                            </div>
                        </div>

                    </div>
                    <div class="box">
                        <div class="right-side">
                            <div class="box-topic">Annual Leaves available for this month</div>
                            <div class="number">
                                <?php
                                $numberOfAnnualLeaves = 14;
                                $query1 = "SELECT DATEDIFF (EDate, LDate) AS 'difference' FROM leave_request WHERE EmpID =$userId AND LeaveStatus = 'Approved' AND LeaveMode = 'Annual';";
                                $query1 = mysqli_query($conn, $query1);
                                $count = 0;
                                for ($x = 0; $x < mysqli_num_rows($query1); $x++) {
                                    $temp = mysqli_fetch_assoc($query1);
                                    $count += $temp['difference'];
                                }
                                $available2 = $numberOfAnnualLeaves - $count;
                                echo $available2;
                                ?>
                            </div>
                        </div>

                    </div>
                    <div class="box">
                        <div class="right-side">
                            <div class="box-topic">Total leaves available for this Year</div>
                            <div class="number">
                                <?php
                                echo $available1 + $available2;
                                ?>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            </br>
            <div class="tab">
                <button class="tablinks" onclick="openTable(event, 'Pending')" id="defaultOpen">Pending Leave</button>
                <button class="tablinks" onclick="openTable(event, 'Approved')">Approved Leave</button>
                <button class="tablinks" onclick="openTable(event, 'Rejected')">Rejected Leave</button>

            </div>
            <div id="Pending" class="tabcontent">

                <table class="table_view">
                    <thead>
                        <tr>
                            <th>Applied date</th>
                            <th>Requested date</th>
                            <th>Leave type</th>
                            <th>Description</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $viewLeaves = "SELECT * FROM user_login WHERE Email ='$userEmail'";
                        $cResult1 = mysqli_query($conn, $viewLeaves);
                        $row = mysqli_fetch_assoc($cResult1);
                        $staffID = $row['ID'];
                        $viewLeave = "SELECT * FROM leave_request WHERE EmpID ='$staffID' AND LeaveStatus = 'Pending'";
                        $cResult = mysqli_query($conn, $viewLeave);
                        while ($row1 = mysqli_fetch_assoc($cResult)) { ?>
                            <tr>
                                <td><?php echo $row1["AppiedDate"]; ?></td>
                                <td><?php echo $row1["LDate"]; ?></td>
                                <td><?php echo $row1["LeaveType"]; ?></td>
                                <td><?php echo $row1["LDescription"]; ?></td>
                                <td><?php echo $row1["EDate"]; ?></td>
                                <td>
                                    <a href="updatePLeave.php?id=<?php echo $row1["LeaveNo"]; ?>"><button class='action update edit_data' type="button" name="edit" value="Edit" data-toggle="modal"><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i></button></a>
                                    <a href="#modal-delete"><button class='action remove delete_data' type="button" name="delete" value="Delete" id="<?php echo $row1["LeaveNo"]; ?>" data-toggle="modal"><i class='fa fa-trash RepImage' aria-hidden='true'></i></button></a>
                                </td>


                            </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>

            <div id="Approved" class="tabcontent">

                <table class="table_view">
                    <thead>
                        <tr>
                            <th>Requested date</th>
                            <th>Leave date</th>
                            <th>Leave Mode</th>
                            <th>Leave type</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>/
                        <tr>
                            <?php
                            $viewLeaves = "SELECT * FROM user_login WHERE Email ='$userEmail'";
                            $cResult1 = mysqli_query($conn, $viewLeaves);
                            $row = mysqli_fetch_assoc($cResult1);
                            $staffID = $row['ID'];
                            $viewLeave = "SELECT * FROM leave_request WHERE EmpID ='$staffID'  AND LeaveStatus = 'Approved'";
                            $cResult = mysqli_query($conn, $viewLeave);
                            while ($row1 = mysqli_fetch_assoc($cResult)) { ?>
                        <tr>
                            <td><?php echo $row1["AppiedDate"]; ?></td>
                            <td><?php echo $row1["LDate"]; ?></td>
                            <td><?php echo $row1["LeaveMode"]; ?></td>
                            <td><?php echo $row1["LeaveType"]; ?></td>
                            <td><?php echo $row1["LDescription"]; ?></td>
                        </tr>
                    <?php } ?>
                    </tr>

                    </tbody>
                </table>

            </div>

            <div id="Rejected" class="tabcontent">

                <table class="table_view">
                    <thead>
                        <tr>
                            <th>Requested date</th>
                            <th>Leave date</th>
                            <th>Leave type</th>
                            <th>Description</th>
                            <th>Rejected reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $viewLeaves = "SELECT * FROM user_login WHERE Email ='$userEmail'";
                            $cResult1 = mysqli_query($conn, $viewLeaves);
                            $row = mysqli_fetch_assoc($cResult1);
                            $staffID = $row['ID'];
                            $viewLeave = "SELECT * FROM leave_request WHERE EmpID ='$staffID'  AND LeaveStatus = 'Declined'";
                            $cResult = mysqli_query($conn, $viewLeave);
                            while ($row1 = mysqli_fetch_assoc($cResult)) { ?>
                        <tr>
                            <td><?php echo $row1["AppiedDate"]; ?></td>
                            <td><?php echo $row1["LDate"]; ?></td>
                            <td><?php echo $row1["LeaveMode"]; ?></td>
                            <td><?php echo $row1["LDescription"]; ?></td>
                            <td><?php echo $row1["RejectReason"]; ?></td>
                        </tr>
                    <?php } ?>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <?php if($available1 > 0){ ?>
        <div class="wrapper">
            <div class="icon add">
                <div class="tooltip">Leave Application</div>
                <span><a href="#modal-opened" class="link-1" id="modal-closed"><i class="fas fa-plus" style="font-size: 25px;"></i></a></span>
            </div>
        </div>
        <?php } ?>

        <div class="modal-body">
            <div class="modal-container" id="modal-opened">
                <div class="modal">

                    <div class="modal__details">
                        <h1 class="modal__title">Apply for Leave</h1>
                    </div>

                    <form action="./staffIncludes/leaveRequest.inc.php" method="post" class="signup-form">
                        <div class="form-body">
                            <div class="form-group-left">
                                <label for="ldate">Leave Date</label>
                                <input type="date" id="ldate" name="ldate" value="" style="height:35px; width:300px;">
                            </div>
                            <script language="javascript">
                                var today = new Date();
                                var dd = String(today.getDate()).padStart(2, '0');
                                var mm = String(today.getMonth() + 1).padStart(2, '0');
                                var yyyy = today.getFullYear();

                                today = yyyy + '-' + mm + '-' + dd;
                                $('#ldate').attr('min', today);
                            </script>


                            <div class="radio-btn">
                                <label for="ltype">Leave Mode</label>&nbsp; &nbsp; &nbsp;
                                <input type="radio" id="type1" name="type1" value="Casual" onclick="leaveMode(0)" />
                                <label for="type1"> Casual</label>&nbsp;&nbsp;
                                <input type="radio" id="type1" name="type1" value="Annual" onclick="leaveMode(1)" />
                                <label for="type2"> Annual</label><br>
                            </div>

                            <div>
                                <div class="form-group-left" id="eDate" style="display:none">
                                    <label for="edate">Return Date</label>
                                    <input type="date" id="edate" name="edate" value="" style="height:35px; width:300px;">
                                </div>

                                <script language="javascript">
                                    var today = new Date();
                                    var dd = String(today.getDate()).padStart(2, '0');
                                    var mm = String(today.getMonth() + 1).padStart(2, '0');
                                    var yyyy = today.getFullYear();

                                    today = yyyy + '-' + mm + '-' + dd;
                                    $('#edate').attr('min', today);
                                </script>
                                <div id="casual" style="display:none">
                                    <div class="radio-btn">
                                        <label for="">Leave Type</label>&nbsp; &nbsp; &nbsp;
                                        <input type="radio" name="type" value="FullDay" onclick="leaveTime(1)" />
                                          <label for="">Full Day</label>
                                        <input type="radio" name="type" value="HalfDay" id="hday" onclick="leaveTime(0)" />
                                          <label for="">Half Day</label>
                                    </div>

                                    <div class="form-group-left" id="time" style="display:none">
                                        <label for="start-time">Start Time</label> </br>
                                        <input style="min-width:100%; min-height:43px; margin-top:4px;" type="time" name="time" class="form-control" min="06:00" max="22:00">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-left">
                                <label for=""></label>
                                <input type="text" placeholder="Reason for leave" name="leavReason" class="form-control">
                            </div>

                        </div>

                        <div class="form-footer">
                            <button type="submit" name="leave-submit" class="btn btn-primary form_btn">Apply</button>
                        </div>

                    </form>

                    <a href="personalLeave.php" class="link-2"></a>

                </div>
            </div>
        </div>

        <script>
            function openTable(evt, Period) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(Period).style.display = "block";
                evt.currentTarget.className += " active";
            }

            document.getElementById("defaultOpen").click();
        </script>

    </section>
</body>

</html>


<!-- delete confirmation-->
<div class="modal-body">
    <div class="modal-container" id="modal-delete">
        <div class="modal">
            <form action="./staffIncludes/cancelLeave.inc.php" method="post" id="insert_form">
                <div class="form-body">

                    <div class="horizontal-group">
                        <h3>Cancel leave request?</h3>
                    </div>
                    <div class="form-group">
                        <br>
                        <p>This will be removed from your pending leave requests.</p>
                        <br>
                    </div>

                </div>
                <input type="hidden" name="leave_id" id="leave_id" />
                <div class="form-footer-d ">
                    <a href="personalLeave.php" class="cancel_btn">Cancel</a>
                    <button type="submit" name="submit" class="btn btn-primary form_btn_dlt">Delete</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '.delete_data', function() {
            var leave_id = $(this).attr("id");
            if (leave_id != '') {

                $.ajax({
                    url: "./staffIncludes/fetchLeave.inc.php",
                    method: "POST",
                    data: {
                        leave_id: leave_id
                    },
                    dataType: "json",
                    success: function(value) {
                        //$('#nic').val(value.NIC);
                        $('#leave_id').val(value.LeaveNo);
                        //$('#email').val(value.Email);
                    }
                });
            }

        });
    });
</script>