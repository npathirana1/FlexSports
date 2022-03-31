<?php
include "../customer/customerincludes/navbar1.php"
?>
<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['customerID'])) {
  $userEmail=$_SESSION['customerID'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About us</title>
    <link rel="stylesheet" href="../../assets/css/indexstyle.css">
</head>
<body>
    <section style="margin-top: 15%;">
        <div class="circle"></div>
        <div class="content">
            <div class="textBox">
            <h2> About<br> <span> FlexSports</span></h2>
            <p>FlexSports includes two each of state of the art badminton courts & squash courts. 
              <br> It also houses a well-equipped gym where a full view of the back garden is seen with its magnificent trees. 
               The complex also has attached to it, an indoor basket Ball court and a 33 1/3 meters swimming pool. The complex currently has 8 different sports including the water sports activities. <br> <br> 
               We are open daily from 6.00 AM to 10.00 PM. We assure you that we have the ideal sporting venues for people of all ages. Drop by and see how we are committed to live up to your expectations, always.
            </p>
            
            </div>
            <div class="imgBox">
                <img src="../../assets/Images/aboutus.png" class="flexsports" >
            </div>
        </div>
        <ul class="sci">
            <li><a href="#"><img src="../../assets/Images/facebook.png"></a></li>
            <li><a href="#"><img src="../../assets/Images/twitter.png"></a></li>
            <li><a href="#"><img src="../../assets/Images/instagram.png"></a></li>
        </ul>
    </section>
</body>
</html>
<?php
}else {
  header('Location: ../login.php');
}

?>