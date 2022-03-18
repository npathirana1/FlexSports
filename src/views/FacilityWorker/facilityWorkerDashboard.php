<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['facilityworkerID'])) {
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <!--link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css"-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>
 
  
  <?php include "./facilityWorkerIncludes/sideNavigation.php"; ?>
     
  
<section class="home-section1">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name"><?php echo $_SESSION['facilityworkerID']; ?></span>
        </div>
      </div>
    </nav>

    <div class="home-content">
          <div class="overview-boxes">
          <!--<div class="box">
          <div class="right-side">
          <div class="box-topic">This weeks reservations</div>
              <div class="number">40,876</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from last week</span>
              </div>
            </div>
            <i class='bx bxs-cart-alt cart reservation'></i>
        </div>-->
        <div class="box">
          <div class="right-side">
          <div class="box-topic">Morning shifts scheduled for this week:</div>
              <div class="number">09</div>
              
            </div>
            <!--i class='bx bxs-cart-alt cart reservation'></i-->
        </div>
        <div class="box">
          <div class="right-side">
          <div class="box-topic">Evening shifts scheduled for this week:</div>
              <div class="number">10</div>
              
            </div>
            
        </div>
        <div class="box">
          <div class="right-side">
          <div class="box-topic">Leaves taken so far in this month:</div>
              <div class="number">02</div>
              <div class="indicator">
                
                <span class="text">Only 01 left for this month </span>
              </div>
            </div>
            
        </div>
            
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Shift Details</div></br>
          <div class="sales-details">
              <?php include "./shiftCalendar.php"; ?>
        </div>


        <div class="donno">
        <div class="top-sales box">
          <div class="title">Important</div>
          <br> 
          <label for="=Cont_man">Notices</label> 
          <br> <br>
          <div class="display_box">
           <p>Message Appears Here</p> 
          </div>
</div>
                
          
        </div>
      </div>
    </div>
    
  </section>

     
</body>
</html>
<?php
}else {
  header('Location: ../login.php');
}

?>