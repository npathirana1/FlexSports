<!DOCTYPE html>
<html>

<head>
      <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../../assets/CSS/navBar.css" />
      <link rel="shortcut icon" type="image/png" href="../../assets/Images/icon.png"/>
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
            .sidebar .nav-links li a {
                  padding: 0;
            }
      </style>
</head>
<body>
      <nav class="sidebar">
            <img src="../../assets/Images/logoStaff.png" alt="Logo">
            <ul>
                  <li><a class="link" href="managerIndex.php"><i class="fa fa-fw fa-home"></i>&nbsp Dashboard</a></li>
                  <li><a href="reservations.php"><i class="fa fa-calculator"></i>&nbspReservations</li>
                  <li>
                        <a class="feat-btn"><i class="fa fa-user-circle-o"></i>&nbspUsers
                              <span class="fas fa-caret-down first"></span></a>
                        <ul class="feat-show">
                              <li><a class="link" href="customerList.php"><i class="fa fa-user-o"></i>&nbspCustomers</li>
                              <li>
						<a class="cust-btn link"><i class="fa fa-user-o"></i>&nbspEmployees
                                          <span class="fas fa-caret-down first"></span></a>
                                    <ul class="cust-show link">
                                          <li><a class="link" href="viewEmployee.php">Employee List</a></li>
                                          <li><a class="link" href="addEmployee.php">Add Employee</a></li>
                                    </ul>
                              </li>
                        </ul>			
                  </li>
                  <li><a class="link"href="viewFacilities1.php"><i class="fa fa-user-circle-o"></i>&nbspShifts</li>
                  <li><a class="link" href="handelLeave.php"><i class="fa fa-file-text"></i>&nbspLeaves</a></li>
                  <li><a class="link" href="reports.php"><i class="fa fa-line-chart"></i>&nbspReports</a></li>
                  <li><a class="link" href="handelInquiries.php"><i class="fa fa-location-arrow"></i>&nbspInquiries</a></li>
                  <li>
                        <a class="fac-btn"><i class="fa fa-calendar"></i>&nbspFacility Schedule
                              <span class="fas fa-caret-down first"></span></a>
                        <ul class="fac-show">
                              <li><a href="#">Today</a></li>
                              <li><a href="#">By facilities</a></li>
                        </ul>
                  </li>
                  <li>
                        <a class="prof-btn"><i class="fa fa-id-badge"></i>&nbspMy Profile
                              <span class="fas fa-caret-down first"></span></a>
                        <ul class="prof-show">
                              <li><a class="link" href="receptionistProfile.php">Account Settings</a></li>
                              <li><a class="link" href="viewShift.php">My Shifts</a></li>
                              <li><a class="link" href="recLeave.php">My Leaves</a></li>
                              <li><a class="link" href="../../config/logout.php">Log out</a></li>
                        </ul>
                  </li>
                  
            </ul>
      </nav>
      <script>
            $('.feat-btn').click(function() {
                  $('nav ul .feat-show').toggleClass("show");
                  $('nav ul .first').toggleClass("rotate");
            });
            $('.cust-btn').click(function() {
                  $('nav ul .cust-show').toggleClass("show1");
                  $('nav ul .second').toggleClass("rotate");
            });
            $('.fac-btn').click(function() {
                  $('nav ul .fac-show').toggleClass("show2");
                  $('nav ul .third').toggleClass("rotate");
            });
            $('.prof-btn').click(function() {
                  $('nav ul .prof-show').toggleClass("show3");
                  $('nav ul .fourth').toggleClass("rotate");
            });
            $('nav ul li').click(function() {
                  $(this).addClass("active").siblings().removeClass("active");
            });
      </script>
      <!--script>
            // Add active class to the current button (highlight it)
            var header = document.getElementByClassName("sidebar");
            var btns = header.getElementsByClassName("link");
            for (var i = 0; i < btns.length; i++) {
                  btns[i].addEventListener("click", function() {
                        var current = document.getElementsByClassName("active");
                        if (current.length > 0) {
                              current[0].className = current[0].className.replace(" active", "");
                        }
                        this.className += " active";
                  });
            }
      </script-->
</body>
</html>