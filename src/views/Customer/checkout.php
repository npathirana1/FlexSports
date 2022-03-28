<?php session_start(); $_SESSION["itemcount"]; 
$FID=$_SESSION['FacilityID'];
echo $_SESSION['payment'];





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
    <link rel="stylesheet" type="text/css" href="../../assets/css/contactus.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/indexstyle.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/SubmitInquiry.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
    </head>
<body>
    <!-- <div  -->
<center><form style="max-width: 600px;" method="post" action="https://sandbox.payhere.lk/pay/checkout">   
    <input type="hidden" name="merchant_id" value="1219994">    
    <input type="hidden" name="return_url" value="http://localhost/flexsports/flexsports/src/views/Customer/ViewReservations.php">
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
    <br><br> <center><div class="form-header" style="max-width:530px;">
                <h1 class="form_title">Billing details</h1>
              </div> </center><br>
   <center> 
       <div class="form-body">
       <div class="horizontal-group">
                  <div class="form-group left">
                  <label for="">First Name</label>
    <input type="text" name="first_name" class="form-control" value="<?php echo $FName; ?>">
    </div>
    <div class="form-group right">
                    <label for="">Last Name</label>
    <input type="text" name="last_name" value="<?php echo $LName; ?>"> </div>
    <div class="form-group">
                    <label for="">Email</label>
     <input type="text" name="email" value="<?php echo $userEmail; ?>">
    </div>
    <div class="form-group">
                    <label for="">Contact Number</label>
    <input type="text" name="phone" value="<?php echo $CN; ?>">
    </div>
    <input type="hidden" name="address" value="No.1, Galle Road">
    <input type="hidden" name="city" value="Colombo">
    <input type="hidden" name="country" value="Sri Lanka"><br><br> 
    <div class="form-footer">
    <input type="submit" class="btn btn-primary form_btn" value="Buy Now">  
    </div>
    </div>
    </center>
</form> </center>


</body>
</html>
<?php } ?>