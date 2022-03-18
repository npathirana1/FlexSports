<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/modal.css">
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script>


        <title>Leaves</title>

        <style>
            .home-section {
                padding-top: 0.5px;
                margin-left: 0;
            }

            .leave {
                width: 150px;
                font-weight: bold;
                background-color: #0F305B;
            }

            .box-1,
            .box-2 {
                display: inline-block;
                width: 50%;
                height: 10px;
            }

            .box-2 {
                text-align: right;
            }

            .form_title {
                color: #0F305B;
            }


            .tablinks {
                border-style: none;
            }

            /* The Modal (background) */

            .modal {
                width: 40%;
                position: relative;
                overflow-y: auto;
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

            textarea {
                width: 100%;
                padding: 15px;
                display: inline-block;
                border: none;
                background: #f1f1f1;
            }

            textarea:focus {
                background-color: #ddd;
                outline: none;
            }

            .action {
                padding: 8%;
            }

            table {
                width: 100%;
            }

            .tabcontent {
                margin-left: 0;
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
                            <li class="breadcrumb-item" style="color: #fff;">Leave List</li>
                        </ul>
                    </div>

                </div>
                <div>
                    <!--<img src="images/profile.jpg" alt="">-->
                    <span class="admin_name"><?php echo $_SESSION['managerID']; ?></span>
                    <!--i class='bx bx-chevron-down'></i-->
                </div>

            </nav>

            <div class="home-content" style="padding-top: 10%; padding-left: 0;">
                <!--h2 class="form_title">Leave List</h2-->
                <span onclick="goBack()" style="float: right;" class="go_back">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </span>
                <br>
                <div class="tab">
                    <button class="tablinks" onclick="openTable(event, 'Pending')" id="defaultOpen">Pending Leave</button>
                    <button class="tablinks" onclick="openTable(event, 'Approved')">Approved Leave</button>
                    <button class="tablinks" onclick="openTable(event, 'Rejected')">Rejected Leave</button>

                </div>
                <div id="Pending" class="tabcontent">
                    <center>
                        <table class="table_view">
                            <thead>
                                <tr>
                                    <th style="width: 13%;">Leave date</th>
                                    <th style="width: 13%;">Requested date</th>
                                    <th style="width: 13%;">Leave type</th>
                                    <th>Employee Name</th>
                                    <th>Description</th>
                                    <th style="width: 13%;">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM leave_request WHERE LeaveStatus='Pending'");

                                if (mysqli_num_rows($result) > 0) {
                                    $i = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $leaveNo = $row["LeaveNo"];
                                        $ID = $row["EmpID"];
                                        $call2 = "SELECT UserType FROM user_login WHERE ID='$ID'";
                                        $result2 = mysqli_query($conn, $call2);
                                        $row2 = mysqli_fetch_assoc($result2);
                                        $UserType = $row2["UserType"];
                                        if ($UserType == 'manager') {
                                            $TableName = "manager_staff";
                                        } elseif ($UserType == 'receptionist') {
                                            $TableName = "receptionist_staff";
                                        } elseif ($UserType == 'facilityworker') {
                                            $TableName = "facility_staff";
                                        }

                                        $call3 = "SELECT FName,LName FROM $TableName WHERE EmpID='$ID'";
                                        $result3 = mysqli_query($conn, $call3);
                                        $row3 = mysqli_fetch_assoc($result3);
                                        $Fname = $row3["FName"];
                                        $Lname = $row3["LName"];
                                ?>
                                        <tr>
                                            <td><?php echo $row["AppiedDate"]; ?></td>
                                            <td><?php echo $row["LDate"] . " " . $row["EDate"]; ?></td>
                                            <td><?php echo $row["LeaveType"]; ?></td>
                                            <td><?php echo "$Fname" . " " . "$Lname"; ?></td>
                                            <td><?php echo $row["LDescription"]; ?></td>
                                            <td><?php echo $row["LeaveStatus"]; ?></td>
                                            <td><?php echo "<form action='./managerIncludes/handelLeave.inc.php' method='POST' name='handelLeave'>
                                        <button class='action update' name='Accept' value='$leaveNo'><i class='fa fa-check RepImage' aria-hidden='true'></i>
                                        </button></form>
                                        
                                        <button class='action remove'><div class='icon add'><span><a href='#modal-opened' class='link-1' id='modal-closed $leaveNo'><i class='fa fa-times RepImage' aria-hidden='true'></i></a>
                                        </span></div></button>" ?>
                                            </td>
                                        </tr>
                                        <!--Model for trial is starting here-->
                                        <div class="modal-body">
                                            <div class="modal-container" id="modal-opened">
                                                <div class="modal">

                                                    <div class="modal__details">
                                                        <h1 class="modal__title">Reject Application for Leave</h1>
                                                        <?php echo $leaveNo; ?>
                                                    </div>

                                                    <form action='./managerIncludes/handelLeave.inc.php' method='POST' name='handelLeave'>
                                                        <div class="form-body">

                                                            <div class="form-group-left">
                                                                <label for=""></label>
                                                                <textarea placeholder="Reason for Rejection" name="rejReason" class="form-control"></textarea>
                                                            </div>

                                                        </div>

                                                        <div class="form-footer">
                                                            <button type="submit" name="Reject" value="<?php echo $leaveNo ?>" class="btn btn-primary form_btn">Reject</button>
                                                        </div>

                                                    </form>

                                                    <a href="handelLeave.php" class="link-2"></a>

                                                </div>
                                            </div>
                                        </div>
                                        <!--Model for trial is Ending here-->
                                    <?php
                                        $i++;
                                    }
                                    ?>
                            </tbody>
                        </table>
                    <?php
                                } else {
                                    echo "No result found";
                                }
                    ?>
                    </center>
                </div>

                <div id="Approved" class="tabcontent">
                    <center>
                        <table class="table_view">
                            <thead>
                                <tr>
                                    <th style="width: 13%;">Leave date</th>
                                    <th style="width: 13%;">Requested date</th>
                                    <th style="width: 13%;">Leave type</th>
                                    <th>Employee Name</th>
                                    <th>Description</th>
                                    <th style="width: 13%;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $SAppLeave = mysqli_query($conn, "SELECT * FROM leave_request WHERE LeaveStatus='Approved'");

                                if (mysqli_num_rows($SAppLeave) > 0) {
                                    $i = 0;
                                    while ($Arow = mysqli_fetch_array($SAppLeave)) {
                                        $AleaveNo = $Arow["LeaveNo"];
                                        $AID = $Arow["EmpID"];
                                        $AUseList = mysqli_query($conn, "SELECT UserType FROM user_login WHERE ID='$AID'");
                                        $Uselist = mysqli_fetch_assoc($AUseList);
                                        $UserType = $Uselist["UserType"];
                                        if ($UserType == 'manager') {
                                            $TableName = "manager_staff";
                                        } elseif ($UserType == 'receptionist') {
                                            $TableName = "receptionist_staff";
                                        } elseif ($UserType == 'facilityworker') {
                                            $TableName = "facility_staff";
                                        }

                                        $EmpName = mysqli_query($conn, "SELECT FName,LName FROM $TableName WHERE EmpID='$AID'");
                                        $EmpGName = mysqli_fetch_assoc($EmpName);
                                        $AFname = $EmpGName["FName"];
                                        $ALname = $EmpGName["LName"];
                                ?>
                                        <tr>
                                            <td><?php echo $Arow["LDate"] . " " . $Arow["EDate"]; ?></td>
                                            <td><?php echo $Arow["AppiedDate"]; ?></td>
                                            <td><?php echo $Arow["LeaveType"]; ?></td>
                                            <td><?php echo "$AFname" . " " . "$ALname"; ?></td>
                                            <td><?php echo $Arow["LDescription"]; ?></td>
                                            <td><?php echo $Arow["LeaveStatus"]; ?></td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                            </tbody>
                        </table>
                    <?php
                                } else {
                                    echo "No result found";
                                }
                    ?>
                    </center>
                </div>

                <div id="Rejected" class="tabcontent">
                    <center>
                        <table class="table_view">
                            <thead>
                                <tr>
                                    <th style="width: 13%;">Leave date</th>
                                    <th style="width: 13%;">Requested date</th>
                                    <th style="width: 13%;">Leave type</th>
                                    <th>Employee Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $RejLeave = mysqli_query($conn, "SELECT * FROM leave_request WHERE LeaveStatus='Declined'");

                                if (mysqli_num_rows($RejLeave) > 0) {
                                    $i = 0;
                                    while ($Rrow = mysqli_fetch_array($RejLeave)) {
                                        $RleaveNo = $Rrow["LeaveNo"];
                                        $RID = $Rrow["EmpID"];
                                        $RUseList = mysqli_query($conn, "SELECT UserType FROM user_login WHERE ID='$RID'");
                                        $Rejlist = mysqli_fetch_assoc($RUseList);
                                        $UserType = $Rejlist["UserType"];
                                        if ($UserType == 'manager') {
                                            $TableName = "manager_staff";
                                        } elseif ($UserType == 'receptionist') {
                                            $TableName = "receptionist_staff";
                                        } elseif ($UserType == 'facilityworker') {
                                            $TableName = "facility_staff";
                                        }

                                        $REmpName = mysqli_query($conn, "SELECT FName,LName FROM $TableName WHERE EmpID='$RID'");
                                        $REmpFName = mysqli_fetch_assoc($REmpName);
                                        $RFname = $REmpFName["FName"];
                                        $RLname = $REmpFName["LName"];
                                ?>
                                        <tr>
                                            <td><?php echo $Rrow["LDate"] . " " . $Rrow["EDate"]; ?></td>
                                            <td><?php echo $Rrow["AppiedDate"]; ?></td>
                                            <td><?php echo $Rrow["LeaveType"]; ?></td>
                                            <td><?php echo "$RFname" . " " . "$RLname"; ?></td>
                                            <td><?php echo $Rrow["LDescription"]; ?></td>
                                            <td><?php echo $Rrow["LeaveStatus"]; ?></td>
                                            <td><?php echo $Rrow["RejectReason"]; ?></td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                            </tbody>
                        </table>
                    <?php
                                } else {
                                    echo "No result found";
                                }
                    ?>
                    </center>
                </div>
                <!-- New Model-->

                <!-- The Modal -->

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

                // Get the modal
                var modal = document.getElementById("formModal");

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal 
                btn.onclick = function() {
                    modal.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>

        </section>
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>