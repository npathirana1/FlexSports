<?php session_start(); $_SESSION["itemcount"]; 
$FID=$_SESSION['FacilityID'];
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['customerID'])) {
    $userEmail=$_SESSION['customerID'];
    $sql = "SELECT * from customer where Email ='" . $userEmail . "' ";
    $result = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result);
    $FName = $row1['FName'];
    $LName = $row1['LName'];
    $CN = $row1['TelephoneNo'];

    
?>



<html>
    <head>
        <style>
            body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-weight: 700;
}

* {
    box-sizing: border-box;
}

.form_box {
    margin-top: 30px;
    margin-left: 350px;
    position: relative;
    background: #0F305B;
    border-radius: 18px;
    align-items: center;
    width: 500px;
    padding-bottom: 20px;
}

.form_body {
    padding: 16px;
    background-color: #0F305B;
    width: 100%;
}

.form_title {
    font-size: 40px;
    padding-top: 15px;
    color: #FEFDFB;
}

input[type=text],
input[type=password],
input[type=date],
input[type=time] {
    width: 30%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus,
input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

.form_btn {
    background-color: #FEFDFB;
    color: #000000;
    border-radius: 18px;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 50%;
    opacity: 0.9;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-size: large;
    font-weight: 600;
}

.form_btn:hover {
    opacity: 1;
}

a {
    color: #ffb3b3;
}

.signin {
    background-color: #0F305B;
    text-align: center;
    color: #D5D5D5;
}

        </style>
    </head>
<body>
    <!-- <div  -->
<form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
    <input type="hidden" name="merchant_id" value="1219994">    
    <input type="hidden" name="return_url" value="./ViewReservations.php">
    <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
    <input type="hidden" name="notify_url" value="http://sample.com/notify">  
    
    <input type="hidden" name="order_id" value="<?php
echo uniqid();
?>
">
    <input type="hidden" name="items" value="<?php echo $_SESSION['itemcount'].' hour booking for ' ?> <?php echo $_SESSION['FacilityID'];?>"><br>
    <input type="hidden" name="currency" value="LKR">
    <input type="hidden" name="amount" value="<?php echo $_SESSION['totalprice'] ?>
">  
    <br><br> <center>Billing Details </center><br>
   <center> 
    <input type="text" name="first_name" value="<?php echo $FName; ?>">
    <input type="text" name="last_name" value="<?php echo $LName; ?>"><br>
    <input type="text" name="email" value="<?php echo $userEmail; ?>">
    <input type="text" name="phone" value="<?php echo $CN; ?>"><br>
    <input type="hidden" name="address" value="No.1, Galle Road">
    <input type="hidden" name="city" value="Colombo">
    <input type="hidden" name="country" value="Sri Lanka"><br><br> 
    <input type="submit" class="btn btn-primary form_btn" value="Buy Now">   
    </center>
</form> 
</body>
</html>
<?php } ?>