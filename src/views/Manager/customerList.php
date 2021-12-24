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
        <!-- <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css"> -->

        <style>
            .home-section .home-content {
                padding-top: 8%;
                position: relative;
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
                    <div class="add_button"><button class="button add" onClick="window.location.href='addCustomer.php';" style="padding:10px;">Add new customer</button></div>
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
        </section>
    </body>
    </html>

<?php
} else {
    header('Location: ../login.php');
}
?>