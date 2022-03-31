<!DOCTYPE html>
<html>

<head>
      <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../../assets/CSS/facilityNavbar.css" />
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="shortcut icon" type="image/png" href="../../assets/Images/icon.png"/>

</head>

<body>

      <nav class="sidebar">
            <img src="../../assets/Images/logoStaff.png" alt="Logo">
            
            <ul>
                  <li><a class="link" href="../../views/FacilityWorker/facilityWorkerDashboard.php"><i class="fa fa-fw fa-home"></i>&nbspDashboard</a></li>
                  <li>
                        <a class="fac-btn" href="../../views/FacilityWorker/fWScheduleByFaci.php"><i class="fa fa-calendar"> </i>&nbspFacility Schedule</a>  
                  </li>
                  <li>
                        <a class="prof-btn"><i class="fa fa-id-badge"></i>&nbsp My Profile
                              <span class="fas fa-caret-down first"></span></a>
                        <ul class="prof-show">
                              <li><a class="link" href="../Staff/staffProfile.php">Profile Details</a></li>
                              <li><a class="link" href="../Staff/viewPersonalShift.php">My Shifts</a></li>
                              <li><a class="link" href="../Staff/personalLeave.php">My Leaves</a></li>
                        </ul>
                  </li>

                  <li>
                        <a href="../../config/logout.php"><i class="fa fa-fw fa-sliders"></i>
                             &nbspLog out</a>
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
</body>

</html>