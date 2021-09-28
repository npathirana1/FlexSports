<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/forms.css" >
  </head>
  <body>
  <center>
    <div class="container">
      
      <div class="form_box">
        <div class="col-md-5 mx-auto">  

          <form action="./customerIncludes/registration.inc.php" method="post">
          <div class="form_body">

          <p class="form_title"> Inquiry</p>
            <p style="color:#FEFDFB;">Please fill in this form to create an account.</p>
            <hr>

            <div class="form-group">
              <label for=""></label>
              <input type="text" placeholder="Sender's name" name="FName" class="form-control">
            </div>
            <div class="form-group">
              <label for=""></label>
              <input type="text" placeholder="Email Address" name="LName" class="form-control">
            </div>
            <div class="form-group">
              <label for=""></label>
              <input type="text" placeholder="Inquiry" name="Email" class="form-control">
            </div>
            <div class="form-group">
              <label for=""></label>
              <input type="text" placeholder="Response" name="TelephoneNo" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-primary form_btn">Send</button>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </center>
  </body>
</html>