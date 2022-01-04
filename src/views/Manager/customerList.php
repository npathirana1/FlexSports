<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Customers</title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/modal.css">

        <style>
            .add {
                font-weight: bold;
                background-color: #0F305B;
            }

            .home-section .home-content {
                padding-top: 8%;
                position: relative;
            }

            input[type=text],
            input[type=password] {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;
            }

            input[type=text]:focus,
            input[type=password]:focus {
                background-color: #ddd;
                outline: none;
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
                            <li class="breadcrumb-item" style="color: #fff;">Customers</li>
                            <li class="breadcrumb-item"><a href="customerList.php" style="color: #42ecf5;">Customer List</a></li>
                            <li class="breadcrumb-item"><a href="addCustomer.php">Add Customer</a></li>
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
                <div class="grid-container">
                    <div class="table_topic">
                        &nbsp;&nbsp;<h2>Registered Customers</h2>
                    </div>
                    <div class="grid-item item1"><input type="text" id="searchName" placeholder="Search by customer name.." title="Customer name" onkeyup="searchName()"></div>
                    <div class="grid-item item2"><input type="text" id="searchNIC" placeholder="Search by NIC number.." title="NIC" onkeyup="searchNIC()"></div>
                </div>

                <table style="width:90%;" class="table_view" id="custTable">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Contact Number</th>
                            <th>NIC Number</th>
                            <th>Email</th>
                            <th>Update</th>
                            <th>Delete Account</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $viewCustomer = "SELECT * FROM customer";
                        $cResult = mysqli_query($conn, $viewCustomer);
                        while ($row = mysqli_fetch_assoc($cResult)) { ?>
                            <tr>
                                <td><?php echo $row["CustomerID"]; ?></td>
                                <td><?php echo $row["FName"] . " " . $row["LName"]; ?></td>
                                <td><?php echo $row["TelephoneNo"]; ?></td>
                                <td><?php echo $row["NIC"]; ?></td>
                                <td><?php echo $row["Email"]; ?></td>
                                <td><button id="myBtn" class="button update">Update</button></td>
                                <td><button class="button remove">Delete</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="wrapper">
                <div class="icon add">
                    <div class="tooltip">Add Customer</div>
                    <span><a href="#modal-opened" class="link-1" id="modal-closed"><i class="fas fa-plus" style="font-size: 25px;"></i></a></span>
                </div>
            </div>

            <div class="modal-body">
                <div class="modal-container" id="modal-opened">
                    <div class="modal">

                        <div class="modal__details">
                            <h1 class="modal__title">Add new customer</h1>
                        </div>

                        <form action="./receptionistIncludes/addCustomer.inc.php" method="post" class="signup-form" name="addCustomer">
                            <div class="form-body">
                                <div class="horizontal-group">
                                    <div class="form-group left">
                                        <label for=""></label>
                                        <input type="text" placeholder="Enter First Name" name="FName" class="form-control">
                                    </div>
                                    <div class="form-group right">
                                        <label for=""></label>
                                        <input type="text" placeholder="Enter Last Name" name="LName" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for=""></label>
                                    <input type="text" placeholder="Enter Email" name="Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""></label>
                                    <input type="text" placeholder="Enter Mobile Number" name="TelephoneNo" class="form-control" pattern="[0][0-9]{9}">
                                </div>
                                <div class="form-group">
                                    <label for=""></label>
                                    <input type="text" placeholder="Enter National Identity Card Number" name="NIC" class="form-control" onsubmit="return validateNIC()">
                                </div>
                            </div>

                            <div class="form-footer">
                                <button type="submit" name="submit" class="btn btn-primary form_btn">Add customer</button>
                            </div>
                        </form>

                        <a href="customerList.php" class="link-2"></a>

                    </div>
                </div>
            </div>
        </section>

        <script>
            function searchName() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("searchName");
                filter = input.value.toUpperCase();
                table = document.getElementById("custTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }

            function searchNIC() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("searchNIC");
                filter = input.value.toUpperCase();
                table = document.getElementById("custTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[3];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
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