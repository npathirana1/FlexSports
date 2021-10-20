<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            Employees
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
        <style>
            .form_title {
                color: #0F305B;
            }

            .table_view {
                border-collapse: collapse;
                margin: 55px 25px;
                font-size: 0.9em;
                min-width: 400px;
                border-radius: 5px 5px 0 0;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }

            option {
                width: 50px;
                height: 5px;
            }

            .table_view td {
                padding: 0 15px;
            }

            .table_view tbody tr td select {
                width: 100px;
                height: 25px;
                border: 1px solid #C4C4C4;
                border-radius: 5px;
                background-color: #FEFDFB;
                text-decoration: #0F305B;
                margin: 6%;
                padding: 0;
            }

            .table_view tbody tr td select:nth-of-type(even) {
                background-color: #E0E0E0;
                text-decoration: #0F305B;
                margin: 6%;
                padding: 0;
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
        </style>
    </head>

    <body>
        <?php include 'managerIncludes/ManagerNavigation.php'; ?>
        <section class="home-section">
            <span onclick="goBack()" style="float: right;" class="go_back">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </span>
            <nav>
                <div class="sidebar-button">
                    <!-- <i class='bx bx-menu sidebarBtn'></i> -->
                    <span class="dashboard">Employees</span>
                    <div>
                        <ul class="breadcrumb">
                            <li>Users</li>
                            <li>Employees /</li>
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
                <a href="addEmployee.php"><button class="add_btn">
                        Add Employee
                    </button></a>
                <center>
                    <table class="table_view" style="width:90%; ">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Contact Number</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM facility_staff UNION ALL SELECT * FROM receptionist_staff UNION ALL SELECT * FROM manager_staff ORDER BY EmpID;");

                            if (mysqli_num_rows($result) > 0) {
                                $i = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $ID = $row["EmpID"];
                                    $call2 = "SELECT ID,UserType FROM user_login WHERE ID='$ID'";
                                    $result2 = mysqli_query($conn, $call2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $UserType = $row2["UserType"];
                                    if ($UserType == 'manager') {
                                        $UserType = "Manager";
                                    } elseif ($UserType == 'receptionist') {
                                        $UserType = "Receptionist";
                                    } elseif ($UserType == 'facilityworker') {
                                        $UserType = "Faclility Worker";
                                    }

                            ?>
                                    <tr>
                                        <td><?php echo $row["EmpID"]; ?></td>
                                        <td><?php echo $row["FName"] . " " . $row["LName"]; ?></td>
                                        <td><?php echo $row["ContactNo"]; ?></td>
                                        <td><?php echo "$UserType"; ?></td>
                                        <td><?php echo 
                                                "<select name='action' onchange='seletced_option(this.value)'>
                                                    <option id='myBtn'>View</option>
                                                    <option value='updateEmployee'>Update</option>
                                                    <option value='delete'>Delete</option>
                                                </select>"
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>
                        </tbody>
                    </table>
                <?php
                            } else {
                                echo "No result found";
                            }
                ?>
                </center>
            </div>
            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p><?php echo $row["EmpID"]; ?></p>
                </div>

            </div>
        </section>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

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