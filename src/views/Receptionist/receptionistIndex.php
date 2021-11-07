<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['receptionistID'])) {
?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
                  <a href="calendarIndex.php">Badminton</a>
                  <a href="calendarIndex.php">Swimming</a>
                  <a href="calendarIndex.php">Tennis</a>
                  <a href="calendarIndex.php">Basketball</a>
                  <a href="calendarIndex.php">Bowling</a>
                  <a href="calendarIndex.php">Volleyball</a>
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
                    <td>12</td>
                    <td>Domenic</td>
                    <td>071 778 8433</td>
                    <td>Swimming pool</td>
                    <td><button class="button update" id="myBtn">Update</button></td>
                    <td><button class="button remove">Delete</button></td>
                  </tr>
                  <tr>
                    <td>11</td>
                    <td>Sally</td>
                    <td>073 567 8901</td>
                    <td>Basketball</td>
                    <td><button class="button update" id="myBtn">Update</button></td>
                    <td><button class="button remove">Delete</button></td>
                  </tr>
                  <tr>
                    <td>10</td>
                    <td>Sally</td>
                    <td>073 567 8901</td>
                    <td>Basketball</td>
                    <td><button class="button update" id="myBtn">Update</button></td>
                    <td><button class="button remove">Delete</button></td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>Sally</td>
                    <td>073 567 8901</td>
                    <td>Basketball</td>
                    <td><button class="button update" id="myBtn">Update</button></td>
                    <td><button class="button remove">Delete</button></td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>Sally</td>
                    <td>073 567 8901</td>
                    <td>Basketball</td>
                    <td><button class="button update" id="myBtn">Update</button></td>
                    <td><button class="button remove">Delete</button></td>
                  </tr>

                </tbody>
              </table>
            </div>
            <div class="button" style="justify-content: flex-end;">
              <a href="allReservations.php">See All</a>
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