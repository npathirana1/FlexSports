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
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/modal.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script><!-- used for google charts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.esm.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
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
      <?php
      if (date('D') != 'Mon') {
        //take the last monday
        $staticstart = date('Y-m-d', strtotime('last Monday'));
      } else {
        $staticstart = date('Y-m-d');
      }

      //always next saturday
      if (date('D') == 'Sun') {
        $staticfinish = date('Y-m-d');
      } else {
        $staticfinish = date('Y-m-d', strtotime('next Sunday'));
      }
      //previous week start date and end date
      $staticlastfinist = date('Y-m-d', strtotime($staticstart . "-1 days"));
      $staticlaststart = date('Y-m-d', strtotime($staticlastfinist . "-6 days"));
      ?>

      <div class="home-content">
        <div class="overview-boxes">
          <a href="../Staff/allReservations.php">
            <div class="box">
              <div class="right-side">
                <div class="box-topic">This weeks reservations</div>
                <?php
                $get_reser_query = mysqli_query($conn, "SELECT COUNT(ReservationNo ) AS TotCount FROM reservation WHERE date>='$staticstart' AND date<='$staticfinish';");
                $get_reser_result = mysqli_fetch_assoc($get_reser_query);

                $get_last_reser_query = mysqli_query($conn, "SELECT COUNT(ReservationNo ) AS LastTotCount FROM reservation WHERE date>='$staticlaststart' AND date<='$staticlastfinist';");
                $get_last_reser_result = mysqli_fetch_assoc($get_last_reser_query);

                ?>
                <div class="number"><?php echo $get_reser_result['TotCount']; ?></div>
                <div class="indicator">
                  <?php
                  if ($get_reser_result['TotCount'] > $get_last_reser_result['LastTotCount']) {
                    echo "  <i class='bx bx-up-arrow-alt'></i>
                        <span class='text'>Up from last week</span>";
                  } elseif ($get_reser_result['TotCount'] < $get_last_reser_result['LastTotCount']) {
                    echo "  <i class='bx bx-down-arrow-alt down'></i>
                        <span class='text'>Down from last week</span>";
                  } elseif ($get_reser_result['TotCount'] = $get_last_reser_result['LastTotCount']) {
                    echo "  <i class='bx bx-no-entry cart inquiry' ></i>
                      <span class='text'>No change from last week</span>";
                  }
                  ?>
                </div>
              </div>
          </a>
          <i class='bx bxs-cart-alt cart reservation'></i>
        </div>
        <a href="customerList.php">
          <div class="box">
            <?php
            $firstDayThisMonth = date("Y-m-01");
            $lastDayThisMonth = date("Y-m-t");
            $firstDayLastMonth = date("Y-m-d", strtotime("first day of previous month"));
            $lastDayLastMonth = date("Y-m-d", strtotime("last day of previous month"));
            ?>
            <div class="right-side">
              <div class="box-topic">New customer registrations</div>
              <?php
              $get_cust_query = mysqli_query($conn, "SELECT COUNT(ID ) AS TotCount FROM user_login WHERE date>='$firstDayThisMonth' AND date<='$lastDayThisMonth' And UserType='customer';");
              $get_cust_result = mysqli_fetch_assoc($get_cust_query);

              $get_last_cust_query = mysqli_query($conn, "SELECT COUNT(ID ) AS LastTotCount FROM user_login WHERE date>='$firstDayLastMonth' AND date<='$lastDayLastMonth' And UserType='customer';");
              $get_last_cust_result = mysqli_fetch_assoc($get_last_cust_query);

              ?>
              <div class="number"><?php echo $get_cust_result['TotCount']; ?></div>
              <div class="indicator">
                <?php
                if ($get_cust_result['TotCount'] > $get_last_cust_result['LastTotCount']) {
                  echo "  <i class='bx bx-up-arrow-alt'></i>
                        <span class='text'>Up from last week</span>";
                } elseif ($get_cust_result['TotCount'] < $get_last_cust_result['LastTotCount']) {
                  echo "  <i class='bx bx-down-arrow-alt down'></i>
                        <span class='text'>Down from last week</span>";
                } elseif ($get_cust_result['TotCount'] = $get_last_cust_result['LastTotCount']) {
                  echo "  <i class='bx bx-no-entry cart inquiry' ></i>
                      <span class='text'>No change from last week</span>";
                }
                ?>
              </div>
            </div>
        </a>
        <i class='bx bxs-user-plus cart user'></i>
      </div>
      <a href="handelInquiries.php">
        <div class="box">
          <?php
          $get_inq_query = mysqli_query($conn, "SELECT COUNT(InquiryNo ) AS TotCount FROM inquiry WHERE date>='$firstDayThisMonth' AND date<='$lastDayThisMonth';");
          $get_inq_result = mysqli_fetch_assoc($get_inq_query);

          $get_last_inq_query = mysqli_query($conn, "SELECT COUNT(InquiryNo ) AS LastTotCount FROM inquiry WHERE date>='$firstDayLastMonth' AND date<='$lastDayLastMonth';");
          $get_last_inq_result = mysqli_fetch_assoc($get_last_inq_query);

          $get_inqto_query = mysqli_query($conn, "SELECT COUNT(InquiryNo ) AS LookTotCount FROM inquiry WHERE InquiryStatus='Not Responded';");
          $get_inqto_result = mysqli_fetch_assoc($get_inqto_query);

          ?>
          <div class="right-side">
            <div class="box-topic">Inquiries needing attention</div>
            <div class="number"><?php echo $get_inqto_result['LookTotCount']; ?></div>
            <div class="indicator">
              <?php
              if ($get_inq_result['TotCount'] > $get_last_inq_result['LastTotCount']) {
                echo "  <i class='bx bx-up-arrow-alt down'></i>
                        <span class='text'>Up from last week</span>";
              } elseif ($get_inq_result['TotCount'] < $get_last_inq_result['LastTotCount']) {
                echo "  <i class='bx bx-down-arrow-alt '></i>
                        <span class='text'>Down from last week</span>";
              } elseif ($get_inq_result['TotCount'] = $get_last_inq_result['LastTotCount']) {
                echo "  <i class='bx bx-no-entry cart inquiry' ></i>
                      <span class='text'>No change from last week</span>";
              }
              ?>
            </div>
          </div>
      </a>
      <i class='bx bxs-info-square cart revenue'></i>
      </div>
      <a href="handelLeave.php">
        <div class="box">
          <?php
          $get_leave_query = mysqli_query($conn, "SELECT COUNT(LeaveNo ) AS TotCount FROM leave_request WHERE LeaveStatus='Pending';");
          $get_leave_result = mysqli_fetch_assoc($get_leave_query);

          ?>
          <div class="right-side">
            <div class="box-topic">Leave aplications to handel</div>
            <div class="number"><?php echo $get_leave_result['TotCount']; ?></div>
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
                <?php
                $today = date('Y-m-d', time());

                $rResult = mysqli_query($conn, "SELECT * FROM reservation WHERE ReservationStatus!='Cancelled' ORDER BY ReservationNo DESC;");

                $count = 0;
                while ($rowRes = mysqli_fetch_array($rResult)) {
                  if ($count < 2) {
                    $get_custdet_query = mysqli_query($conn, "SELECT * FROM customer INNER JOIN reservation ON reservation.CustEmail= customer.Email;");
                    $get_custdet_result = mysqli_fetch_assoc($get_custdet_query);
                ?>
                    <tr>
                      <td><?php echo $rowRes['date']; ?></td>
                      <td><?php echo $get_custdet_result['FName'] . ' ' . $get_custdet_result['LName']; ?></td>
                      <td><?php echo $get_custdet_result['TelephoneNo']; ?></td>
                      <td style="text-align:center;"><?php echo $rowRes['FacilityName']; ?></td>
                      <!-- <td><a href="#modal-update"><button id="myBtn" class="button update">Update</button></a></td>
                                <td><button class="button remove">Delete</button></td> -->
                      <td>

                        <a href="../Staff/calendarIndex.php?id=<?php echo $rowRes['ReservationNo']; ?>&facility=<?php echo $rowRes['FacilityName']; ?>"><button class='action update edit_data' type="button" name="edit" value="Edit" id="<?php echo $get_custdet_result['CustomerID']; ?>" data-toggle="modal"><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i></button></a>
                        <a href="#modal-delete"><button class='action remove delete_data' type="button" name="delete" value="Delete" id="<?php echo $rowRes['ReservationNo']; ?>" data-toggle="modal"><i class='fa fa-trash RepImage' aria-hidden='true'></i></button></a>

                      </td>
                      </td>
                    </tr>
                <?php
                    $count++;
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
          <div class="button">
            <a href="../Staff/allReservations.php">See All</a>
          </div>
        </div>
        <div class="top-sales box">
          <div class="title">Current Weeks Reservations</div>
          <div>
            <div style="height:8vh; width:18vw">
              <canvas id="nores"></canvas>
              <!-- <script src="../../assets/JS/inqCount.js"></script> -->
            </div>
            <!-- <div id="myChart"></div>
            <div>
              <script src="../../assets/JS/charts.js"></script>
            </div> -->
          </div>
          <div style="margin-top: 75%;">
            <a href="reports.php">
              <p style="float:right; padding-bottom: 2px; color:#0F305B;">See more...</p>
            </a>
          </div>
        </div>
      </div>
      </div>
      <?php
     
      $facilities = array();
      $noOfReservation_thisweek = array();
      
        $data_reservation_query = mysqli_query($conn, "SELECT FacilityName,COUNT(ReservationNo) AS FaciRes FROM reservation WHERE date>='$staticstart' AND date<='$staticfinish' GROUP BY FacilityName;");
        while ($data_reservation_result = mysqli_fetch_assoc($data_reservation_query)) {
          $FaciName = $data_reservation_result["FacilityName"];
          $facilities[] = $FaciName;
          $this_week = $data_reservation_result['FaciRes'];
          $noOfReservation_thisweek[] = $this_week;
        }
      
     
      ?>
    </section>
    <!-- delete confirmation-->
    <div class="modal-body">
      <div class="modal-container" id="modal-delete">
        <div class="modal">

          <form action="../Staff/staffIncludes/cancelReservation.inc.php" method="post" id="insert_form">
            <div class="form-body">
              <div class="horizontal-group">
                <h3>Are you sure you want to cancel this reservation?</h3>
              </div>
              <div class="form-group">
                <br>
                <p>The reservation you are trying to cancel will be permanantly removed and you will have to make a new reservation to use the facility.</p>
                <br>
              </div>
            </div>
            <input type="hidden" name="res_id" id="res_id" />
            <div class="form-footer-d ">
              <a href="../Manager/managerIndex.php" class="cancel_btn">Cancel</a>
              <button type="submit" name="submit" class="btn btn-primary form_btn_dlt">Delete</button>
            </div>

          </form>
        </div>
      </div>
    </div>

  </body>

  </html>
  <script>
    $(document).ready(function() {
      $(document).on('click', '.delete_data', function() {
        var res_id = $(this).attr("id");
        if (res_id != '') {

          $.ajax({
            url: "../Staff/staffIncludes/fetchReservation.inc.php",
            method: "POST",
            data: {
              res_id: res_id
            },
            dataType: "json",
            success: function(value) {

              $('#res_id').val(value.ReservationNo);

            }
          });
        }

      });
    });
  </script>
  <script>
    const res = document.getElementById('nores').getContext('2d');
    const facilities = <?php echo json_encode($facilities); ?>;
    const resno =<?php echo json_encode($noOfReservation_thisweek); ?>;
    const nores = new Chart(res, {
      type: 'doughnut',

      data: {
        labels: facilities,
        datasets: [{
          label: 'Number Of Reservations',
          data: resno,
          backgroundColor: [
            'rgba(15, 48, 91)',
            'rgba(122, 122, 122)',
            'rgba(26, 83, 158)',
            'rgba(156, 156, 156)',
            'rgba(62, 132, 224)',
            'rgba(204, 204, 204)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top'
          }
        }
      }
    });
  </script>

<?php
} else {
  header('Location: ../login.php');
}

?>