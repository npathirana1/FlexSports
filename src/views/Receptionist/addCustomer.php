<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <title>Add Customer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../../assets/CSS/forms.css">
  <link rel="stylesheet" type="text/css" href="../../assets/CSS/addCustomer.css">
</head>

<body>
  <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>

  <section class="home-section">

    <div class="back_button">
      <button class="btn-back" onClick="window.location.href='customerList.php';">&laquo; Go back to customer list</button>
    </div>
    </br></br></br></br>
    <form action="./receptionistIncludes/addCustomer.inc.php" method="post" class="signup-form">

      <div class="form-header">
        <h1 class="form_title"> Add new customer</h1>
      </div>

      <div class="form-body">
        <div class="horizontal-group">
          <div class="form-group left">
            <label for=""></label>
            <input type="text" placeholder="Enter First Name" name="FName" class="form-control">
          </div>
          <div class="form-group right">
            <label for=""></label>
            <input type="text" placeholder="Enter Last Name" name="LName" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label for=""></label>
          <input type="text" placeholder="Enter Email" name="Email" class="form-control">
        </div>
        <div class="form-group">
          <label for=""></label>
          <input type="text" placeholder="Enter Mobile Number" name="TelephoneNo" class="form-control" pattern="[0][0-9]{9}">
        </div>
        <div class="form-group">
          <label for=""></label>
          <input type="text" placeholder="Enter National Identity Card Number" name="NIC" class="form-control">
        </div>
        <div class="horizontal-group">
          <div class="form-group left">
            <label for=""></label>
            <input type="password" placeholder="Enter Password" name="UserPsword" class="form-control">
          </div>
          <div class="form-group right">
            <label for=""></label>
            <input type="password" placeholder="Confirm Password" name="UserPsword-repeat" class="form-control">
          </div>
        </div>
      </div>

      <div class="form-footer">
        <button type="submit" name="submit" class="btn btn-primary form_btn">Add customer</button>
      </div>

    </form>
  </section>
</body>

</html>