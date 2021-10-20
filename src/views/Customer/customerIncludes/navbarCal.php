<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>landing page</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/png" href="../../assets/Images/icon.png"/>
    <style>
        .dropdown {
  float: left;
  overflow: hidden;
  max-width: 100px;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  /* padding: 14px 16px; */
  background-color: inherit;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #d4d4d4;
  max-width: 100px;

}
        .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
    </style>
</head>
<body>
    <section>
        
        <header>
            <a href="#"><img src="logo.png" class="logo"></a>
            <ul>
                <li><a href="../home.php">Home</a></li>
                <div class="dropdown">
    <button style="margin-top: -100px;" class="dropbtn"><li><a href="../profile.php">Profile</a></li>
    <!-- <i style="filter:invert(1); float:none;" class="fa fa-caret-down"></i> -->
    </button>
    <div class="dropdown-content">
      <a href="../ViewReservations.php">Your reservations</a>
      <a href="../facilities.php">Book now</a>
      <a href="../CustomerInquiries.php">Your inquries</a>
      <a href="../UpdateCustomerProfile.php">Profile settings</a>
    </div>
  </div> 
                <li><a href="../aboutus.php">About us</a></li>
                <li><a href="../facilities.php">Facilities</a></li>
                <li><a href="../contactus.php">Contact us</a></li>
                <li><a href="../../../config/logoutCal.php">Log out</a></li>
            </ul>
        </header>
    </section>
</body>
</html>