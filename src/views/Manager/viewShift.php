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
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script>


        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

        <style>
            table {
                width: 50%;
            }

            td {

                padding: 2%;
                text-align: left;
            }
        </style>

    </head>

    <body>
        <?php include 'managerIncludes/ManagerNavigation.php'; ?>
        <section class="home-section">
            <nav class="breadcrumb-nav">
                <div class="top-breadcrumb">
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" style="color:#fff;">Shifts</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <!--<img src="images/profile.jpg" alt="">-->
                    <span class="admin_name"><?php echo $_SESSION['managerID']; ?></span>
                    <!--i class='bx bx-chevron-down'></i-->
                </div>

            </nav>

            <div class="home-content" style="padding-top: 10%; margin-left: 0;">
                <div class="tabset">
                    <!-- Tab 1 -->
                    <input type="radio" name="tabset" id="tab1" aria-controls="today" checked>
                    <label for="tab1">Today</label>
                    <!-- Tab 2 -->
                    <input type="radio" name="tabset" id="tab2" aria-controls="thisweek">
                    <label for="tab2">This Week</label>
                    <!-- Tab 3 -->
                    <input type="radio" name="tabset" id="tab3" aria-controls="thismonth">
                    <label for="tab3">This Month</label>

                    <div class="tab-panels">
                        <section id="today" class="tab-panel">
                            <h2>Todays' Shift</h2>
                            <table>
                                <tr>
                                    <td><strong>Manager:</strong></td>
                                    <td>Sandali Boteju</td>
                                    <td></td>
                                    <td>071 4546854</td>
                                </tr>
                                <tr style="margin-top: 7%;">
                                    <td><strong>Reception:</strong></td>
                                    <td><strong>Morning:</strong></td>
                                    <td>Sandali Boteju</td>
                                    <td>071 4546854</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><strong>Evening:</strong></td>
                                    <td>Sandali Boteju</td>
                                    <td>071 4546854</td>
                                </tr>

                            </table>
                            <center>
                                <table class="table_view" style="width:90%; ">
                                    <thead>
                                        <tr>
                                            <th style="width: 15%;">Facility</th>
                                            <th style="width: 15%;">Shift</th>
                                            <th style="width: 30%;">Employee Name</th>
                                            <th style="width: 15%;">Contact No</th>
                                            <th style="text-align:center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Basketball</td>
                                            <td>Morning</td>
                                            <td>Vihara De Silva</td>
                                            <td>011 2336 325</td>
                                            <td style="text-align:center;">
                                                <a href="./updateShift.php">
                                                    <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                                                    </button>
                                                </a>
                                                <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Basketball</td>
                                            <td>Evening</td>
                                            <td>Bawantha Perera</td>
                                            <td>011 2546 325</td>
                                            <td style="text-align:center;">
                                                <a href="./updateShift.php">
                                                    <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                                                    </button>
                                                </a>
                                                <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Volleyball</td>
                                            <td>Morning</td>
                                            <td>Rohana Perera</td>
                                            <td>011 2546 998</td>
                                            <td style="text-align:center;">
                                                <a href="./updateShift.php">
                                                    <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                                                    </button>
                                                </a>
                                                <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>

                        </section>
                        <section id="thisweek" class="tab-panel">
                            <h2>This Weeks' Shifts</h2>
                            <center>
                                <table class="table_view" style="width:90%; ">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;">Facility</th>
                                            <th style="width: 15%;">Date</th>
                                            <th style="width: 15%;">Shift</th>
                                            <th style="width: 25%;">Employee Name</th>
                                            <th style="width: 15%;">Contact No</th>
                                            <th style="text-align:center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Basketball</td>
                                            <td>10/02/2021</td>
                                            <td>Morning</td>
                                            <td>Vihara De Silva</td>
                                            <td>011 2336 325</td>
                                            <td style="text-align:center;">
                                                <a href="./updateShift.php">
                                                    <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                                                    </button>
                                                </a>
                                                <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Basketball</td>
                                            <td>10/02/2021</td>
                                            <td>Evening</td>
                                            <td>Bawantha Perera</td>
                                            <td>011 2546 325</td>
                                            <td style="text-align:center;">
                                                <a href="./updateShift.php">
                                                    <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                                                    </button>
                                                </a>
                                                <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Billiards</td>
                                            <td>11/02/2021</td>
                                            <td>Morning</td>
                                            <td>Rohana Perera</td>
                                            <td>011 2546 998</td>
                                            <td style="text-align:center;">
                                                <a href="./updateShift.php">
                                                    <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                                                    </button>
                                                </a>
                                                <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                        </section>
                        <section id="thismonth" class="tab-panel">
                            <h2>This Months' Shifts</h2>
                            <center>
                                <table class="table_view" style="width:90%; ">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;">Facility</th>
                                            <th style="width: 15%;">Date</th>
                                            <th style="width: 15%;">Shift</th>
                                            <th style="width: 25%;">Employee Name</th>
                                            <th style="width: 15%;">Contact No</th>
                                            <th style="text-align:center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Basketball</td>
                                            <td>10/02/2021</td>
                                            <td>Morning</td>
                                            <td>Vihara De Silva</td>
                                            <td>011 2336 325</td>
                                            <td style="text-align:center;">
                                                <a href="./updateShift.php">
                                                    <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                                                    </button>
                                                </a>
                                                <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Basketball</td>
                                            <td>10/02/2021</td>
                                            <td>Evening</td>
                                            <td>Bawantha Perera</td>
                                            <td>011 2546 325</td>
                                            <td style="text-align:center;">
                                                <a href="./updateShift.php">
                                                    <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                                                    </button>
                                                </a>
                                                <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Billiards</td>
                                            <td>11/02/2021</td>
                                            <td>Morning</td>
                                            <td>Rohana Perera</td>
                                            <td>011 2546 998</td>
                                            <td style="text-align:center;">
                                                <a href="./updateShift.php">
                                                    <button class='action update'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i>
                                                    </button>
                                                </a>
                                                <button class='action remove' onclick='removeUser()'><i class='fa fa-trash RepImage' aria-hidden='true'></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                        </section>
                    </div>
                    <div class="wrapper">
                        <div class="icon add">
                            <div class="tooltip">Add Shift</div>
                            <span><a href="./addShifts3.php" class="link-1" id="modal-closed"><i class="fas fa-plus" style="font-size: 25px;"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>