<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['customerID'])) {
  $userEmail = $_SESSION['customerID'];

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
      .item1 {
        grid-area: header;
        margin-left: -150px;

        margin-top: -275px;
        max-width:100px;
      }
      

      .item2 {
        grid-area: menu;
        margin-left: -300px;
        /* margin-top: 100px; */
      }

      .item3 {
        grid-area: main;
        margin-bottom: 50px;
        margin-left: -300px;
      }

      .item4 {
        grid-area: right;
      }


      .grid-container {
        display: grid;
        grid-template-areas:
          'header header header header header header'
          'menu main main main right right'
          'menu footer footer footer footer footer';
        grid-gap: 0px;


      }

      .grid-container>div {


        padding: none;

      }
    </style>
    <Title>Contact us</Title>
  </head>

  <body>
    <div class="grid-container">
      <div class="item1"><?php
                          include "../customer/customerincludes/navbar1.php"
                          ?></div>

      <section style="margin-left: -150px; margin-top:50px;" class="contact">
        <div class="content">



        </div>
        <div class="container">
          <div class="contactInfo">
            <div class="box">
              <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
              <div class="text">
                <h3> Address</h3>
                <p>742/7A Barnes Place,<br>Colombo 7,<br>10115</p>
              </div>
            </div>
            <div class="box">
              <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
              <div class="text">
                <h3> Phone</h3>
                <p>+94 11 278 9467</p>
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
          <div class="textBox">
            <!-- <h2 style="margin-bottom: 100px; margin-left: -620px;"> Contact <span>us</span>  </h2> -->

          </div>
        </div>
        <div style="margin-top:50px;" class="item3">
          <section style="min-width: 1350px; margin-left:250px;" class="home-section">


            </br></br></br></br>
            <form style="margin-left:-10px; margin-top:-250px; min-width:600px;" action="./customerIncludes/SubmitInquiry.inc.php" method="post" class="signup-form">

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
                    <input type="radio" id="" name="InquiryType" value="Financial">
                    <label for="">Financial</label>
                    <div class="form-group right">
                      <input type="radio" id="" name="InquiryType" value="Facility">
                      <label for="">Facility</label>
                    </div> <br> <br>
                    <div class="form-group">
                      <label for=""></label>
                      <input type="radio" id="" name="InquiryType" value="Staff">
                      <label for="">Staff</label>
                      <div class="form-group right">
                        <input type="radio" id="" name="InquiryType" value="Other">
                        <label for="">Other</label>
                      </div>

                      <br> <br>
                      <div class="form-group">
                        <label for=""></label>
                        <textarea placeholder="Enter inquiry" cols="50" rows="5" name="Description" class="form-control"></textarea>
                      </div>

                    </div>
                  </div>


                  <div class="form-footer">
                    <button type="submit" name="submit-inquiry" class="btn btn-primary form_btn">submit</button>
                  </div>

            </form>





          </section>
        </div>
        <ul style="margin-right: -300px;" class="sci">
          <li><a href="#"><img src="../../assets/Images/facebook.png"></a></li>
          <li><a href="#"><img src="../../assets/Images/twitter.png"></a></li>
          <li><a href="#"><img src="../../assets/Images/instagram.png"></a></li>
        </ul>
        <!-- <div style="margin-left: 400px; z-index:-1;" class="circle"></div>  -->



        <!-- <div class="imgBox">
                <img src="img5.jpg" class="flexsports">
            </div> -->

    </div>



    </div>


    </section>
  </body>

  </html>
<?php
} else {
  header('Location: ../login.php');
}

?>