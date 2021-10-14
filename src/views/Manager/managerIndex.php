<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="../../assets/CSS/Dashboard.css">
  <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
  <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <style>
    .table_view tbody tr td select {
      width: 80px;
      height: 25px;
      border: 1px solid #C4C4C4;
      border-radius: 5px;
      background-color: #FEFDFB;
      color: #0F305B;
    }

    .table_view tbody tr td select:nth-of-type(even) {
      background-color: #E0E0E0;
      color: #0F305B;
    }

    a,
    a:hover,
    a:focus,
    a:active {
      text-decoration: none;
      color: inherit;
    }
  </style>
</head>

<body>
  <?php include "managerIncludes/ManagerNavigation.php"; ?>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <!-- <i class='bx bx-menu sidebarBtn'></i> -->
        <span class="dashboard">Dashboard</span>
        <div>
        <ul class="breadcrumb">
          
          <li>Dashboard /</li>
        </ul> 
      </div>
      </div>
      <div>
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Manager</span>
        <!--i class='bx bx-chevron-down'></i-->
      </div>
      
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <a href="reports.php">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">This weeks reservations</div>
              <div class="number">16</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from last week</span>
              </div>
            </div>
        </a>
        <i class='bx bxs-cart-alt cart reservation'></i>
      </div>
      <a href="reports.php">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">New customer registrations</div>
            <div class="number">3</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from last week</span>
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
          <table class="table_view">
            <thead>
              <tr>
                <th>Reservation ID</th>
                <th>Customer Name</th>
                <th>Contact Number</th>
                <th>Facility</th>
                <th>Action</th>
                <!-- <th>Edit</th>
                            <th>Delete</th>-->
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Domenic</td>
                <td>011 2546 325</td>
                <td>Tennis court</td>
                <td>
                  <select name="action">
                    <option value="view"> <a href="#view">View</a> </option>
                    <option value="update"> <a href="#update">Update</a> </option>
                    <option value="delete"> <a href="#delete">Delete</a> </option>
                  </select>
                </td>
                <!-- <td></td>
                            <td></td> -->
              </tr>
              <tr>
                <td>2</td>
                <td>Sally</td>
                <td>071 4865 256</td>
                <td>Swinning pool</td>
                <td>
                  <select name="action">
                    <option value="view"> <a href="#view">View</a> </option>
                    <option value="update"> <a href="#update">Update</a> </option>
                    <option value="delete"> <a href="#delete">Delete</a> </option>
                  </select>
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
      <div class="top-sales box" style="height: 328px;">
        <div class="title">This Week Trend</div>
        <ul class="top-sales-details">
          <li>
            <a href="#">
              <!--<img src="images/sunglasses.jpg" alt="">-->
              <span class="product">First Facility</span>
            </a>
            <!-- <span class="price">$1107</span>-->
          </li>
          <li>
            <a href="#">
              <!--<img src="images/jeans.jpg" alt="">-->
              <span class="product">Second Facility </span>
            </a>
            <!--<span class="price">$1567</span>-->
          </li>
          <li>
            <a href="#">
              <!-- <img src="images/nike.jpg" alt="">-->
              <span class="product">Third Facility</span>
            </a>
            <!--<span class="price">$1234</span>-->
          </li>
          <li>
            <a href="#">
              <!--<img src="images/scarves.jpg" alt="">-->
              <span class="product">Fourth Facility</span>
            </a>
            <!--<span class="price">$2312</span>-->
          </li>
          <li>
            <a href="#">
              <!--<img src="images/blueBag.jpg" alt="">-->
              <span class="product">Fifth Facility</span>
            </a>
            <!--<span class="price">$1456</span>-->
          </li>
        </ul>
      </div>
    </div>
    </div>
  </section>


</body>

</html>