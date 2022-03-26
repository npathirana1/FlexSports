<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['receptionistID'])) {
  $staffEmail = $_SESSION['receptionistID'];
  $sqlID = "SELECT * from user_login where Email ='" . $staffEmail . "' ";
  $result = mysqli_query($conn, $sqlID);
  $row1 = mysqli_fetch_assoc($result);
  $userId = $row1['ID'];
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


    <section class="home-section1">
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
              <a href="../Staff/addReservation.php">
                <div class="box-topic dropdown"><button class="dropbtn">Add a new reservation</button>
              </a>
              <!-- <div class="dropdown-content">
                  <a href="calendarIndex.php">Badminton</a>
                  <a href="calendarIndex.php">Swimming</a>
                  <a href="calendarIndex.php">Tennis</a>
                  <a href="calendarIndex.php">Basketball</a>
                  <a href="calendarIndex.php">Bowling</a>
                  <a href="calendarIndex.php">Volleyball</a>
                </div> -->
            </div>
          </div>

        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic dropdown"><button class="dropbtn" onClick="window.location.href='../Staff/viewPersonalShift.php';">View my shifts</button></div>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Number of casual leave remaining for this year</div>

            <?php
            $numberOfCasualLeaves = 7;
            $query = "SELECT COUNT(LeaveNo) AS days FROM leave_request WHERE EmpID =$userId AND LeaveStatus = 'Approved' AND LeaveMode = 'Casual';";
            //$query = "SELECT COUNT(LeaveNo) AS days FROM leave_request WHERE EmpID =$userId AND LeaveType = 'Casual';";
            $Result = mysqli_query($conn, $query);
            $casualLeaves = mysqli_fetch_assoc($Result);
            $available1 = $numberOfCasualLeaves - $casualLeaves['days'];
            ?>

            <div class="number"><?php echo $available1; ?></div>
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
            <table class="table_view" style="margin-left: 5%;">
              <thead>
                <tr>
                  <th>Reservation ID</th>
                  <th>Customer Name</th>
                  <th>Contact Number</th>
                  <th>Facility</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query_table = "SELECT * FROM reservation WHERE NOT ReservationStatus = 'Cancelled' ORDER BY ReservationNo DESC LIMIT 5";
                $Result_table = mysqli_query($conn, $query_table);
                while ($t_table = mysqli_fetch_assoc($Result_table)) { ?>
                <tr>
                                <td><?php echo $t_table["ReservationNo"]; ?></td>
                                <td><?php echo $t_table["CustName"]; ?></td>
                                <td><?php echo $t_table["CustEmail"]; ?></td>
                                <td><?php echo $t_table["FacilityName"]; ?></td>
                                <td>
                                    <a href="../Staff/calendarIndex.php?id=<?php echo $t_table["ReservationNo"]; ?>&facility=<?php echo $t_table["FacilityName"]; ?>"><button class='action update edit_data' type="button" name="edit" value="Edit" id="<?php echo $row["CustomerID"]; ?>" data-toggle="modal"><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i></button></a>
                                    <a href="#modal-delete"><button class='action remove delete_data' type="button" name="delete" value="Delete" id="<?php echo $rowRes["ReservationNo"]; ?>" data-toggle="modal"><i class='fa fa-trash RepImage' aria-hidden='true'></i></button></a>

                                </td>
                                </td>
                            </tr>
                        <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="button" style="justify-content: flex-end;">
            <a href="../Staff/allReservations.php">See All</a>
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