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
if (isset($_SESSION['facilityworkerID'])) {
    $staffEmail = $_SESSION['facilityworkerID'];
} elseif (isset($_SESSION['managerID'])) {
    $staffEmail = $_SESSION['managerID'];
} else {
    $staffEmail = $_SESSION['receptionistID'];
}
$sqlID = "SELECT * from user_login where Email ='" . $staffEmail . "' ";
$result = mysqli_query($conn, $sqlID);
$row1 = mysqli_fetch_assoc($result);
$userId = $row1['ID'];


?>

<!DOCTYPE html>
<html>

<head>
    <title>My Leaves</title>
    <!-- <link rel="stylesheet" type="text/css" href="../../assets/CSS/fWLeaves.css"> -->

    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/updtLeave.css">

    
    <style>
    


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
            <div class="header"></br></br></br></br> </div>
                <div class="box-1 table_topic">
                
                    <h2>Update Leave</h2>
                </div></br></br>

                <div class="group-1">

                <div class="modal__details">
                        <h1 class="modal__title">Update Leave</h1>
                    </div>

                    <form action="./staffIncludes/leaveRequest.inc.php" method="post" class="signup-form">
                        <div class="form-body">
                            <div class="form-group-left">
                                <label for="ldate">Leave No : 022</label>
                                <!--input type="date" id="ldate" name="ldate" value="" style="height:35px; width:300px;"-->
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
                            <button type="submit" name="leave-submit" class="btn btn-primary form_btn">Update</button>
                        </div>

                    </form>
                    </div>
            
        </div>
        
        </section>
</body>

</html>