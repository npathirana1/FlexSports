<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/receptionistDashboard.css">
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
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Receptionist</span>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
          <div class="box-topic">This weeks reservations</div>
              <div class="number">25</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from last week</span>
              </div>
            </div>
            <i class='bx bxs-cart-alt cart reservation'></i>
        </div>
        <div class="box">
          <div class="right-side">
          <div class="box-topic">New customer registrations</div>
              <div class="number">10</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from last week</span>
              </div>
            </div>
            <i class='bx bxs-user-plus cart user'></i>
        </div>
        <div class="box">
          <div class="right-side">
          <div class="box-topic">Revenue for the past month</div>
              <div class="number">LKR 40,000</div>
              <div class="indicator">
                <i class='bx bx-down-arrow-alt down'></i>
                <span class="text">Down from last month</span>
              </div>
            </div>
            <i class='bx bx-money cart revenue'></i>
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
          <div class="title">Latest 10 Reservations</div>
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
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sally</td>
                            <td>073 567 8901</td>
                            <td>Basketball</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    </table> 
          </div>
          <div class="button">
            <a href="#">See All</a>
          </div>
        </div>
        <div class="top-sales box">
          <div class="title">New Customers</div>
          <ul class="top-sales-details">
            <li>
            <a href="#">
              <!--<img src="images/sunglasses.jpg" alt="">-->
              <span class="product">34</span>
            </a>
            <span class="price">Nethmi Pathirana</span>
          </li>
          <li>
            <a href="#">
               <!--<img src="images/jeans.jpg" alt="">-->
              <span class="product">35</span>
            </a>
            <span class="price">Sandali Boteju</span>
          </li>
          <li>
            <a href="#">
             <!-- <img src="images/nike.jpg" alt="">-->
              <span class="product">36</span>
            </a>
            <span class="price">Yadeesha Weerasinghe</span>
          </li>
          <li>
            <a href="#">
              <!--<img src="images/scarves.jpg" alt="">-->
              <span class="product">37</span>
            </a>
            <span class="price">Kavisha Perera</span>
          </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

     
</body>
</html>