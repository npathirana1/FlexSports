<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <title>Add Customer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../../assets/CSS/forms.css">
  <link rel="stylesheet" type="text/css" href="../../assets/CSS/addCustomer.css">

  <style>
    .home-section .breadcrumb-nav {
            display: flex;
            justify-content: space-between;
            height: 30px;
            background: #fff;
            align-items: center;
            position: fixed;
            width: calc(100% - 240px);
            left: 240px;
            z-index: 100;
            padding: 0 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            transition: all 0.5s ease;
        }

       
        .home-section .content{
            padding-top: 5%;
            position: relative;
        }
  </style>
</head>

<body>
  <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>

  <section class="home-section">

  <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
            <!--div>
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Manage Shifts</a></li>
                    <li class="breadcrumb-item"><a href="#">Shift List</a></li>
                    <li class="breadcrumb-item">Add Shift </li>
                    </ul> 
                </div-->

            </div>
        </nav>

        <div class="content">
    <div class="back_button">
      <button class="btn-back" onClick="window.location.href='customerList.php';">&laquo; Go back to customer list</button>
    </div>
    </br></br></br></br>
    <form action="./receptionistIncludes/addCustomer.inc.php" method="post" class="signup-form" name="addCustomer">

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
          <input type="text" placeholder="Enter National Identity Card Number" name="NIC" class="form-control" onsubmit="return validateNIC()">
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
    </div>
  </section>

  <script type="text/javascript">
    function validateNIC() {
      var NIC = document.addCustomer.NIC.value;
      const re = /^\d+$/;
      if (NIC.length == 12 && re.test(NIC)) {
        return true;
      } else if (NIC.length == 10 && (NIC[9].toLowerCase() == "v" || NIC[9].toLowerCase() == "x")) {
        return true;
      }else{
        return false;
      } 
    }
  </script>

</body>

</html>