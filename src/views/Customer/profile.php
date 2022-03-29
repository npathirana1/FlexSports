<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['customerID'])) {
    $userEmail=$_SESSION['customerID'];
    $sql = "SELECT * from customer where Email ='" . $userEmail . "' ";
    $result = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result);
    $userName = $row1['FName'];
   
?>


<?php
include "../customer/customerincludes/navbar1.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>profile</title>
    <link rel="stylesheet" href="../../assets/css/indexstyle.css">
</head>
<body>
    <section style="margin-top: 15%;">
        <div class="circle"></div>
        <div class="content">
            <div class="textBox">
            <h2>Hi <span><?php echo $userName;?>!</span></h2>
            <p>Welcome to your very own profile at flexsports!
              <br> <br>Here, you'll be provided with a holistic approach in to your day to day interactions with us.  
              We are determined to provide you with the best experience in this platform so if you have any doibts to clarify, please don't hesitate to contact us.
               
            </p><br>
            <a href="facilities.php"> Book now </a>
            </div>
            <div class="imgBox">
                <img src="../../assets/Images/profile.png" class="flexsports" >
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