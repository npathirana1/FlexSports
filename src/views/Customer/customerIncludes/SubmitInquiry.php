<?php

$link = mysqli_connect("localhost", "root", "Amaya#Ashane2017", "FlexSports");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['SenderName']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['SenderEmail']);
$email = mysqli_real_escape_string($link, $_REQUEST['InquiryType']);
$Description= mysqli_real_escape_string($link, $_REQUEST['Description']);
// Attempt insert query execution
$sql = "INSERT INTO Inquiry (SenderName, SenderEmail, InquiryType, Description) VALUES ('$first_name', '$last_name', '$email','$Description')";
if(mysqli_query($link, $sql)){
    echo "Inquiry succesfully submitted!";
} else{
    // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../../../assets/CSS/forms.css">
  <link rel="stylesheet" type="text/css" href="../../../assets/CSS/SubmitInquiry.css">
  
</head>

<body>
  

  <section class="home-section">

    
    </br></br></br></br>
    <form action="" method="post" class="signup-form">

      <div class="form-header">
        <h1 class="form_title">Make an inquiry</h1>
      </div>

      <div class="form-body">
        <div class="horizontal-group">
          <div class="form-group">
            <label for=""></label>
            <input type="text" placeholder="Enter Name" name="SenderName" class="form-control">
          </div>
        <div class="form-group">
          <label for=""></label>
          <input type="text" placeholder="Enter Email" name="SenderEmail" class="form-control">
        </div>
        <div class="form-group">
          <label for=""></label>
          <input type="radio" id="General" name="InquiryType" value="General">
          <label for="General">General</label>
          <div class="form-group right">
          <input type="radio" id="Managerial" name="InquiryType" value="Managerial">
         <label for="Managerial">Managerial</label>
</div> 
<br> <br>
        <div class="form-group">
          <label for=""></label>
          <textarea placeholder="Enter inquiry" cols="50" rows="7" name="Description" class="form-control"></textarea>
        </div>
        
        </div>
      </div>
      

      <div class="form-footer">
        <button type="submit" name="submit" class="btn btn-primary form_btn">submit</button>
      </div>

    </form>





  </section>
</body>

</html>