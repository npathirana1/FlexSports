<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
}

.flip-card {
  background-color: transparent;
  width: 300px;
  height: 300px;
  perspective: 1000px;
  
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #d4d4d4;
  color: black;
}

th {
  padding: 45px;
}

.flip-card-back {
  background-color: #0F305B;
  color: #d4d4d4;
  transform: rotateY(180deg);
}

img {
  border-radius: 10px;
}
</style>
</head>
<body>
<?php include "navbar.html"?>
<br><br><br><br><br><br><br><br>

<center><table>
  <tr>
    <th><div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="viewreservations.png" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>View Reservations</h1> 
      <p>You can view the past and upcomings reservations which were initiated from your account</p> 
    </div>
  </div>
</div></th>
    <th><div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="makereservation.png" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Make a reservation</h1> 
      <p>Take a look at our facilties and make a reservation at the venue you desire!</p> 
    </div>
  </div>
</div></th>
    <th><div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="updateprofile.png" alt="Avatar" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Update profile details</h1> 
      <p>All details pertaining to your profile could be viewed and updated here.</p> 
    </div>
  </div>
</div></th>
  </tr>
  
</table>
</center>







</body>
</html>
