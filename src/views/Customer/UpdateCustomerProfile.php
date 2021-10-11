<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../../assets/CSS/forms.css">
  <link rel="stylesheet" type="text/css" href="../../assets/CSS/SubmitInquiry.css">
  
</head>

<body>
  

  <section class="home-section">

  <div class="back_button">
      <button class="btn-back" onClick="window.location.href='customerhome.php';">&laquo; Go back home</button>
    </div>
    </br></br></br></br>
    <form action="../SubmitInquiry.inc.php" method="post" class="signup-form">

      <div class="form-header">
        <h1 class="form_title">Update Profile Details</h1>
      </div>

      <div class="form-body">
        <div class="horizontal-group">
        <div class="form-group">
            <label for="">NIC</label> : 991162780V
          </div> <br>
         <div class="form-group">
            <label for="">Email</label> : Ashanegunarathne@gmail.com
          </div>  <br>
          <div class="form-group">
            <label for="">First Name</label>
            <input type="text" placeholder="Ashane" name="FName" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Last Name</label>
            <input type="text" placeholder="Gunarathne" name="LName" class="form-control">
          </div>
        <div class="form-group">
          <label for="">Mobile Number</label>
          <input type="text" placeholder="0774145153" name="TelephoneNo" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" placeholder="********" name="UserPsword" class="form-control">
        </div>
        
        
</div> 
<br> <br>
        
        
        </div>
      </div>
      

      <div style="margin-top: -70px;" class="form-footer">
        <button type="submit" name="submit" class="btn btn-primary form_btn">Update</button>
      </div>

    </form>





  </section>
</body>

</html>