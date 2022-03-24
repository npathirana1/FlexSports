<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Reports</title>
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script><!-- used for charts-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script><!-- used to generate the PDF-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script><!-- used to generate the PDF-->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <!--script type="text/javascript" src="./node_modules/html2canvas/dist/html2canvas.js"></script-->
        <!-- used to generate the PDF-->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <style>
            .reportBox {
                /*border-style: solid;*/
                border-radius: 5%;
                border-width: 0.1%;
                margin: 1%;
                margin-bottom: 5%;

            }

            .topRow {
                display: grid;
                grid-template-columns: 66% 33%;

            }

            .reservationUsers {
                float: left;
                margin-left: 2%;


            }

            .middleRow {
                display: grid;
                grid-template-columns: 33% 33% 33%;
            }

            .otherDetails {
                float: left;
                margin-left: 2%;
            }

            .Registration {
                float: left;

            }

            #reservationReport {
                transform: scale(0.9);
            }

            #report {
                height: 40px;
                width: 50%;
                font-size: 18px;
                background-color: #0F305B;
                color: #f1f1ff;
                text-align: center;
                border: none;
            }

            #report a,
            a:hover,
            a:focus,
            a:active {
                text-decoration: none;
                color: inherit;
            }

            /*text decorations of the reports*/
            .maintopic {
                font-size: 25px;
                font-weight: 500;
                padding-bottom: 5%;
            }

            .subtopic {
                font-size: 20px;
                font-weight: 300;
                padding-top: 5%;
            }

            .values {
                font-size: 25px;
                font-weight: 600;
            }

            .count {
                padding-left: 20%;
            }

            .userRow {
                padding-top: 25%;
            }

            td {
                font-size: 15px;
                font-weight: 500;
            }
        </style>

    </head>

    <body>

        <?php include "managerIncludes/managerNavigation.php"; ?>

        <section class="home-section">
            <nav class="breadcrumb-nav">
                <div class="top-breadcrumb">
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" style="color: #fff;">Reports</li>
                        </ul>
                    </div>

                </div>
                <div>
                    <!--<img src="images/profile.jpg" alt="">-->
                    <span class="admin_name"><?php echo $_SESSION['managerID']; ?></span>
                    <!--i class='bx bx-chevron-down'></i-->
                </div>

            </nav>

            <div class="home-content" style="padding-top: 10%;">
                <!--span onclick="goBack()" style="float: right;" class="go_back">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </span-->
                <div id="ToPrint">
                    <div id="Row1">
                        <div class="topRow">
                            <div class="reportBox reservationUsers" id="ReservationTable">
                                <div class="maintopic">Reservation
                                </div>
                                <div id="reservationReport">
                                    <div class="top-sales box">
                                        <div id="mybar"></div>
                                        <script src="../../assets/JS/reservationSummary.js"></script>
                                    </div>
                                </div>
                            </div>
                            <div class="reportBox reservationUsers">
                                <div style="margin-bottom: 20%; text-align:right;">
                                    <button type="submit" id="report">
                                        <a href="javascript:generateReport()" id="download">Generate Report
                                        </a>
                                    </button>
                                </div>
                                <br>
                                <div id="ResSummary">
                                    <div class="reportBox otherDetails">
                                        <span class="maintopic">Recervation Summary</span><br><br>
                                        <span class="subtopic">Total number of Reservetions Made</span><br>
                                        <center> <span class="values">25</span><br></center>
                                        <span class="subtopic">Total number of Reservetions Cancled</span><br>
                                        <center><span class="values">2</span></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="middleRow">


                            <div class="reportBox otherDetails" id="resinquiries">
                                <div>
                                    <div class="maintopic">Inquires Recieved
                                    </div>
                                    <div id="noInquiry"></div>
                                    <script src="../../assets/JS/inqCount.js"></script>
                                </div>
                                <div>
                                    <span class="subtopic">Total No. of Inquires Recieved</span>
                                    <center><span class="values">13</span></center>
                                </div>
                            </div>
                            <div id="usersummary">
                                <span class="maintopic">Users</span><br>
                                <table border="0">
                                    <tr class="userRow">
                                        <td>Customers</td>
                                        <td class="count">30</td>
                                    </tr>
                                    <tr class="userRow">
                                        <td>Manager</td>
                                        <td class="count">2</td>
                                    </tr>
                                    <tr class="userRow">
                                        <td>Receptionist</td>
                                        <td class="count">4</td>
                                    </tr>
                                    <tr class="userRow">
                                        <td>Facility Worker</td>
                                        <td class="count">24</td>
                                    </tr>
                                    <tr class="userRow">
                                        <td class="subtopic">Total no. of Users</td>
                                        <td class="values count">60</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="reportBox otherDetails" id="regsummary">
                                <div>
                                    <div class="maintopic">Registrations
                                    </div>
                                    <div id="myLine"></div>
                                    <script src="../../assets/JS/registraions.js"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="editor" style="display:none">
                    <img src="">
                </div>
            </div>

            </div>
        </section>
        <script>
           /* async function generateReport() {
                document.getElementById("download").innerHTML = "Generating Report...";

                //var header=new Image;
                //header.src='../../assets/Images/icon.png';

                var restable = document.getElementById("ReservationTable");
                var ressummary = document.getElementById('ResSummary');
                var InqRecieved = document.getElementById('resinquiries');
                var Use = document.getElementById('usersummary');
                var reg = document.getElementById('regsummary');
                var test = document.getElementById('editor');
                var doc = new jsPDF('p', 'mm', 'a4');

                //doc.addImage(header.toDataURL("image/png"), 'PNG', 5, 5, 160, 100);
                /*google.visualization.events.addListener(restable, 'ready', function() {
                    restable.innerHTML = '<img src="' + restable.getImageURI() + '">';
                    
                }).then((canvas) => {
                    doc.addImage(canvas.toDataURL("image/png"), 'PNG', 5, 5, 160, 100);
                })
                await html2canvas(test, {
                    //allowTaint: true,
                    useCORS: true
                    // width:220
                }).then((canvas) => {
                    doc.addImage(canvas.toDataURL("image/jpeg"), 'JPEG', 0, 0, 160, 100);
                })*/
              /*  await html2canvas(restable, {
                    //allowTaint: true,
                    useCORS: true
                    // width:220
                }).then((canvas) => {
                    doc.addImage(canvas.toDataURL("image/png"), 'PNG', 25, 25, 160, 100);
                })
                await html2canvas(ressummary, {
                    //allowTaint: true,
                    useCORS: true
                    // width:220
                }).then((canvas) => {
                    doc.addImage(canvas.toDataURL("image/png"), 'PNG', 25, 130, 80, 90);
                })
                await html2canvas(InqRecieved, {
                    //allowTaint: true,
                    useCORS: true
                    // width:220
                }).then((canvas) => {
                    doc.addImage(canvas.toDataURL("image/png"), 'PNG', 110, 130, 80, 80);
                })
                await html2canvas(Use, {
                    //allowTaint: true,
                    useCORS: true
                    // width:220
                }).then((canvas) => {
                    doc.addImage(canvas.toDataURL("image/png"), 'PNG', 25, 215, 80, 40);
                })
                await html2canvas(reg, {
                    //allowTaint: true,
                    useCORS: true
                    // width:220
                }).then((canvas) => {
                    doc.addImage(canvas.toDataURL("image/png"), 'PNG', 110, 215, 80, 80);
                })

                doc.save("Report.pdf");

                document.getElementById("download").innerHTML = "Generate Report";

            }*/
        </script>

    </html>
<?php
} else {
    header('Location: ../login.php');
}
?>