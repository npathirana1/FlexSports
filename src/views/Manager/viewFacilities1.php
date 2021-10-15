<!DOCTYPE html>
<html>
    <head>
        <title>
            Shift Management
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/facilitycard.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script> 
        <style>
           .form_title{
                color:#0F305B;
           }
        </style>
        
    </head>
    <body>     
        <?php include 'managerIncludes/ManagerNavigation.php'; ?>      
        <section class="home-section" >
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
                <span class="admin_name">Manager</span>
                <!--i class='bx bx-chevron-down'></i-->
            </div>

        </nav>

        <div class="home-content">
            <span onclick="goBack()" style="float: right;" class="go_back">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </span>
            <!--h2 class="form_title">
                Manage Shift
            </h2-->
            <center>
            <div class="facilities">
                <div class="card" onclick="gotoPage()" onmouseenter="mouseEnter()">
                    <img src="../../assets/Images/Tennis.jpg" alt="Avatar">
                    <div class="container">
                        <h4><b>Tennis</b></h4>
                        
                    </div>
                </div> 
                <div class="card" onclick="gotoPage(value)" onmouseenter="mouseEnter()">
                    <img src="../../assets/Images/Basketball.jpg" alt="Avatar">
                    <div class="container">
                        <h4 value="Basketball"><b>Basketball</b></h4>
                        
                    </div>
                </div> 
                <div class="card" onclick="gotoPage()" onmouseenter="mouseEnter()">
                    <img src="../../assets/Images/Billiards.jpg" alt="Avatar">
                    <div class="container">
                        <h4><b>Billiards</b></h4>
                        
                    </div>
                </div> 
                <div class="card" onclick="gotoPage()" onmouseenter="mouseEnter()">
                    <img src="../../assets/Images/Badminton.jpg" alt="Avatar">
                    <div class="container">
                        <h4><b>Badminton</b></h4>
                        
                    </div>
                </div> 
                <div class="card" onclick="gotoPage()" onmouseenter="mouseEnter()">
                    <img src="../../assets/Images/Vollyball.jpg" alt="Avatar">
                    <div class="container">
                        <h4><b>Vollyball</b></h4>
                        
                    </div>
                </div>
                <div class="card" onclick="gotoPage()" onmouseenter="mouseEnter()">
                    <img src="../../assets/Images/SwimmingPool.jpg" alt="Avatar">
                    <div class="container">
                        <h4><b>Swimming Pool</b></h4>
                        
                    </div>
                </div>  
            </div>
            </center>
        </div>
        </section>      
    </body>
</html>