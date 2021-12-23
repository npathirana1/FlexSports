<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/receptionistInquiry.css">
    <title>Reservations</title>

    <style>
        .reserve {
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

        input[type=text] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 74% 25%;
            grid-gap: 10px;
            width: 90%;
            padding-bottom: 10px;
        }

        .grid-container .add_button {
            text-align: right;
        }

        .grid-container .table_topic {
            text-align: left;
        }


        .grid-item {
            text-align: right;
        }

        .item1 {
            grid-column: 1 / span 2;
            grid-row: 2;
        }

        .item2 {
            grid-column: 1 / span 2;
            grid-row: 3;
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
            width: calc(100% - 240px);
            left: 240px;
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


        /* Modal Content */

        .modal-content {
            position: relative;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 30%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }
    </style>

</head>

<body>

    <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>

    <section class="home-section">
        <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Reservations</li>
                        <li class="breadcrumb-item"><a href="allReservations.php" style="color: #42ecf5;">Reservation List</a></li>
                        <li class="breadcrumb-item"><a href="addReservation.php">Add Reservation</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="home-content">
            <div class="header"></br></br></br>
                <div class="box-1 table_topic">
                    <h2>Customer Reservations</h2>
                </div>
                <!-- <div class="box-2" style="float: right;"><button class="button reserve" onClick="window.location.href='addReservation.php';" style="padding:10px;">Add new reservation</button></div> -->
            </div>
            </br>
            <div class="tab">
                <button class="tablinks" onclick="openTable(event, 'Upcoming')" id="defaultOpen">Upcoming Reservation</button>
                <button class="tablinks" onclick="openTable(event, 'Past')">Past Reservation</button>
            </div>
            <div id="Upcoming" class="tabcontent">

                <div class="grid-container" style="margin-left: 110px;">
                    <div class="grid-item item1"><input type="text" id="search" placeholder="Search by facility.." title="facility"></div>
                    <div class="grid-item item2"><input type="text" id="search" placeholder="Search by date.." title="date"></div>
                </div>

                <table class="table_view">
                    <thead>
                        <tr>
                            <th>Reservation date</th>
                            <th>Time</th>
                            <th>Facility</th>
                            <th>Customer Name</th>
                            <th>Payment Status</th>
                            <th>Update</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>4/2/2020</td>
                            <td>10.30am-11.30am</td>
                            <td>Swimming - Lane 1</td>
                            <td>Nethmi Pathirana</td>
                            <td>Pending</td>
                            <td><button id="myBtn" class="button update">Update</button></td>
                            <td><button class="button remove">Delete</button></td>
                        </tr>
                        <tr>
                            <td>4/2/2020</td>
                            <td>5pm-6pm</td>
                            <td>Basketball</td>
                            <td>Sandali Boteju</td>
                            <td>Advance Paid</td>
                            <td><button id="myBtn" class="button update">Update</button></td>
                            <td><button class="button remove">Delete</button></td>
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
                                        <input style="min-width:350px; min-height:43px;" type="date" id="birthday" name="birthday">
                                    </div>
                                    </br>
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input style="min-width:350px; min-height:43px; margin-top:4px;" type="time" id="birthday" name="birthday">
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

                <div class="grid-container" style="margin-left: 110px;">
                    <div class="grid-item item1"><input type="text" id="search" placeholder="Search by facility.." title="facility"></div>
                    <div class="grid-item item2"><input type="text" id="search" placeholder="Search by customer name.." title="custName"></div>

                </div>

                <table class="table_view">
                    <thead>
                        <tr>
                            <th>Reservation date</th>
                            <th>Time</th>
                            <th>Facility</th>
                            <th>Customer Name</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>4/2/2020</td>
                            <td>10.30am-11.30am</td>
                            <td>Swimming - Lane 1</td>
                            <td>Nethmi Pathirana</td>
                            <td>Completed</td>
                        </tr>
                        <tr>
                            <td>4/2/2020</td>
                            <td>5pm-6pm</td>
                            <td>Basketball</td>
                            <td>Sandali Boteju</td>
                            <td>Completed</td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>

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


    </section>
</body>

</html>