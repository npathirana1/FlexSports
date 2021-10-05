<!DOCTYPE html>
<html>
    <head>
        <title>
            Shift Management
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/facilitycard.css">
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script> 
        <style>
           .form_title{
                color:#0F305B;
           }
        </style>
        <script>
            function mouseEnter() {
                document.getElementsByClassName("card")style.cursor=pointer; 
            }
        </script>
    </head>
    <body>     
        <?php include 'managerIncludes/ManagerNavigation.php'; ?>      
        <section class="home-section" >
            <span onclick="goBack()" style="float: right;" class="go_back">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </span>
            <h2 class="form_title">
                Manage Shift
            </h2>
            <center>
            <div class="facilities">
                <div class="card" onclick="gotoPage()" onmouseenter="mouseEnter()">
                    <img src="../../assets/Images/Tennis.jpg" alt="Avatar">
                    <div class="container">
                        <h4><b>Tennis</b></h4>
                        
                    </div>
                </div> 
                <div class="card" onclick="gotoPage()" onmouseenter="mouseEnter()">
                    <img src="../../assets/Images/Basketball.jpg" alt="Avatar">
                    <div class="container">
                        <h4><b>Basketball</b></h4>
                        
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
        </section>      
    </body>
</html>