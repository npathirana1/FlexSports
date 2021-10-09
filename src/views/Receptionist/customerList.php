<?php
    include("../../config/db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customers</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">

    <style>
        #search {
            background-image: url('../../assets/Images/searchIcon.png');
            background-size: 30px 30px;
            background-position: 5px 5px;
            background-repeat: no-repeat;
            width: 25%;
            height: 40px;
            font-size: 14px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            border-radius: 15px;
            margin-bottom: 1px;
        }

        input[type=text] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 74% 25%;
            grid-gap: 10px;
            width: 90%;
            padding-bottom: 10px;
        }

        .grid-container .add_button {
            text-align: right;
        }

        .grid-container .table_topic {
            text-align: left;
        }


        .grid-item {
            text-align: right;
        }

        .item1 {
            grid-column: 1 / span 2;
            grid-row: 2;
        }

        .item2 {
            grid-column: 1 / span 2;
            grid-row: 3;
        }

        .add {
            font-weight: bold;
            background-color: #0F305B;
        }
    </style>
</head>

<body>

    <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>

    <section class="home-section-table">
        <div class="grid-container">
            <div class="table_topic">
                <h2>Registered Customers</h2>
            </div>
            <div class="add_button"><button class="button add" onClick="window.location.href='addCustomer.php';" style="padding:10px;">Add new customer</button></div>
            <div class="grid-item item1"><input type="text" id="search" placeholder="Search by customer name.." title="Customer name"></div>
            <div class="grid-item item2"><input type="text" id="search" placeholder="Search by NIC number.." title="Phone number"></div>

        </div>
        <table style="width:90%;" class="table_view">
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
                        <td><?php echo $row["FName"]." ".$row["LName"]; ?></td>
                        <td><?php echo $row["TelephoneNo"]; ?></td>
                        <td><?php echo $row["NIC"]; ?></td>
                        <td><?php echo $row["Email"]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</body>

</html>