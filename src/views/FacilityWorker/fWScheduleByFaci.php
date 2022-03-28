<?php
include "../../config/db.php";
?>

<?php if (isset($_SESSION['facilityworkerID'])) {              
    $userEmail = $_SESSION['facilityworkerID'];
} ?>


<!DOCTYPE html>                                                                                     
<html>

<head>
  <title>Home</title>
    <!--link rel="stylesheet" type="text/css" href="homesection.css"-->
    <!--link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css"-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">

    <style>
.item1 {
            grid-area: header;
            text-align: left;
        }


        

.tab {
  float: left;
  background-color: #f1f1f1;
  width: 200px;
  height: 350px;
  
}

.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-family: "Lato", sans-serif;
  font-size: 15px;
}

.tab button:hover {
  background-color: #0F305B;
  color: #fff;

}

.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 365px;
}


* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}


        .home-section {
            position: relative;
            width: calc(100% - 340px);
            left: 340px;
            transition: all 0.5s ease;
            
        }

        .grid-container {
            display: grid;
            grid-template-areas:
                'header header header header header header'
                'menu main main main main main';
            grid-gap: 10px;

            padding: 20px ;
            width: 90%;

        }

        .grid-container>div {

            padding: 20px 0;


        }

.form-body-major {
    width: 600px;
    height: 320px;
}

.form-body-major .form-body {
    padding-left: 20px;
    width: 500px;
    height: 320px;
    
    border-radius: 12px;
    
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}




.show {display: block;
}


.form-body {
    padding: 10px 40px;
    color: rgb(8, 8, 8);
}

.home-section .table_view {
    border-collapse: collapse;
    transform: translate(0%, 10%);
    font-size: 0.9em;
    min-width: 450px;
    width: 90%;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    margin: 0%;
}

.table_view thead tr {
    background-color: #0F305B;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
}

.table_view th,
.table_view td {
    padding: 12px 15px;
}

.table_view td {
    color: #0F305B;
}

.table_view tbody tr {
    border-bottom: 1px solid #C4C4C4;
    background-color: FEFDFB;
}

.table_view tbody tr:nth-of-type(even) {
    background-color: #E0E0E0;
}

.table_topic {
    color: #0F305B;
    transform: translate(5%, 155%);
}

       
        .home-section .content{
            padding-top: 5%;
            position: relative;
        }

        /* Display list items side by side */



.h2 {
    color: #0F305B;
    transform: translate(5%, 155%);
}
   
    </style>
</head>

<body>


    <?php include "./facilityWorkerIncludes/sideNavigation.php"; ?>

    <section class="home-section">

    <!--nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
            <div>
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item">Facility Schedule</li>
                    <li class="breadcrumb-item"><a href="../../views/FacilityWorker/fWScheduleByFaci.php">Schedule by facility</a></li>
                    
                    </ul> 
                </div>
            </div>
        </nav-->

        <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item" style="color: #fff;">Facility Schedule - By Facility</li>
                        
                    </ul>
                </div>

            </div>
        </nav>

        <div class="grid-container">
            <div class="item1">
                <h2 style="color: #0F305B;"> </br></br>
                Schedule by facility
                </h2>
            </div>
            
            


            
            <div class="item4">

            <div class="tab">
                <button class="tablinks" onclick="openTable(event, 'Bb')" id="defaultOpen">Basketball</button>
                <button class="tablinks" onclick="openTable(event, 'Bad')">Badminton</button>
                <button class="tablinks" onclick="openTable(event, 'Bil')">Billiards</button>
                <button class="tablinks" onclick="openTable(event, 'TT')">Table Tennis</button>
                <button class="tablinks" onclick="openTable(event, 'VB')">Volleyball</button>
                <button class="tablinks" onclick="openTable(event, 'Pool')">Swimming Pool</button>
            </div>

            <div id="Bb" class="tabcontent">
            <div class="form-body-major">
                <div class="form-body">
                <table class="table_view">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Reservation Time</th>
                        <th>Customer Email</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>

                    <?php
                            
                           /* $custName = "SELECT * FROM user_login WHERE Email ='$userEmail'";
                            $name = mysqli_query($conn, $custName);
                            $row = mysqli_fetch_assoc($name);
                            $staffID = $row['ID']; */
                            $today = date('Y-m-d');
                            $viewfacility = "SELECT * FROM reservation WHERE date >= '$today' AND FacilityName ='Basketball' AND ReservationStatus = 'Confirmed'";
                            $name1 = mysqli_query($conn, $viewfacility);
                            while ($row1 = mysqli_fetch_assoc($name1)) { ?>
                        <tr>
                            <td><?php echo $row1["CustName"]; ?></td>
                            <td><?php echo $row1["timeslot"]; ?></td>
                            <td><?php echo $row1["CustEmail"]; ?></td>
                            
                        
                    </tr>
                    <?php } ?>
                    </tr>

                </tbody>
            </table>
                </div>
            
            </div>
</div>


<div id="Bad" class="tabcontent">
            <div class="form-body-major">
                <div class="form-body">
                <table class="table_view">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Reservation Time</th>
                        <th>Customer Email</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>

                    <?php
                         $today = date('Y-m-d');
                         $viewfacility = "SELECT * FROM reservation WHERE date >= '$today' AND FacilityName ='Badminton' AND ReservationStatus = 'Confirmed'";
                         $name1 = mysqli_query($conn, $viewfacility);
                         while ($row1 = mysqli_fetch_assoc($name1)) { ?>
                     <tr>
                         <td><?php echo $row1["CustName"]; ?></td>
                         <td><?php echo $row1["timeslot"]; ?></td>
                         <td><?php echo $row1["CustEmail"]; ?></td>
                         
                     
                 </tr>
                        
                        <?php } ?>
                        </tr>

                </tbody>
            </table>
                </div>
            
            </div>
</div>


<div id="Bil" class="tabcontent">
            <div class="form-body-major">
                <div class="form-body">
                <table class="table_view">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Reservation Time</th>
                        <th>Customer Email</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                         $today = date('Y-m-d');
                         $viewfacility = "SELECT * FROM reservation WHERE date >= '$today' AND FacilityName ='Billiards' AND ReservationStatus = 'Confirmed'";
                         $name1 = mysqli_query($conn, $viewfacility);
                         while ($row1 = mysqli_fetch_assoc($name1)) { ?>
                     <tr>
                         <td><?php echo $row1["CustName"]; ?></td>
                         <td><?php echo $row1["timeslot"]; ?></td>
                         <td><?php echo $row1["CustEmail"]; ?></td>
                         
                    </tr>
                    <?php } ?>
                    </tr>

                </tbody>
            </table>
                </div>
            
            </div>
</div>


<div id="TT" class="tabcontent">
            <div class="form-body-major">
                <div class="form-body">
                <table class="table_view">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Reservation Time</th>
                        <th>Customer Email</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                         $today = date('Y-m-d');
                         $viewfacility = "SELECT * FROM reservation WHERE date >= '$today' AND FacilityName ='Table Tennis' AND ReservationStatus = 'Confirmed'";
                         $name1 = mysqli_query($conn, $viewfacility);
                         while ($row1 = mysqli_fetch_assoc($name1)) { ?>
                     <tr>
                         <td><?php echo $row1["CustName"]; ?></td>
                         <td><?php echo $row1["timeslot"]; ?></td>
                         <td><?php echo $row1["CustEmail"]; ?></td>
                        
                    </tr>
                    <?php } ?>
                    </tr>

                </tbody>
            </table>
                </div>
            
            </div>
</div>


<div id="VB" class="tabcontent">
            <div class="form-body-major">
                <div class="form-body">
                <table class="table_view">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Reservation Time</th>
                        <th>Customer Email
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                         $today = date('Y-m-d');
                         $viewfacility = "SELECT * FROM reservation WHERE date >= '$today' AND FacilityName ='Volleyball' AND ReservationStatus = 'Confirmed'";
                         $name1 = mysqli_query($conn, $viewfacility);
                         while ($row1 = mysqli_fetch_assoc($name1)) { ?>
                     <tr>
                         <td><?php echo $row1["CustName"]; ?></td>
                         <td><?php echo $row1["timeslot"]; ?></td>
                         <td><?php echo $row1["CustEmail"]; ?></td>
                        
                    </tr>
                    <?php } ?>
                    </tr>

                </tbody>
            </table>
                </div>
            
            </div>
</div>

<div id="Pool" class="tabcontent">
            <div class="form-body-major">
                <div class="form-body">
                <table class="table_view">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Reservation Time</th>
                        <th>Customer Email</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                         $today = date('Y-m-d');
                         $viewfacility = "SELECT * FROM reservation WHERE date >= '$today' AND FacilityName ='Swimming Pool' AND ReservationStatus = 'Confirmed'";
                         $name1 = mysqli_query($conn, $viewfacility);
                         while ($row1 = mysqli_fetch_assoc($name1)) { ?>
                     <tr>
                         <td><?php echo $row1["CustName"]; ?></td>
                         <td><?php echo $row1["timeslot"]; ?></td>
                         <td><?php echo $row1["CustEmail"]; ?></td>
                        
                    </tr>
                    <?php } ?>
                    </tr>
                    
                </tbody>
            </table>
                </div>
            
            </div>
</div>

            <!--div class="select-box">
        <div class="options-container">
         
          <div class="option">
            <input type="radio" class="radio" id="bb" name="category" />
            <label for="bb">Basketball</label>
          </div>
          <div class="option">
            <input type="radio" class="radio" id="bad" name="category" />
            <label for="bad">Badminton</label>
          </div>
          <div class="option">
            <input type="radio" class="radio" id="bil" name="category" />
            <label for="bil">Billiards</label>
          </div>
          <div class="option">
            <input type="radio" class="radio" id="tt" name="category" />
            <label for="tt">Table Tennis</label>
          </div>
          <div class="option">
            <input type="radio" class="radio" id="vb" name="category" />
            <label for="vb">Volleyball</label>
          </div>
          <div class="option">
            <input type="radio" class="radio" id="pool" name="category" />
            <label for="pool">Swimming Pool</label>
          </div>
        
        </div>
        <div class="selected"> Select Facility </div>
      </div-->
    </div>

            </div>
            <!--div class="form-body-major">
                <div class="form-body">
                <table class="table_view">
                <thead>
                    <tr>
                        <th>Facility</th>
                        <th>Reservation Time</th>
                        <th>Customer Name</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Badminton</td>
                        <td>10-11am</td>
                        <td>S.Perera</td>
                        
                    </tr>
                </tbody>
            </table>
                </div>
            
            </div-->
        
    </section>
    <script>

function openTable(evt, Period) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(Period).style.display = "block";
                evt.currentTarget.className += " active";
}

            document.getElementById("defaultOpen").click();
 

</script>

</body>

</html>