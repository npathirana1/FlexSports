<?php
include "customerincludes/navbar1.php"
?>
<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['customerID'])) {
  $userEmail=$_SESSION['customerID'];

$id=$_POST['ReservationNo'];

  

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../assets/css/indexstyle.css">
<title>Facilities</title>
  <style>.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    margin-top: 100px;
    text-align: center;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    border-radius: 20px;
  }
  th, td {
  padding: 15px;
}
.press{margin-top: 20px;}
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
  .price {
    color: grey;
    font-size: 22px;
  }
  .topic{margin-left: 150px;
   white-space: nowrap;
   color: #17335C;
    font-size: 1.2em;
    font-weight: 900;}
  
  .button {
    border-radius: 4px;
    background-color: #0F305B;
    outline: 0;
    border: none;
    color: #FFFFFF;
    text-align: center;
    font-size: 18px;
    padding: 12px;
    width: 100%;
    transition: all 0.5s;
    cursor: pointer;
    
  }
  
  .button span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
  }
  
  .button span:after {
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -20px;
    transition: 0.5s;
  }
  
  .button:hover span {
    padding-right: 25px;
  }
  
  .button:hover span:after {
    opacity: 1;
    right: 0;
  }</style>
</head>

<body>
  <?php echo $id; ?>
<div class="topic"><h2> Our Facilities</h2></div>
<!-- <div class="circle"></div> -->

<center><div class="press>"><table><form action="calendarUPDATE" method="$_POST"> 
<input type="hidden" id="FacilityID" name="FacilityID" value="Basketball"> 
<input type='hidden' id="reservationNumber" name='ReservationNo' value="<?php echo $id; ?>" />
<tr> <td>
<div class="card" >
  <img src="../../assets/images/fbasketball.png" alt="Basketball Court" style="width:100%">
  <h1>Basketball Court</h1>
  <p class="price">1000LKR/Hour</p>
  <p>Outwit your opponent on our basketball courts and create opportunities to score!</p><br>
  <button class="button"><span>Book now</span></button>
</div> </td> 
</form>

<form action="calendarUPDATE" method="$_POST">
<input type="hidden" id="FacilityID" name="FacilityID" value="Badminton"> 
<input type='hidden' id="reservationNumber" name='ReservationNo' value="<?php echo $id; ?>" />
<td>
<div class="card">
    <img src="../../assets/images/fbadminton.png" alt="Badminton Court" style="width:100%">
    <h1>Badminton Courts</h1>
    <p class="price">500LKR/Hour</p>
    <p>Push yourself to your limits by dueling your friends in badminton.!</p><br>
    <button class="button"><span>Book now</span></button>
  </div>
</td>
</form>
<form action="calendarUPDATE" method="$_POST">
<input type="hidden" id="FacilityID" name="FacilityID" value="Billiard"> 
<input type='hidden' id="reservationNumber" name='ReservationNo' value="<?php echo $id; ?>" />
<td>
<div class="card">
    <img src="../../assets/images/fbilliard.png" alt="Billiard table" style="width:100%">
    <h1>Billiard tables</h1>
    <p class="price">500LKR/Hour</p>
    <p>Push yourself to your limits by dueling your friends in billiard.!</p><br>
    <button class="button"><span>Book now</span></button>
  </div>
</td>
</form>
</tr>
<tr>
<form action="calendarUPDATE" method="$_POST">
<input type="hidden" id="FacilityID" name="FacilityID" value="Table Tennis">
<input type='hidden' id="reservationNumber" name='ReservationNo' value="<?php echo $id; ?>" /> 
 <td>
<div class="card" >
  <img src="../../assets/images/ftabletennis.png" alt="Table Tennis" style="width:100%">
  <h1>Table Tennis</h1>
  <p class="price">1000LKR/Hour</p>
  <p>Outwit your opponent on our basketball courts and create opportunities to score!</p><br>
  <button class="button"><span>Book now</span></button>
</div> </td> </form>
<form action="calendarUPDATE" method="$_POST">
<input type="hidden" id="FacilityID" name="FacilityID" value="Volleyball">
<input type='hidden' id="reservationNumber" name='ReservationNo' value="<?php echo $id; ?>" />
<td>
<div class="card" >
  <img src="../../assets/images/fvolleyball.png" alt="Volleyball" style="width:100%">
  <h1>Volleyball</h1>
  <p class="price">1000LKR/Hour</p>
  <p>Outwit your opponent on our basketball courts and create opportunities to score!</p><br>
  <button class="button"><span>Book now</span></button>
</div> </td> </form>
<form action="calendarUPDATE" method="$_POST">
<input type="hidden" id="FacilityID" name="FacilityID" value="6">
<input type='hidden' id="reservationNumber" name='ReservationNo' value="<?php echo $id; ?>" />
<td>
<div class="card" >
  <img src="../../assets/images/fswimming.png" alt="Swimming Pool" style="width:100%">
  <h1>Swimming Pool</h1>
  <p class="price">1000LKR/Hour</p>
  <p>Outwit your opponent on our basketball courts and create opportunities to score!</p><br>
  <button class="button"><span>Book now</span></button>
</div> </td> </form>
</table>
</div>
</center>
</form>

<ul class="sci">
            <li><a href="#"><img src="../../assets/Images/facebook.png"></a></li>
            <li><a href="#"><img src="../../assets/Images/twitter.png"></a></li>
            <li><a href="#"><img src="../../assets/Images/instagram.png"></a></li>
        </ul>
 

</body>
</html>
<?php
}else {
  header('Location: ../login.php');
}

?>