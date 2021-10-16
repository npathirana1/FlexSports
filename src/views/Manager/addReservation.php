<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reservations</title>
    <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .form_title{
                color:#0F305B;
                margin-top: 0;
                padding-top: 0;
                padding-bottom: 2%;
        }
        .grid-container {
            display: grid;
            grid-gap: 50px;
            grid-template-columns: auto auto auto;
            width: 90%;
            text-align: center;
            margin-left: 5%;
        }

        .grid-item {
            background-color: #0F305B;
            padding: 20px;
            text-align: center;
            height: 10%x;
            border-radius: 12px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            width: 300px;
        }

        .grid-container .grid-item a {
            color: white;
            text-decoration: none;
            font-size: 30px;
        }

    </style>
    
</head> 

<body>
<?php include "managerIncludes/managerNavigation.php"; ?>
        
    <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <!-- <i class='bx bx-menu sidebarBtn'></i> -->
        <span class="dashboard">Add Reservation</span>
        <div>
        <ul class="breadcrumb">
            <li><a href="reservations.php">Reservations</a></li>
          <li>Add Reservation</li>
        </ul> 
      </div>
      </div>
      <div>
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name"><?php echo $_SESSION['managerID']; ?></span>
        <!--i class='bx bx-chevron-down'></i-->
      </div>
      
    </nav>

    <div class="home-content">
        <h2 class="form_title"></h2>
        <span onclick="goBack()" style="float: right;" class="go_back">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </span>
        <div class="header"></br></br></br>
            <div class="form_title">
                <h3>Select the sports facility</h3>
            </div></br>
        </div>

        <div class="grid-container">
            <div class="grid-item">
                <a href="#"><i class="fas fa-basketball-ball"></i>
                    <span class="links_name">&nbsp Basketball</span></a>
            </div>

            <div class="grid-item">
                <a href="#"><i class="fas fa-bowling-ball"></i>
                    <span class="links_name">&nbsp Bowling</span></a>
            </div>
            <div class="grid-item">
                <a href="#"><i class='bx bxs-tennis-ball'></i>
                    <span class="links_name">&nbsp Tennis</span></a>
            </div>
            <div class="grid-item">
                <a href="#"><i class="fas fa-swimmer"></i>
                    <span class="links_name">&nbsp Swimming</span></a>
            </div>
            <div class="grid-item"><a href="#"><i class='bx bx-water'></i>
                    <span class="links_name">&nbsp Badminton</span></a>
            </div>
            <div class="grid-item">
                <a href="#"><i class="fas fa-volleyball-ball"></i>
                    <span class="links_name">&nbsp Volleyball</span></a>
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