<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <!--link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/leave.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css"-->
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script>


        <title>Leaves</title>

        <style>
            .home-section {
                padding-top: 0.5px;
                margin-left: 0;
            }

            .leave {
                width: 150px;
                font-weight: bold;
                background-color: #0F305B;
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

            .form_title {
                color: #0F305B;
            }

            
            .tablinks {
                border-style: none;
            }

            /* The Modal (background) */

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
                width: 40%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                -webkit-animation-name: animatetop;
                -webkit-animation-duration: 0.4s;
                animation-name: animatetop;
                animation-duration: 0.4s
            }

            .close {
                color: white;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }

            .modal-header {
                padding: 2px 16px;
                background-color: #0F305B;
                color: white;
            }

            .modal-footer {
                padding: 2px 16px;
                background-color: #5cb85c;
                color: white;
            }

            .form_body {
                padding: 16px;
                background-color: #0F305B;
                width: 100%;
            }

            .form_title {
                padding: 10px;
                font-size: 30px;
                color: #FEFDFB;
            }

            hr {
                border: 1px solid #f1f1f1;
                margin-bottom: 5%;
            }

            .form_btn {
                background-color: #FEFDFB;
                color: #000000;
                border-radius: 18px;
                padding: 1% 2%;
                margin: 0.5% 0;
                border: none;
                cursor: pointer;
                width: 50%;
                opacity: 0.9;
                font-size: large;
                font-weight: 0.6%;

            }

            .form_btn:hover {
                opacity: 1;
            }

            textarea {
                width: 100%;
            }
            .action{
                padding: 8%;
            }
            table{
                width: 100%;
            }
        </style>

    </head>

    <body>

        <?php include "managerIncludes/managerNavigation.php"; ?>

        <section class="home-section">
            <nav>
                <div class="sidebar-button">
                    <!-- <i class='bx bx-menu sidebarBtn'></i> -->
                    <span class="dashboard">Leave List</span>
                    <div>
                        <ul class="breadcrumb">

                            <li>Leave List /</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <!--<img src="images/profile.jpg" alt="">-->
                    <span class="admin_name"><?php echo $_SESSION['managerID']; ?></span>
                    <!--i class='bx bx-chevron-down'></i-->
                </div>

            </nav>

            <div class="home-content" style="padding-top: 10%; padding-left: 0;">
                <!--h2 class="form_title">Leave List</h2-->
                <span onclick="goBack()" style="float: right;" class="go_back">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </span>
                <br>
                <div class="tab">
                    <button class="tablinks" onclick="openTable(event, 'Pending')" id="defaultOpen">Pending Leave</button>
                    <button class="tablinks" onclick="openTable(event, 'Approved')">Approved Leave</button>
                    <button class="tablinks" onclick="openTable(event, 'Rejected')">Rejected Leave</button>

                </div>
                <div id="Pending" class="tabcontent">
                    <center>
                        <table class="table_view">
                            <thead>
                                <tr>
                                    <th style="width: 13%;">Leave date</th>
                                    <th style="width: 13%;">Requested date</th>
                                    <th style="width: 13%;">Leave type</th>
                                    <th>Employee Name</th>
                                    <th>Description</th>
                                    <th style="width: 13%;">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>6/2/2020</td>
                                    <td>2/2/2020</td>
                                    <td>Full Day</td>
                                    <td>Hirushika Perera</td>
                                    <td>Personal Reason</td>
                                    <td>Pending</td>
                                    <td>
                                        <button class='action update'><i class='fa fa-check RepImage' aria-hidden='true'></i>
                                        </button>
                                        <button class='action remove' id="myBtn"><i class='fa fa-times RepImage' aria-hidden='true'></i>
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </center>
                </div>

                <div id="Approved" class="tabcontent">
                    <center>
                        <table class="table_view">
                            <thead>
                                <tr>
                                    <th>Leave date</th>
                                    <th>Requested date</th>
                                    <th>Leave type</th>
                                    <th>Employee Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>5/2/2020</td>
                                    <td>2/2/2020</td>
                                    <td>Full day</td>
                                    <td>Nethmi Pathirana</td>
                                    <td>Personal Reason</td>
                                    <td>Approved</td>
                                </tr>

                            </tbody>
                        </table>
                    </center>
                </div>

                <div id="Rejected" class="tabcontent">
                    <center>
                        <table class="table_view">
                            <thead>
                                <tr>
                                    <th>Leave date</th>
                                    <th>Requested date</th>
                                    <th>Leave type</th>
                                    <th>Employee Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>5/2/2020</td>
                                    <td>2/2/2020</td>
                                    <td>Full day</td>
                                    <td>Hirushika Perera</td>
                                    <td>Personal Reason</td>
                                    <td>Rejected</td>
                                    <td>No employee to substitute</td>
                                </tr>

                            </tbody>
                        </table>
                    </center>
                </div>

                <!-- The Modal -->
                <div id="formModal" class="modal">

                    <!-- Modal content -->
                    <center>
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="close">&times;</span>
                                <p class="form_title"> Reject Application for Leave</p>
                                <p style="color:#FEFDFB;">Type your reason here</p>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="form_body">

                                        <hr>

                                        <!--div class="form-group">
                                            <label for=""></label>
                                            <input type="text" placeholder="Sender's name" name="Name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for=""></label>
                                            <input type="text" placeholder="Email Address" name="Email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for=""></label>
                                            <input type="text" placeholder="Inquiry" name="Inquiry" class="form-control">
                                        </div-->
                                        <div class="form-group">
                                            <label for=""></label>
                                            <textarea rows="5" name="response" placeholder="Reason"></textarea>
                                        </div>
                                        </br>
                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-primary form_btn">Reject</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </center>
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
<?php
} else {
    header('Location: ../login.php');
}

?>