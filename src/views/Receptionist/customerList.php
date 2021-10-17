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

        .home-section-table .breadcrumb-nav {
            display: flex;
            justify-content: space-between;
            height: 80px;
            background: #fff;
            align-items: center;
            position: fixed;
            width: calc(100% - 240px);
            left: 240px;
            z-index: 100;
            padding: 0 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            transition: all 0.5s ease;
            font-weight: 700;
        }

       

        .home-section-table .content{
            padding-top: 10%;
            position: relative;
        }
       
    
ul.breadcrumb li {
    display: inline;
    font-size: 18px;
}


/* Add a slash symbol (/) before/behind each list item */

ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: "/\00a0";
}


/* Add a color to all links inside the list */

ul.breadcrumb li a {
    color: #01447e;
    text-decoration: none;
}


/* Add a color on mouse-over */

ul.breadcrumb li a:hover {
    color: #0a5ea8;
    text-decoration: underline;
}

  </style>
</head>

<body>

<?php include "./receptionistIncludes/receptionistNavigation.php"; ?>

    <section class="home-section-table">
        
    <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
            <div>
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item">Customers</li>
                    <li class="breadcrumb-item"><a href="customerList.php" style="color: #42ecf5;">Customer List</a></li>
                    <li class="breadcrumb-item" ><a href="addCustomer.php">Add Customer</a></li>
                    </ul> 
                </div>

            </div>
        </nav>

        <div class="content">
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
</body>

</html>