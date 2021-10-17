<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customers</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
    <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
    <style>
           .form_title{
                color:#0F305B;
           }
           #search {
            width: 25%;
            padding-bottom: 10px;
            margin-left: 20px;
            text-align: left;
        }
    </style>
    
</head> 

<body>

    <?php include "managerIncludes/managerNavigation.php"; ?>

    <section class="home-section">
        <span onclick="goBack()" style="float: right;" class="go_back">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </span>
        <nav>
      <div class="sidebar-button">
        <!-- <i class='bx bx-menu sidebarBtn'></i> -->
        <span class="dashboard">Customers</span>
        <div>
        <ul class="breadcrumb">
          
          <li>Customers /</li>
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
        <h2 class="form_title">Manage Customers</h2>
            <a href="#addCustomer.php"><button class="add_btn">
                Add Customer
            </button></a>
            <br><br>
        <input type="text" id="search" placeholder="Search by Customer name.." title="senderName">
       
        <center>
        <table style="width:90%;" class="table_view">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Nethmi Pathirana</td>
                    <td>nethmi.pathirana@gmail.com</td>
                    <td>
                            <select name="action" onchange="seletced_option(this.value)">
                                <option value="view">View</option>
                                <option value="updateCustomer">Update</option>
                                <option value="delete">Delete</option>
                            </select>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Sandali Boteju</td>
                    <td>sandali@yahoo.com</td>
                    <td>
                            <select name="action" onchange="seletced_option(this.value)">
                                <option value="view">View</option>
                                <option value="#updateCustomer">Update</option>
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