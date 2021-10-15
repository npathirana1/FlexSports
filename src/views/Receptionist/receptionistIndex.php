<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['receptionistID'])) {
?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/receptionistDashboard.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <style>
      .dropbtn {
        background-color: #17335C;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
      }

      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        width: 190px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
      }

      .dropdown-content a {
        color: #17335C;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }

      .dropdown-content a:hover {
        background-color: #f1f1f1
      }

      .dropdown:hover .dropdown-content {
        display: block;
      }

      .dropdown:hover .dropbtn {
        background-color: #0f2444;
      }
    </style>
  </head>

  <body>

    <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>

    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class='bx bx-menu sidebarBtn'></i>
          <span class="dashboard">Dashboard</span>
        </div>
        <div>
          <!--?php 
            
            $rec_query = "select * from customer where Email ='" . $Email . "' ";
            $result_rec = mysqli_query($conn, $recquery);
            $row_rec = mysqli_fetch_assoc($result_rec);
          ?-->
          <!--<img src="images/profile.jpg" alt="">-->
          <span class="admin_name"><?php echo $_SESSION['receptionistID']; ?></span>
        </div>
      </nav>

      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic dropdown"><button class="dropbtn">Add a new reservation</button>
                <div class="dropdown-content">
                  <a href="#">Badminton</a>
                  <a href="#">Swimming</a>
                  <a href="#">Tennis</a>
                  <a href="#">Basketball</a>
                  <a href="#">Bowling</a>
                  <a href="#">Volleyball</a>
                </div>
              </div>
            </div>

          </div>
          <div class="box">
            <div class="right-side">
            <div class="box-topic dropdown"><button class="dropbtn" onClick="window.location.href='viewShift.php';">View my shifts</button></div>
            </div>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Number of casual leave remaining for this year</div>
              <div class="number">10</div>
            </div>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Inquiries Received</div>
              <div class="number">14</div>
            </div>
            <i class='bx bxs-bell-plus cart inquiry'></i>
          </div>
        </div>

        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">Latest 5 Reservations</div>
            <div class="sales-details">
              <table class="table_view">
                <thead>
                  <tr>
                    <th>Reservation ID</th>
                    <th>Customer Name</th>
                    <th>Contact Number</th>
                    <th>Facility</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Domenic</td>
                    <td>071 778 8433</td>
                    <td>Swimming pool</td>
                    <td><button class="button update" id="myBtn">Update</button></td>
                    <td><button class="button remove">Delete</button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Sally</td>
                    <td>073 567 8901</td>
                    <td>Basketball</td>
                    <td><button class="button update" id="myBtn">Update</button></td>
                    <td><button class="button remove">Delete</button></td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
            <div class="button">
              <a href="allReservations.php">See All</a>
            </div>
          </div>
          <div class="top-sales box">
            <div class="title">Most vacant facilities for the past week</div>
            <ul class="top-sales-details">
              <li>
                <a href="#">
                  <!--<img src="images/sunglasses.jpg" alt="">-->
                  <span class="product">Badminton court 1</span>
                </a>
                <span class="price">2</span>
              </li>
              <li>
                <a href="#">
                  <!--<img src="images/jeans.jpg" alt="">-->
                  <span class="product">Basketball</span>
                </a>
                <span class="price">5</span>
              </li>
              <li>
                <a href="#">
                  <!-- <img src="images/nike.jpg" alt="">-->
                  <span class="product">Volleyball</span>
                </a>
                <span class="price">5</span>
              </li>
              <li>
                <a href="#">
                  <!--<img src="images/scarves.jpg" alt="">-->
                  <span class="product">Bowling</span>
                </a>
                <span class="price">6</span>
              </li>
            </ul>
            
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