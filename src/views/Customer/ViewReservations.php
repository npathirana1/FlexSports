<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['customerID'])) {
    $userEmail = $_SESSION['customerID'];

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
                margin-left:150px;
            }

            .topic {
                margin-left: 50px;
                font-size: 40px;
               
            }

            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                padding-top: 100px;
                /* Location of the box */
                left: 0;
                top: 0;
                width: 100%;

                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.4);
                /* Black w/ opacity */
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
                                <th>Email</th>
                                <th>Update</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>4/2/2022</td>
                                <td>2.00 pm - 3.00 pm</td>
                                <td>Basketball</td>
                                <td>Damitha@gmail.com</td>

                                <td><button id="myBtn" class="button update">Change</button></td>
                                <td><button class="button remove">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>23/05/2022</td>
                                <td>7.00 am - 8.00 pm</td>
                                <td>Volleyball</td>
                                <td>Sandali@gmail.com</td>

                                <td><button id="myBtn" class="button update">Change</button></td>
                                <td><button class="button remove">Cancel</button></td>
                            </tr>


                        </tbody>
                    </table>
                </div>
                <div id="formModal" class="modal">

                    <!-- Modal content -->
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
                </div>

                <div id="Past" class="tabcontent">
                    <table style="min-width: 900px; margin-left:-1030px;" class="table_view">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Facility</th>
                                <th>Email</th>
                                <th>clear</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>4/2/2020</td>
                                <td>4.00 pm - 5.00 pm</td>
                                <td>Billiard</td>
                                <td>Ashane@gmail.com</td>
                                <td><button class="button remove">Clear</button></td>
                            </tr>

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
        <script>
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
        </script>


    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>