<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            Shift Management
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <style>
            .form_title {
                color: #0F305B;
                padding-bottom: 2%;
            }

            .grid-container {
                display: grid;
                grid-gap: 50px;
                grid-template-columns: auto auto auto;
                width: 90%;
                text-align: center;
                margin-left: 5%;
            }

            .grid-item {
                background-color: #0F305B;
                padding: 20px;
                text-align: center;
                height: 10%x;
                border-radius: 12px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                width: 300px;
            }

            .grid-container .grid-item div {
                color: white;
                text-decoration: none;
                font-size: 30px;
            }
        </style>

    </head>

    <body>
        <?php include 'managerIncludes/ManagerNavigation.php'; ?>
        <section class="home-section">
            <nav>
                <div class="sidebar-button">
                    <!-- <i class='bx bx-menu sidebarBtn'></i> -->
                    <span class="dashboard">Manage Shifts</span>
                    <div>
                        <ul class="breadcrumb">

                            <li>Shifts /</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <!--<img src="images/profile.jpg" alt="">-->
                    <span class="admin_name"><?php echo $_SESSION['managerID']; ?></span>
                    <!--i class='bx bx-chevron-down'></i-->
                </div>

            </nav>

            <div class="home-content">
                <span onclick="goBack()" style="float: right;" class="go_back">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </span>
                <h2 class="form_title">
                    Select Facility
                </h2>
                <center>
                    <div class="grid-container">
                        <form action="viewFacilities2.php" method="GET">
                            <div class="grid-item">
                                <div onclick="gotoPage(this.id)"id="basketball"><i class="fas fa-basketball-ball"></i>
                                    <span class="links_name">&nbsp Basketball</span>
                                </div>
                            </div>
                        </form>
                        <div class="grid-item">
                            <div onclick="gotoPage(this.id)" id="billiards"><i class="fas fa-bowling-ball"></i>
                                <span class="links_name">&nbsp Billiards</span>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div onclick="gotoPage(this.id)" id="tabletennis"><i class="fas fa-table-tennis"></i>
                                <span class="links_name">&nbsp Table tennis</span>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div onclick="gotoPage(this.id)" id="swimming"><i class="fas fa-swimmer"></i>
                                <span class="links_name">&nbsp Swimming</span>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div onclick="gotoPage(this.id)"id="badminton"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="49" height="49" viewBox="0 0 172 172" style=" fill:#000000;">
                                    <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                        <g fill="#ffffff">
                                            <path d="M80.40104,1.00432c-0.2339,-0.01197 -0.4704,0.00035 -0.70547,0.04402l-14.32773,2.81696c-1.02053,0.20282 -1.8486,0.92898 -2.1668,1.90365l-29.93763,91.93087l-7.0155,8.14278c-0.00801,0.00907 -0.02009,0.01283 -0.02799,0.02201l-7.40182,8.60494l-7.34583,8.52791l-3.93607,3.87332c-4.859,4.77475 -7.5362,11.12066 -7.5362,17.8701c0,6.63957 2.60243,12.87813 7.31224,17.62251c0.07794,0.07851 0.14486,0.1644 0.22396,0.24208c0.03116,0.03062 0.0639,0.0576 0.09518,0.08803c0.02196,0.01965 0.04463,0.03605 0.06719,0.05502c4.99394,4.82522 11.50661,7.25148 18.02305,7.25148c6.5876,0 13.16875,-2.46766 18.18542,-7.39452l3.96966,-3.89533l8.64479,-7.19095l4.37839,-3.63674l4.37838,-3.63674c0.00318,-0.00266 0.00243,-0.00833 0.0056,-0.011l8.32005,-6.91586l93.5362,-29.41854c0.99187,-0.30987 1.73371,-1.12639 1.93724,-2.12923l2.86667,-14.0738c0.1892,-0.92396 -0.10732,-1.87707 -0.78386,-2.54187l-23.53802,-23.1299l-4.3112,-34.38673c-0.01843,-0.14452 -0.08365,-0.27033 -0.12318,-0.40714c-0.039,-0.13812 -0.06232,-0.27499 -0.12318,-0.40714c-0.28849,-0.62337 -0.79169,-1.11657 -1.42773,-1.39748c-0.13147,-0.05821 -0.26585,-0.08334 -0.40313,-0.12104c-0.14031,-0.03905 -0.27152,-0.10313 -0.41992,-0.12104l-34.99349,-4.23644l-23.53802,-23.12989c-0.5074,-0.4986 -1.17954,-0.77836 -1.88125,-0.81428zM79.31484,6.86933l21.62318,21.24825l-47.60234,84.19523l-14.25495,-14.00228l29.06979,-89.24596zM76.29141,12.90489c-0.2425,-0.00607 -0.48491,0.01659 -0.72786,0.07152c-0.96607,0.22536 -1.74508,0.92467 -2.06042,1.84863l-6.06367,17.8701c-0.50167,1.4789 0.31193,3.06956 1.81406,3.55972c1.50787,0.49579 3.12646,-0.30383 3.62812,-1.77711l4.59115,-13.54562l9.24948,9.09461l-4.88789,8.07676c-0.8084,1.33524 -0.36505,3.06243 0.99661,3.85682c0.45867,0.27043 0.96253,0.39614 1.46133,0.39614c0.97753,0 1.93021,-0.49095 2.46914,-1.37547l6.02448,-9.9584c0.6708,-1.10707 0.49768,-2.52329 -0.43112,-3.43317l-14.10378,-13.85923c-0.52675,-0.51973 -1.23213,-0.80706 -1.95964,-0.82528zM106.06107,30.65945l28.22435,3.41116l-10.17891,10.00242c-1.12087,1.10143 -1.12087,2.88193 0,3.98336c0.559,0.54931 1.29296,0.82528 2.02682,0.82528c0.73387,0 1.46782,-0.27316 2.02682,-0.82528l10.17891,-10.00241l3.47695,27.72946l-23.68919,12.93491l-56.74544,30.97557zM144.39714,70.81765l21.62317,21.25375l-2.23398,10.97074l-90.81511,28.56575l-14.25495,-14.00778zM143.26055,78.45426c-0.61562,-0.07606 -1.25349,0.04454 -1.81966,0.37413l-10.13411,5.92002c-1.3588,0.79438 -1.81348,2.52426 -1.00222,3.86232c0.81127,1.33806 2.56594,1.77654 3.93047,0.97934l8.21927,-4.79764l9.25508,9.0891l-13.78464,4.51704c-1.50213,0.49015 -2.31013,2.08913 -1.80846,3.56522c0.40133,1.18031 1.51996,1.92566 2.72109,1.92566c0.29813,0 0.60343,-0.04983 0.89583,-0.15405l18.17982,-5.95303c0.94313,-0.30987 1.65192,-1.07256 1.88125,-2.02469c0.22933,-0.94932 -0.05913,-1.95075 -0.76146,-2.6409l-14.10377,-13.85923c-0.46297,-0.45353 -1.05288,-0.72722 -1.66849,-0.80327zM35.9957,103.24572l15.97383,15.69136l15.97943,15.70236l-4.36159,3.63124l-31.28138,-30.74449zM28.58828,111.84515l30.60391,30.07327l-2.178,1.81012l-2.178,1.81562l-29.93763,-29.41854zM21.18086,120.44459l29.26016,28.75281l-4.35599,3.62574l-28.59388,-28.09259zM13.59987,128.87346l28.26354,27.77898l-2.01003,1.97517c-6.07663,5.97126 -15.1121,7.26206 -22.49662,3.92284l8.77357,-1.01235c1.57093,-0.18029 2.6974,-1.57587 2.51393,-3.11956c-0.18633,-1.54933 -1.62074,-2.67035 -3.18021,-2.47034l-8.0401,0.92432l7.5362,-7.40553c1.12087,-1.10143 1.12087,-2.88193 0,-3.98336c-1.12087,-1.10143 -2.93278,-1.10143 -4.05365,0l-7.5418,7.41103l0.94622,-7.9117c0.18633,-1.54088 -0.9374,-2.93928 -2.50833,-3.11956c-1.57093,-0.19437 -2.99674,0.92102 -3.18021,2.47034l-1.03581,8.64345c-1.20177,-2.55042 -1.85326,-5.34023 -1.85326,-8.23631c0,-5.248 2.08111,-10.17962 5.85651,-13.88674z"></path>
                                        </g>
                                    </g>
                                </svg>
                                <span class="links_name">&nbsp Badminton</span>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div onclick="gotoPage(this.id)" id="volleyball"><i class="fas fa-volleyball-ball"></i>
                                <span class="links_name">&nbsp Volleyball</span>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        </section>
        <script>
            function gotoPage(id) {
                sessionStorage.setItem("FACI", id);
                window.location.href = "viewFacilities2.php";
                

                // to set into local storage
                /* localStorage.setItem("NAME", name);
                localStorage.setItem("SURNAME", surname); */

                
                

                
            }
        </script>
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>