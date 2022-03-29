</body>

</html><?php
        include "customerincludes/navbar1.php"
        ?>
<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['customerID'])) {
  $userEmail = $_SESSION['customerID'];

?>
  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" href="../../assets/css/indexstyle.css">
    <title>Facilities</title>
    <style>
      .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 200px;
        margin: auto;
        /* margin-top: 100px; */
        text-align: center;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        border-radius: 20px;
      }

      th,
      td {
        padding: 15px;
      }

      td{
      max-height: 350px;
    }
     
      h2 {
        color: #000000;
        font-size: 2em;
        line-height: 1.4em;
        font-weight: 500;

      }

      .top {
        color: #17335C;
        font-size: 3.4em;
        font-weight: 900;
      }

      .price {
        color: grey;
        font-size: 22px;
      }

      .topic {
        margin-top: 10%;
        margin-left: 150px;
        white-space: nowrap;
        color: #17335C;
        /* font-size: 1.2em; */
        font-weight: 900;
      }

      .button {
        border-radius: 4px;
        background-color: #0F305B;
        outline: 0;
        border: none;
        color: #FFFFFF;
        text-align: center;
        font-size: 18px;
        padding: 12px;
        width: 100%;
        transition: all 0.5s;
        cursor: pointer;

      }

      .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
      }

      .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
      }

      .button:hover span {
        padding-right: 25px;
      }

      .button:hover span:after {
        opacity: 1;
        right: 0;
      }
    </style>
  </head>

  <body >
    <div class="topic">
      <div class="top">Our Facilities</div>
    </div>
    <!-- <div class="circle"></div> -->

    <center>
      <div class="press">
        <table>
          <form action="calendarTEST" method="$_POST">
            <input type="hidden" id="FacilityID" name="FacilityID" value="Basketball">
            <tr>
              <td>
                <div class="card">
                  <img src="../../assets/images/fbasketball.png" alt="Basketball Court" style="width:100%">
                  <h4>Basketball Court</h4>
                <p class="price">1000LKR/Hour</p>
                <p>Outwit your opponent on our basketball courts and score!</p><br>
                  <button class="button"><span>Book now</span></button>
                </div>
              </td>
          </form>

          <form action="calendarTEST" method="$_POST">
            <input type="hidden" id="FacilityID" name="FacilityID" value="Badminton">
            <td>
              <div class="card">
                <img src="../../assets/images/fbadminton.png" alt="Badminton Court" style="width:100%">
                <h4>Badminton Courts</h4>
                <p class="price">500LKR/Hour</p>
                <p> Push yourself to your limits by dueling your friends in badminton!</p><br>
                <button class="button"><span>Book now</span></button>
              </div>
            </td>
          </form>
          <form action="calendarTEST" method="$_POST">
            <input type="hidden" id="FacilityID" name="FacilityID" value="Billiard">
            <td>
              <div class="card">
                <img src="../../assets/images/fbilliard.png" alt="Billiard table" style="width:100%">
                <h4>Billiard tables</h4>
                <p class="price">500LKR/Hour</p>
                <p>Push yourself to your limits by dueling your friends in billiard!</p><br>
                <button class="button"><span>Book now</span></button>
              </div>
            </td>
          </form>


          <form action="calendarTEST" method="$_POST">
            <input type="hidden" id="FacilityID" name="FacilityID" value="Table Tennis">
            <td>
              <div class="card">
                <img src="../../assets/images/ftabletennis.png" alt="Table Tennis" style="width:100%">
                <h4>Table Tennis</h4>
                <p class="price">1000LKR/Hour</p>
                <p>Get together and practice your skills at our table tennis courts!</p><br>
                <button class="button"><span>Book now</span></button>
              </div>
            </td>
          </form>


          <form action="calendarTEST" method="$_POST">
            <input type="hidden" id="FacilityID" name="FacilityID" value="Volleyball">
            <td>
              <div class="card">
                <img src="../../assets/images/fvolleyball.png" alt="Volleyball" style="width:100%">
                <h4>Volleyball</h4>
                <p class="price">1000LKR/Hour</p>
                <p>Get together with your friends and come play Volleyball!</p><br>
                <button class="button"><span>Book now</span></button>
              </div>
            </td>
          </form>
          <form action="calendarTEST" method="$_POST">
            <input type="hidden" id="FacilityID" name="FacilityID" value="Swimming Pool">
            <td>
              <div class="card">
                <img src="../../assets/images/fswimming.png" alt="Swimming Pool" style="width:100%">
                <h4>Swimming Pool</h4>
                <p class="price">1000LKR/Hour</p>
                <p>Take a dip in our swimming pool for a relaxing evening with your family!</p><br>
                <button class="button"><span>Book now</span></button>
              </div>
            </td>
          </form>
        </table>
      </div>
    </center>
    </form>
  </body>

  </html>
<?php
} else {
  header('Location: ../login.php');
}

?>