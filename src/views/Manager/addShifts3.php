<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Add Shift
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
           
            .table_view {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                min-width: 400px;
                border-radius: 5px 5px 0 0;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }
            .form_box input[type=date],
                input[type=tel],
                input[type=email],
                input[type=text],
                input[type=password],
                select {
                    width: 100%;
            }
            .home-section .form_box  {
                margin-left: 0;
            }
            .right {
                padding-top: 0;
                margin-top: 0;
            }
            .left {
                padding-left: 4%;
            }
        </style>
        
    </head>
    <body>
        <?php 
            include "managerIncludes/ManagerNavigation.php"; 
        ?>
        <section class="home-section">
            <nav>
                <div class="sidebar-button">
                    <!-- <i class='bx bx-menu sidebarBtn'></i> -->
                    <span class="dashboard">Add Shift</span>
                    <div>
                    <ul class="breadcrumb">
                    <li><a href="viewFacilities1.php">Shifts</a></li>
                    <li><a href="viewFacilities2.php">Shift List</a></li>
                    <li>Add Shift </li>
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
                <div class="left">
                    <form class="form_body" method="post">
                        <div class="form_box">
                            <p class="form_title">Add Shift</p>
                            <div class="form_content">
                                <input placeholder="Select Date" type="text" onfocus="(this.type = 'date')"  id="date">
                                <select name="shift">
                                    <option value="" disabled selected>Select the shift</option>
                                    <option value="morning">Morning</option>
                                    <option value="evening">Evening</option>
                                </select>
                                <input type="text" name="empid" placeholder="Enter the Employee ID">
                            </div>
                            <div style="text-align:center; padding-bottom: 2%; margin:2%;">
                                <button type="submit" class="submit_btn">
                                        Submit
                                </button>
                            </div>   
                        </div>
                    </form>
                </div>
                <!--center-->
                <div class="right">
                    <div class="form_body" >
                        <div class="form_box">
                            <h2 class="form_title">Available Employees</h2>
                            <div class="form_content">
                                <table class="table_view">
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Employee Name</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>11</td>
                                            <td>Rohana Perera</td>

                                        <tr>
                                            <td>34</td>
                                            <td>Asela Genarathne</td>

                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
                <!--/center-->    
               
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
}else {
  header('Location: ../login.php');
}

?>