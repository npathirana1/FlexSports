<?php include "./customerIncludes/navbar1.php"?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../assets/CSS/customerhome.css">
<link rel="stylesheet" type="text/css" href="../../assets/CSS/indexstyle.css">
<style>
  h2
{
    color: #000000;
    font-size: 4em;
    line-height: 1.4em;
    font-weight: 500;
}
.top
{
    color: #17335C;
    font-size: 1.2em;
    font-weight: 900;
}
.topic{margin-left: 100px;}

a{color: #FFFAE4;}

</style>
</head>
<body style="background-color: #FFFAE4;">

<div class="topic"><h2> Your<div class="top"> Inquiries</div></h2></div>

<!-- <center><table>
  <tr>
    <th><div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="../../assets/Images/viewreservations.png" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <a href="ViewReservations.php"><h1>View Reservations</h1></a>
      <p>You can view the past and upcomings reservations which were initiated from your account</p> 
    </div>
  </div>
</div></th>
    <th><div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="../../assets/Images/makereservation.png" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <a href="../website/facilities.php"><h1>Make a reservation</h1> </a>
      <p>Take a look at our facilties and make a reservation at the venue you desire!</p> 
    </div>
  </div>
</div></th>
    <th><div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="../../assets/Images/updateprofile.png" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
    <a href="UpdateCustomerProfile.php"><h1>Update profile details</h1> </a>
      <p>All details pertaining to your profile could be viewed and updated here.</p> 
    </div>
  </div>
</div></th>
  </tr>
  
</table>

</center> -->
<div class="inq"><?php include "./customerIncludes/InquiriesSubmitted.php"?></div>







</body>
</html>
