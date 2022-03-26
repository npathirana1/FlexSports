<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['customerID'])) {
    $userEmail = $_SESSION['customerID'];

    $sql1 = "SELECT * from customer where Email ='" . $userEmail . "' ";

    $result = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result);
    $CustID = $row1['CustomerID'];

?>
    <?php include "./customerIncludes/navbar1.php" ?>
    <!DOCTYPE html>
    <html>

    <head>

        <link rel="stylesheet" type="text/css" href="../../assets/CSS/CustRes.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTablesCustomer.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/indexstyle.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/receptionistInquiry.css">

        <title>Reservations</title>

        <style>
            .leave {
                width: 150px;
                font-weight: bold;
                background-color: #0F305B;
            }

            .update {
                background-color: green;
            }

            .box-1,
            .box-2 {
                display: inline-block;
                width: 50%;
                height: 10px;
            }

            .box-2 {
                text-align: right;
            }





            .top {
                color: #17335C;
                font-size: 80px;
                font-weight: 900;
                margin-top: -100px;
                margin-left: 150px;
            }

            .topic {
                margin-left: 50px;
                font-size: 40px;

            }

            button:hover {
                opacity: 1;
            }

            /* Float cancel and delete buttons and add an equal width */
            .cancelbtn,
            .deletebtn {
                float: left;
                width: 50%;
            }

            /* Add a color to the cancel button */
            .cancelbtn {
                background-color: #ccc;
                color: black;
            }

            /* Add a color to the delete button */
            .deletebtn {
                background-color: #f44336;
            }

            /* Add padding and center-align text to the container */
            .container {
                padding: 16px;
                text-align: center;
            }

            /* The Modal (background) */
            .modal {
                
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: #474e5d;
                padding-top: 50px;
            }

            /* Modal Content/Box */
            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto;
                /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 80%;
                /* Could be more or less, depending on screen size */
            }

            /* Style the horizontal ruler */
            hr {
                border: 1px solid #f1f1f1;
                margin-bottom: 25px;
            }

            /* The Modal Close Button (x) */
            .close {
                position: absolute;
                right: 35px;
                top: 15px;
                font-size: 40px;
                font-weight: bold;
                color: #f1f1f1;
            }

            .close:hover,
            .close:focus {
                color: #f44336;
                cursor: pointer;
            }

            /* Clear floats */
            .clearfix::after {
                content: "";
                clear: both;
                display: table;
            }


            /* Change styles for cancel button and delete button on extra small screens */
            @media screen and (max-width: 300px) {

                .cancelbtn,
                .deletebtn {
                    width: 100%;
                }

            }
        </style>


    </head>

    <body>

        <div class="topic">
            <h2>Your Reservations</h2>
        </div>
        <div style="margin-top:-10px; " class="item2">
            <section class="home-section">
                <div class="header"></br></br></br>


                </div>
                </br>
                <div style="margin-top:-250px; margin-left:-1000px;" class="tab">
                    <button class="tablinks" onclick="openTable(event, 'Upcoming')" id="defaultOpen">Upcoming</button>
                    <button class="tablinks" onclick="openTable(event, 'Past')">Past</button>

                </div>
                <div id="Upcoming" class="tabcontent">

                    <table style="min-width: 900px; margin-left:-1030px;" class="table_view">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Facility</th>
                                <th> ResNo</th>
                                <th>Update</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $date = date('Y-m-d');
  
                            $viewReservation = "SELECT * FROM reservation WHERE CustomerID ='$CustID' AND ReservationStatus='Pending'";
                            $cResult = mysqli_query($conn, $viewReservation);
                            while ($row = mysqli_fetch_assoc($cResult)) { ?>
                                <tr>
                                    <td><?php echo $row["date"]; ?></td>
                                    <td><?php echo $row["timeslot"]; ?></td>
                                    <td><?php echo $row["FacilityName"]; ?></td>
                                    <td><?php echo $row["ReservationNo"]; ?></td>
                                    <td><form action="./calendarUPDATE/index.php" method="post"> <button type="submit" class="button update">Update</button><input type='hidden' id="reservationNumber" name='ReservationNo' value="<?php echo $row["ReservationNo"]; ?>" /><input type='hidden' id="FacilityID" name='FacilityID' value="<?php echo $row["FacilityID"]; ?>" /></form></td>
                                    <td><button onclick="openModal(<?php echo $row['ReservationNo'] ?>)" class="button remove" id="<?php echo $row["ReservationNo"]; ?>">Cancel</button></td>
                                </tr>

                            <?php } ?>


                        </tbody>
                    </table>
                </div>

               
                <div id="id01" class="modal modal-hide reservation-modal">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                    <form class="modal-content" action="./customerIncludes/cancelreservation.inc.php" method="post">
                        <div class="container">
                            <h1>Cancelletion</h1>
                            <p>Are you sure you want to delete your reservation?</p>
                            <input type='hidden' class="reservationNumber" id="reservationNumber" name='ReservationNo' value="" />
                            <div class="clearfix">
                                <button type="button" onclick="closeModal()" class="cancelbtn">Cancel</button>
                                <button type="submit" name="submit" style.display='none' class="deletebtn">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
                 <!-- script  -->
                 <style>
                    .modal-show{display: block;}
                    .modal-hide{display: none;}
                </style>
                <script>
                    var modal = document.querySelector('.reservation-modal');
                    var reservationNo;

                    const openModal = (data) => {
                        // document.getElementById("reservationNumber").value = data;
                        document.querySelector(".reservationNumber").value = data;
                        console.log(data);
                        modal.classList.add("modal-show");
                        modal.classList.remove("modal-hide");
                    }

                    const closeModal = () => {
                        modal.classList.add("modal-hide");
                        modal.classList.remove("modal-show") ;
                    }
                </script>
                <!-- script ends  -->




                <!-- <div id="formModal" class="modal">

                    
                    <center>
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="close">&times;</span>
                                <p class="form_title"> Update Reservation</p>
                                <p style="color:#FEFDFB;">Enter the respective details here.</p>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="form_body">

                                        <hr>

                                        <div class="form-group">
                                            <label for=""></label>
                                            <input type="text" placeholder="Sender's name" name="Name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for=""></label>
                                            <input type="text" placeholder="Email Address" name="Email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for=""></label>
                                            <input style="min-width:422px; min-height:43px;" type="date" id="birthday" name="birthday">
                                        </div>
                                        <div class="form-group">
                                            <label for=""></label>
                                            <input style="min-width:422px; min-height:43px; margin-top:4px;" type="time" id="birthday" name="birthday">
                                        </div>

                                        </br>
                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-primary form_btn">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </center>
                </div> -->

                <div id="Past" class="tabcontent">
                    <table style="min-width: 900px; margin-left:-1030px;" class="table_view">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Facility</th>
                                <th>clear</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $viewReservation2 = "SELECT * FROM reservation WHERE CustomerID ='$CustID' AND date <'$date'";
                            $cResult2 = mysqli_query($conn, $viewReservation2);
                            while ($row2 = mysqli_fetch_assoc($cResult2)) { ?>
                                <tr>
                                    <td><?php echo $row2["date"]; ?></td>
                                    <td><?php echo $row2["timeslot"]; ?></td>
                                    <td><?php echo $row2["FacilityNo"]; ?></td>
                                    <td><button class="button remove">Clear</button></td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
        </div>

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
        <!-- <script>
            // Get the modal
            var modal = document.getElementById("formModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script> -->



    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>