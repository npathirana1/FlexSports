<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['facilityworkerID'])) {
  $userEmail = $_SESSION['facilityworkerID'];
  $get_EmpID = "SELECT * from user_login where Email ='" . $userEmail . "' ";
  $result = mysqli_query($conn, $get_EmpID);
  $row = mysqli_fetch_assoc($result);
  $empid = $row['ID'];
?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <!--link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css"-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
      .table_view{
        width: 100%;
      }
    </style>
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

        </div>
        </div>
      </nav>

      <div class="home-content">
        <!-- <div class="overview-boxes"> -->
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
          <!-- <div class="box">
            <div class="right-side">
              <div class="box-topic">Morning shifts scheduled for this week:</div> -->

              <?php
              // if (date('N') != '1') {
              //   //take the last monday
              //   $staticstart = date('Y-m-d', strtotime('last Monday'));
              // } else {
              //   $staticstart = date('Y-m-d');
              // }

              // //always next Sunday
              // if (date('N') == '7') {
              //   $staticfinish = date('Y-m-d');
              // } else {
              //   $staticfinish = date('Y-m-d', strtotime('next Sunday'));
              // }

              // $morShifts = "SELECT COUNT(*) FROM emp_shift WHERE shift ='morning'";
              // $results = mysqli_query($conn, $morShifts);
              // $row = mysqli_fetch_assoc($result);

              ?>

              <!-- <div class="number"> -->
                <?php //echo " . $row . "  ?> 
              <!-- </div> -->

            <!-- </div> -->
            <!--i class='bx bxs-cart-alt cart reservation'></i-->
          <!-- </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Evening shifts scheduled for this week:</div>
              <div class="number">10</div>

            </div>

          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Shift Available for Today:</div>
              <div class="number">Morning</div>

            </div>

          </div>

          <div class="box">
            <div class="right-side">
              <div class="box-topic">Leaves taken so far in this month:</div>
              <div class="number">02</div>

            </div>

          </div>

        </div> -->

        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">Today's Schedule</div></br>
            <div class="sales-details">

              <table class="table_view">
                <thead>
                  <tr>
                    <th>Facility</th>
                    <th>Customer Name</th>
                    <th>Reservation Time</th>

                  </tr>
                </thead>
                <tbody>

                  <?php
                  $today = date('Y-m-d');
                  $viewSchedules = "SELECT * FROM reservation WHERE date='$today' AND ReservationStatus='Confirmed' ";
                  $Result1 = mysqli_query($conn, $viewSchedules);
                  //;


                  while ($row1 = mysqli_fetch_assoc($Result1)) { ?>
                    <tr>
                      <td><?php echo $row1["FacilityName"]; ?></td>
                      <td><?php echo $row1["CustName"]; ?></td>
                      <td><?php echo $row1["timeslot"]; ?></td>

                    </tr>
                  <?php } ?>


                </tbody>
              </table>
            </div>


            <!--div class="donno">
        <div class="top-sales box">
          <div class="title">Important</div>
          <br> 
          <label for="=Cont_man">Notices</label> 
          <br> <br>
          <div class="display_box">
           <p>Message Appears Here</p> 
          </div>
</div>
                
          
        </div-->
          </div>
        </div>

    </section>


  </body>

  </html>
<?php
} else {
  header('Location: ../login.php');
}

?>