<?php
include "../../config/db.php";
?>

<?php
if (isset($_SESSION['facilityworkerID'])) {
    $userEmail = $_SESSION['facilityworkerID'];
}
if (isset($_SESSION['managerID'])) {
    $userEmail = $_SESSION['managerID'];
}
if (isset($_SESSION['receptionistID'])) {
    $userEmail = $_SESSION['receptionistID'];
}

$leave_id = $_GET['id'];

$sql2 = "SELECT * FROM leave_request WHERE LeaveNo='$leave_id' AND LeaveStatus = 'Pending' ";
$user1 = mysqli_query($conn, $sql2);
$row_user1 = mysqli_fetch_assoc($user1);

//$leaveType = $row_user1["LeaveType"];
$leaveMode = $row_user1["LeaveMode"];
$ldate = $row_user1["LDate"];
$edate = $row_user1["EDate"];
$desc = $row_user1["LDescription"];

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
            width: 40%;
            /* height: 80%; */
            padding: 20px;
            border-radius: .8rem;
            color: var(--light);
            background: var(--background);
            box-shadow: .4rem .4rem 1.4rem .2rem #17335C;
            position: relative;
            overflow: hidden;
            margin-left: 25%;
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
                        <li class="breadcrumb-item"><a href="personalLeave.php">My Leaves</a></li>
                        <li class="breadcrumb-item"><a href="" style="color: #42ecf5;">Update Leave</a></li>
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

            </div>

            <?php if ($row_user1["LeaveMode"] == "Casual") { ?>
                <div id="modal-opened">
                    <div class="modal">

                        <div class="modal__details">
                            <h1 class="modal__title">Update Leave</h1>
                        </div>

                        <form action="./staffIncludes/updateLeave.inc.php" method="post" class="signup-form">
                            <div class="form-body">
                                <div class="form-group-left">
                                    <label for="ldate">Leave Date</label>
                                    <input type="date" id="ldate" name="ldate" value="<?php echo $ldate ?>" style="height:35px; width:300px;">
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
                                    <input type="radio" id="type1" name="type1" value="Casual" checked />
                                    <label for="type1"> Casual</label>&nbsp;&nbsp;
                                    <input type="radio" id="type1" name="type1" value="Annual" disabled />
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

                                    <div id="casual">
                                        <div class="radio-btn">
                                            <label for="">Leave Type</label>&nbsp; &nbsp; &nbsp;
                                            <input type="radio" name="type" value="FullDay" checked />
                                            <label for="">Full Day</label>&nbsp;&nbsp;
                                            <input type="radio" name="type" value="HalfDay" id="hday" disabled />
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
                                    <input type="text" placeholder="Reason for leave" name="leavReason" value="<?php echo $desc ?>" class="form-control">
                                </div>
                                <input type="hidden" name="leaveID" value="<?php echo $leave_id ?>" class="form-control">
                            </div>

                            <div class="form-footer">
                                <button type="submit" name="leave-submit" class="btn btn-primary form_btn">Update</button>
                            </div>

                        </form>

                    </div>
                </div>
            <?php } ?>


            <?php if ($row_user1["LeaveMode"] == "Annual") { ?>
                <div id="modal-opened">
                    <div class="modal">

                        <div class="modal__details">
                            <h1 class="modal__title">Update Leave</h1>
                        </div>

                        <form action="./staffIncludes/updateLeave.inc.php" method="post" class="signup-form">
                            <div class="form-body">
                                <div class="form-group-left">
                                    <label for="ldate">Leave Date</label>
                                    <input type="date" id="ldate" name="ldate" value="<?php echo $ldate ?>" style="height:35px; width:300px;">
                                </div>

                                <div class="radio-btn">
                                    <label for="ltype">Leave Mode</label>&nbsp; &nbsp; &nbsp;
                                    <input type="radio" id="type1" name="type1" value="Casual" disabled />
                                    <label for="type1"> Casual</label>&nbsp;&nbsp;
                                    <input type="radio" id="type1" name="type1" value="Annual" checked />
                                    <label for="type2"> Annual</label><br>
                                </div>

                                <div>
                                    <div class="form-group-left" id="eDate">
                                        <label for="edate">Return Date</label>
                                        <input type="date" id="edate" name="edate" value="<?php echo $edate ?>" style="height:35px; width:300px;">
                                    </div>
                                </div>

                                <div class="form-group-left">
                                    <label for=""></label>
                                    <input type="text" placeholder="Reason for leave" name="leavReason" value="<?php echo $desc ?>" class="form-control">
                                </div>
                                <input type="hidden" name="leaveID" value="<?php echo $leave_id ?>" class="form-control">
                            </div>

                            <div class="form-footer">
                                <button type="submit" name="leave-submit" class="btn btn-primary form_btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>

    </section>
</body>

</html>