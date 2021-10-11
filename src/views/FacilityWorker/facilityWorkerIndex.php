<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/facilityWorkerDashboard.css">
    <!--link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css"-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>
 
  
  <?php include "navbar.php"; ?>
     
  
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Facility Worker</span>
        <i class='bx bx-chevron-down' ></i>
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
          <div class="box-topic">This Weeks Reservations</div>
              <div class="number">19</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from last week</span>
              </div>
            </div>
            <i class='bx bxs-cart-alt cart reservation'></i>
        </div>
        <div class="box">
          <div class="right-side">
          <div class="box-topic">Target Acquired for Sept.</div>
              <div class="number">40%</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from last week</span>
              </div>
            </div>
            <i class='bx bxs-user-plus cart user'></i>
        </div>
        <div class="box">
          <div class="right-side">
          <div class="box-topic">Leaves Taken So far</div>
              <div class="number">05</div>
              <div class="indicator">
                <i class='bx bx-down-arrow-alt down'></i>
                <span class="text">Only XX available</span>
              </div>
            </div>
            <i class='bx bx-money cart revenue'></i>
        </div>
            
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Reservation Details</div>
          <div class="sales-details">
              <!--?php include "calendarNew.php"; ?-->
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
