<!DOCTYPE html>
<html>

<head>
      <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../../assets/CSS/navBar.css" />
      <link rel="shortcut icon" type="image/png" href="../../assets/Images/icon.png"/>
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

      <nav class="sidebar">
            <img src="../../assets/Images/logoStaff.png" alt="Logo">
            <ul>
                  <li><a class="link" href="../../views/Receptionist/receptionistIndex.php"><i class="fa fa-fw fa-home"></i>&nbspDashboard</a></li>

                  <li><a class="link" href="../../views/Staff/allReservations.php"><i class="fa fa-calculator"></i>&nbspReservations</li>

                  <li><a class="link" href="../../views/Receptionist/customerList.php"><i class="fa fa-user-circle-o"></i>&nbspCustomers</li>

                  <li><a class="link" href="../../views/Receptionist/inquiryList.php"><i class="fa fa-location-arrow"></i>&nbspInquiries</a></li>

                  <li><a class="fac-btn" href="../../views/Staff/todaySchedule.php"><i class="fa fa-calendar"></i>&nbspFacility Schedule</a></li>

                  <li class="pro-list">
                        <a class="prof-btn"><i class="fa fa-id-badge"></i>&nbspMy Profile
                              <span class="fas fa-caret-down first"></span></a>
                        <div class="second-nav">
                        <ul class="prof-show">
                              <li><a class="link" href="../Staff/staffProfile.php">Account Settings</a></li>
                              <li><a class="link" href="../Staff/viewPersonalShift.php">My Shifts</a></li>
                              <li><a class="link" href="../Staff/personalLeave.php">My Leaves</a></li>
                        </ul>
                        </div>
                  </li>

                  <li>
                        <a href="../../config/logout.php"><i class="fa fa-fw fa-sliders"></i>
                             &nbsp Log out</a>
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