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

        .form_btn {
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 30%;
        }

        .form-footer {
            margin-top: 8px;
        }

        .form-group-left {
            margin-top: 20px;
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
                            <div class="box-topic">Casual Leaves available for this month</div>
                            <div class="number">02</div>
                        </div>

                    </div>
                    <div class="box">
                        <div class="right-side">
                            <div class="box-topic">Annual Leaves available for this month</div>
                            <div class="number">14</div>
                        </div>

                    </div>
                    <div class="box">
                        <div class="right-side">
                            <div class="box-topic">Total leaves available for this Year</div>
                            <div class="number">16</div>

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
                            <th>Leave date</th>
                            <th>Requested date</th>
                            <th>Leave type</th>
                            <th>Description</th>
                            <th>End Date</th>
                            <th>Update</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $viewLeaves = "SELECT * FROM user_login WHERE Email ='$userEmail'";
                        $cResult1 = mysqli_query($conn, $viewLeaves);
                        $row = mysqli_fetch_assoc($cResult1);
                        $staffID = $row['ID'];


                        $viewLeave = "SELECT * FROM leave_request WHERE EmpID ='$staffID'";
                        $cResult = mysqli_query($conn, $viewLeave);
                        while ($row1 = mysqli_fetch_assoc($cResult)) { ?>
                            <tr>
                                <td><?php echo $row1["LDate"]; ?></td>
                                <td><?php echo $row1["LeaveMode"]; ?></td>
                                <td><?php echo $row1["LeaveType"]; ?></td>
                                <td><?php echo $row1["LDescription"]; ?></td>
                                <td><?php echo $row1["EDate"]; ?></td>
                                <td><button class="button update">Update</button></td>
                                <td><button class="button remove">Delete</button></td>


                            </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>

            <div id="Approved" class="tabcontent">

                <table class="table_view">
                    <thead>
                        <tr>
                            <th>Leave date</th>
                            <th>Requested date</th>
                            <th>Leave type</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>4/2/2020</td>
                            <td>2/2/2020</td>
                            <td>Full day</td>
                            <td>Personal Reasons</td>
                            <td>Approved</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div id="Rejected" class="tabcontent">

                <table class="table_view">
                    <thead>
                        <tr>
                            <th>Leave date</th>
                            <th>Requested date</th>
                            <th>Leave type</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Rejected reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>4/2/2020</td>
                            <td>2/2/2020</td>
                            <td>Full day</td>
                            <td>Personal Reasons</td>
                            <td>Rejected</td>
                            <td>The number of reservations are too high</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="wrapper">
            <div class="icon add">
                <div class="tooltip">Leave Application</div>
                <span><a href="#modal-opened" class="link-1" id="modal-closed"><i class="fas fa-plus" style="font-size: 25px;"></i></a></span>
            </div>
        </div>

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
                                        <input style="min-width:375px; min-height:43px; margin-top:4px;" type="time" name="time" class="form-control" min="06:00" max="22:00">
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