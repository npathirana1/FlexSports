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

        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

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

            .badmin {
                width: 14%;
                height: auto;
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
                                <div onclick="gotoPage(this.id)" id="basketball"><i class="fas fa-basketball-ball"></i>
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
                            <div onclick="gotoPage(this.id)" id="badminton"><img src="../../assets/Images/badmin.png" class="badmin"></img>
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