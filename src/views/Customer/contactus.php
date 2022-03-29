<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['customerID'])) {
  $userEmail = $_SESSION['customerID'];
  $sql = "SELECT * from customer where Email ='" . $userEmail . "' ";
  $result = mysqli_query($conn, $sql);
  $row1 = mysqli_fetch_assoc($result);
  $Name = $row1['FName'];
  $Email = $row1['Email'];
  $Name2 = $row1['LName'];
  $space=' ';


?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us </title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/contactus.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/indexstyle.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/SubmitInquiry.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      .row {
        display: grid;
        grid-template-columns: 25% 75%;
      }

      .column {

        text-align: center;
      }
    </style>
    <Title>Contact us</Title>
  </head>

  <body>

    <div class="grid-container" style="overflow-x: hidden;">
      <div class="item1">
        <?php
        include "../customer/customerincludes/navbar1.php"
        ?>
      </div>
      <div class="row ">
        <div class="coulmn">
          <section class="contact">



            <div class="container">
              <div class="contactInfo">
                <div class="box">
                  <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                  <div class="text">
                    <h3> Address</h3>
                    <p>742/7A&nbsp;Barnes&nbsp;Place,<br>Colombo&nbsp;7,<br>10115</p>
                  </div>
                </div>
                <div class="box">
                  <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                  <div class="text">
                    <h3> Phone</h3>
                    <p>+94&nbsp;11&nbsp;278&nbsp;9467</p>
                  </div>
                </div>
                <div class="box">
                  <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                  <div class="text">
                    <h3> Email</h3>
                    <p>flexsports@gmail.com</p>
                  </div>
                </div>
              </div>
              <!-- <div class="textBox">
               <h2 style="margin-bottom: 100px; margin-left: -620px;"> Contact <span>us</span>  </h2> 

            </div> -->
            </div>
        </div>
        <div class="column">
          <div class="item3">
            <div style="min-width: 1350px;" class="home-section">


              </br></br></br></br>
              <form style="min-width:600px;" action="./customerIncludes/SubmitInquiry.inc.php" method="post" class="signup-form">

                <div class="form-header">
                  <h1 class="form_title">Make an inquiry</h1>
                </div>

                <div class="form-body">
                  <div class="horizontal-group">
                    <div class="form-group">
                      <label for=""></label>
                      <input type="text" value="<?php echo $Name; echo $space; echo $Name2; ?>" name="SenderName" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for=""></label>
                      <input type="text" value="<?php echo $Email; ?>" name="SenderEmail" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for=""></label>&nbsp;
                      <input type="radio" id="" name="InquiryType" value="Financial">
                      <label for="">Payment Related</label>
                      <div class="form-group right">
                        <input type="radio" id="" name="InquiryType" value="Facility">
                        <label for="">Facility Related</label>
                      </div> <br> <br>
                      <div class="form-group">
                        <label for=""></label>&nbsp;
                        <input type="radio" id="" name="InquiryType" value="Staff">
                        <label for="">Staff Complaints</label>
                        <div class="form-group right">
                          <input type="radio" id="" name="InquiryType" value="Other">
                          <label for="">General Inquiries</label>
                        </div>

                        <br> <br>
                        <div class="form-group">
                          <label for=""></label>
                          <textarea placeholder="Enter inquiry" cols="50" rows="3" name="Description" class="form-control"></textarea>
                        </div>

                      </div>
                    </div>


                    <div class="form-footer">
                      <button type="submit" name="submit-inquiry" class="btn btn-primary form_btn">submit</button>
                    </div>

              </form>

            </div>

          </div>
        </div>
      </div>
      <!-- <ul style="margin-right: -300px;" class="sci">
            <li><a href="#"><img src="../../assets/Images/facebook.png"></a></li>
            <li><a href="#"><img src="../../assets/Images/twitter.png"></a></li>
            <li><a href="#"><img src="../../assets/Images/instagram.png"></a></li>
          </ul> -->
      <!-- <div style="margin-left: 400px; z-index:-1;" class="circle"></div>  -->



      <!-- <div class="imgBox">
                <img src="img5.jpg" class="flexsports">
            </div> -->
      </section>
    </div>



  </body>

  </html>
<?php
} else {
  header('Location: ../login.php');
}

?>