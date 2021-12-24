<?php
include("../../config/db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customers</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    
    <style>
  
        .add {
            font-weight: bold;
            background-color: #0F305B;
        }

        .home-section .home-content {
            padding-top: 8%;
            position: relative;
        }

    </style>
</head>

<body>

    <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>

    <section class="home-section">

        <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"  style="color: #fff;">Customers</li>
                        <li class="breadcrumb-item"><a href="customerList.php" style="color: #42ecf5;">Customer List</a></li>
                        <li class="breadcrumb-item"><a href="addCustomer.php">Add Customer</a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="home-content">
            <div class="grid-container">
                <div class="table_topic">
                    <h2>Registered Customers</h2>
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
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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