<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Add Employee
    </title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
    <style>
        input[type=date],
        input[type=tel],
        input[type=email],
        input[type=text],
        input[type=password],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 22px 0;
            border: none;
            border-radius: none;
            background: #f1f1f1;
        }
    </style>
</head>

<body>
    <?php include 'managerIncludes/ManagerNavigation.php'; ?>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <!-- <i class='bx bx-menu sidebarBtn'></i> -->
                <span class="dashboard">Employees</span>
                <div>
                    <ul class="breadcrumb">
                        <li><a href="viewEmployee.php">Employees</a></li>
                        <li>Add Employee</li>
                    </ul>
                </div>
            </div>
            <div>
                <!--<img src="images/profile.jpg" alt="">-->
                <span class="admin_name"><?php echo $_SESSION['managerID']; ?></span>
                <!--i class='bx bx-chevron-down'></i-->
            </div>

        </nav>

        <div class="home-content">
            <span onclick="goBack()" style="float: right;" class="go_back">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </span>
            <form form action="./managerIncludes/addUser.inc.php" name="addUser" class="form_body" method="POST">
                <div class="form_box">
                    <p class="form_title">Add User</p>
                    <div class="form_content">
                        <!--label>
                        NIC
                    </label-->
                        <input type="text" name="NIC" placeholder="NIC">
                        <br />
                        <!--label>
                        First Name
                    </label-->
                        <input type="text" name="fname" placeholder="First Name">
                        <br />
                        <!--label>
                        Last Name
                    </label-->
                        <input type="text" name="lname" placeholder="Last Name">
                        <br />
                        <!--label>
                        Date of Birth
                    </label-->
                        <input placeholder="Date of Birth" type="text" onfocus="(this.type = 'date')" name="DOB">
                        <br />
                        <!--label>
                        Gender
                    </label-->
                        <select name="gender">
                            <option value="" disabled selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <br />
                        <!--label>
                        Address
                    </label-->
                        <input type="text" name="address" placeholder="Address">
                        <br />
                        <!--label>
                        Contact No.
                    </label-->
                        <input type="tel" name="contactNo" placeholder="Contact Number">
                        <br />
                        <!--label>
                        Email
                    </label-->
                        <input type="email" name="email" placeholder="Email Address">
                        <br>
                        <input type="password" name="UserPsword" placeholder="New Password">
                        <select name="userType">
                            <option value="" disabled selected>Select the user type</option>
                            <option value="manager">Manager</option>
                            <option value="receptionist">Receptionist</option>
                            <option value="facilityworker">Facility Worker</option>
                        </select>
                    </div>
                    <div style="text-align:center; padding-top: 2%; padding-bottom: 2%;">
                        <button type="submit" name="submit" class="submit_btn">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script type = "text/javascript" >
        function goBack() {
            window.history.back();
        }

        function validateNIC() {
            var NIC = document.addCustomer.NIC.value;
            const re = /^\d+$/;
            if (NIC.length == 12 && re.test(NIC)) {
                return true;
            } else if (NIC.length == 10 && (NIC[9].toLowerCase() == "v" || NIC[9].toLowerCase() == "x")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    </script>

</body>

</html>
<?php
}else {
  header('Location: ../login.php');
}

?>