<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Employees
    </title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
    <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
    <style>
        .form_title {
            color: #0F305B;
        }

        .table_view {
            border-collapse: collapse;
            margin: 55px 25px;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        option {
            width: 50px;
            height: 5px;
        }

        .table_view td {
            padding: 0 15px;
        }
    </style>
</head>

<body>
    <?php include 'managerIncludes/ManagerNavigation.php'; ?>
    <section class="home-section">
    <span onclick="goBack()" style="float: right;" class="go_back">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </span>
        <nav>
      <div class="sidebar-button">
        <!-- <i class='bx bx-menu sidebarBtn'></i> -->
        <span class="dashboard">Employees</span>
        <div>
        <ul class="breadcrumb">
          
          <li>Employees /</li>
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
            <a href="addEmployee.php"><button class="add_btn">
                    Add Employee
                </button></a>
            <center>
                <table class="table_view" style="width:90%; ">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Contact Number</th>
                            <th>Facility</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Graham</td>
                            <td>011 2546 325</td>
                            <td>Tennis court</td>
                            <td>
                                <select name="action" onchange="seletced_option(this.value)">
                                    <option value="view">View</option>
                                    <option value="updateEmployee">Update</option>
                                    <option value="delete">Delete</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Matt</td>
                            <td>071 4865 256</td>
                            <td>Swinning pool</td>
                            <td>
                                <select name="action" onchange="seletced_option(this.value)">
                                    <option value="view">View</option>
                                    <option value="updateEmployee">Update</option>
                                    <option value="delete">Delete</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Mary</td>
                            <td>071 4865 256</td>
                            <td>Badminton court</td>
                            <td>
                                <select name="action" onchange="seletced_option(this.value)">
                                    <option value="view">View</option>
                                    <option value="updateEmployee">Update</option>
                                    <option value="delete">Delete</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </center>
        </div>
    </section>


</body>

</html>
<?php
}else {
  header('Location: ../login.php');
}

?>