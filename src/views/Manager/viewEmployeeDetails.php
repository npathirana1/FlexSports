<?php

use LDAP\Result;

include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            Update Employee
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/modal.css">
        <style>
            input[type=date],
            input[type=tel],
            input[type=email],
            input[type=text],
            input[type=password],
            select {
                width: 100%;
                padding: 10px;
                margin: 5px 0 10px 0;
                border: none;
                border-radius: none;
                background: #f1f1f1;
            }

            .modal__title {
                font-size: 25px;
                text-align: center;
                color: #dfdfdf;
                padding: 20px 0;
                border-bottom: 1px solid #cccccc;
                background-color: #0F305B;
                border-radius: 10px;
            }

            .horizontal-group .left {
                float: left;
                width: 49%;
            }

            .horizontal-group .right {
                float: right;
                width: 49%;
            }
        </style>
    </head>

    <body>
        <?php include "managerIncludes/ManagerNavigation.php"; ?>

        <section class="home-section">
            <nav class="breadcrumb-nav">
                <div class="top-breadcrumb">
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" style="color: #fff;">Users</li>
                            <li class="breadcrumb-item"><a href="viewEmployee.php">Employees</a></li>
                            <li class="breadcrumb-item" style="color: #42ecf5;">View Details</a></li>
                        </ul>
                    </div>
                </div>
                <div>
                    <!--<img src="images/profile.jpg" alt="">-->
                    <span class="admin_name"><?php echo $_SESSION['managerID']; ?></span>
                    <!--i class='bx bx-chevron-down'></i-->
                </div>

            </nav>
            <?php

            ?>

            <div class="home-content" style="padding-top: 10%;">
                
                <div class="pgrid-container">
                    <div class="pitem1">
                        Employee Details
                    </div>
                    <?php
                    $ID = $_REQUEST["id"];
                    $query1 = "SELECT UserType FROM user_login WHERE ID='$ID'";
                    $exe1 =  mysqli_query($conn, $query1); //get the userdetails
                    $result1 = mysqli_fetch_assoc($exe1);
                    $UserType = $result1["UserType"];

                    if ($UserType == 'manager') {
                        $TableName = "manager_staff";
                    } elseif ($UserType == 'receptionist') {
                        $TableName = "receptionist_staff";
                    } elseif ($UserType == 'facilityworker') {
                        $TableName = "facility_staff";
                    } else {
                        echo
                        "<script>
                            alert('Invalid User');
                            window.location.href = '../viewEmployee.php';
                        </script>";
                    }
                    $query2 = "SELECT * FROM $TableName WHERE EmpID='$ID'";
                    $exe2 = mysqli_query($conn, $query2);
                    $result2 = mysqli_fetch_assoc($exe2);

                    ?>
                    <div class="pitem2">
                        <?php
                        if ($UserType == 'manager') {
                            echo "<img src='../../assets/Images/managerProfilePicture.jpg' class='rec'></img>";
                        } elseif ($UserType == 'receptionist') {
                            echo "<img src='../../assets/Images/receptionist.png' class='rec'></img>";
                        } elseif ($UserType == 'facilityworker') {
                            echo "<img src='../../assets/Images/fwprofile.png' class='rec'></img>";
                        }
                        ?>

                        <div style="font-size: 16px;">User Type : <?php echo $UserType; ?></div>
                        
                    </div>

                    <div class="pitem3" style="padding-top: 3%;">
                        <div class="profSettings">
                        <div style="font-size: 16px;">Name : <?php  echo $result2["FName"] . " " . $result2["LName"]; ?></div>
                        <div style="font-size: 16px;">Gender : <?php echo $result2['Gender']; ?></div>
                        <div style="font-size: 16px;">NIC : <?php echo $result2['NIC']; ?></div>
                        <div style="font-size: 16px;">Date of Birth : <?php echo $result2['DOB']; ?></div>
                        <div style="font-size: 16px;">Date of Birth : <?php echo $result2['ContactNo']; ?></div> 
                        <div style="font-size: 16px;">Date of Birth : <?php echo $result2['Email']; ?></div> 
                        <div style="font-size: 16px;">Date of Birth : <?php echo $result2['Address']; ?></div>

                        <div style="text-align: right; margin-right:20%;">
                            <a href="./updateEmployee.php?id=<?=$ID?>"><button type="update" name="update" class="changepsword">Update</button></a>
                        </div>
                    </div>

                </div>
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