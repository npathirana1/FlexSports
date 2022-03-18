<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script><!-- used for google charts-->
    <style>
      a,
      a:hover,
      a:focus,
      a:active {
        text-decoration: none;
        color: inherit;
      }

      .container {
        margin-top: 6%;
      }
    </style>
  </head>

  <body>
    <?php include "managerIncludes/ManagerNavigation.php"; ?>
    <section class="home-section1">
      <nav>
        <div class="sidebar-button">
          <i class='bx bx-menu sidebarBtn'></i>
          <span class="dashboard">Dashboard</span>
        </div>
        <div>
          <!--<img src="images/profile.jpg" alt="">-->
          <span class="admin_name"><?php echo $_SESSION['managerID']; ?></span>
          <!--i class='bx bx-chevron-down'></i-->
        </div>

      </nav>

      <div class="home-content">
        <div class="overview-boxes">
          <a href="reservations.php">
            <div class="box">
              <div class="right-side">
                <div class="box-topic">This weeks reservations</div>
                <div class="number">31</div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up from last week</span>
                </div>
              </div>
          </a>
          <i class='bx bxs-cart-alt cart reservation'></i>
        </div>
        <a href="customerList.php">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">New customer registrations</div>
              <div class="number">3</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from last month</span>
              </div>
            </div>
        </a>
        <i class='bx bxs-user-plus cart user'></i>
      </div>
      <a href="handelInquiries.php">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Inquiries needing attention</div>
            <div class="number">7</div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text">Down from last month</span>
            </div>
          </div>
      </a>
      <i class='bx bxs-info-square cart revenue'></i>
      </div>
      <a href="handelLeave.php">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Leave aplications to handel</div>
            <div class="number">6</div>
          </div>
      </a>
      <i class='bx bxs-bell-plus cart inquiry'></i>
      </div>
      </div>



      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent Reservations</div>
          <div class="sales-details">
            <table class="table_view" style="width: 100%;">
              <thead>
                <tr>
                  <th style="width: 13%;">Reservation Date</th>
                  <th style="width: 25%;">Customer Name</th>
                  <th style="width: 17%;">Contact Number</th>
                  <th style="width: 17%;">Facility</th>
                  <th style="text-align:center;">Action</th>
                  <!-- <th>Edit</th>
                            <th>Delete</th>-->
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>11/03/2021</td>
                  <td>Kevin Gunathilake</td>
                  <td>011 2546 325</td>
                  <td>Table tennis</td>
                  <td style="text-align:center;">
                    <button class='myBtn action view'><i class='fa fa-eye RepImage' aria-hidden='true'></i>
                    </button>
                    <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                    </button>
                    <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                    </button>
                  </td>
                  <!-- <td></td>
                            <td></td> -->
                </tr>
                <tr>
                  <td>11/03/2021</td>
                  <td>Arun Fernando</td>
                  <td>071 4865 256</td>
                  <td>Swinning pool</td>
                  <td style="text-align:center;">
                    <button class='myBtn action view'><i class='fa fa-eye RepImage' aria-hidden='true'></i>
                    </button>
                    <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                    </button>
                    <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                    </button>
                  </td>
                  <!--<td></td>
                            <td></td> -->
                </tr>
              </tbody>
            </table>
          </div>
          <div class="button">
            <a href="reservations.php">See All</a>
          </div>
        </div>
        <div class="top-sales box">
          <div class="title">Current Weeks Reservations</div>
          <div style="padding-top:5%;">
            <div id="myChart"></div>
            <div>
              <script src="../../assets/JS/charts.js"></script>
            </div>
          </div>
          <a href="reports.php">
            <p style="float:right; padding-bottom: 2px; color:#0F305B;">See more...</p>
          </a>
        </div>
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