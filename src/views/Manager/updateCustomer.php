<?php
include("../../config/db.php");

$cust_id = $_GET['id'];

$sql2 = "SELECT * FROM customer WHERE CustomerID='$cust_id'";
$user1 = mysqli_query($conn, $sql2);
$row_user1 = mysqli_fetch_assoc($user1);

$fname = $row_user1["FName"];
$lname = $row_user1["LName"];
$email = $row_user1["Email"];
$telNo = $row_user1["TelephoneNo"];
$nic = $row_user1["NIC"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inquiries</title>


    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/modal.css">
    <style>
        .home-section .home-content {
            padding-top: 10%;
            position: relative;
        }

        .modal {
            width: 30%;
            height: 75%;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;

            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        .form_btn {
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 30%;
        }

        .form-footer {
            margin-top: 8px;
        }

        .modal {
            width: 50%;
            /* height: 80%; */
            padding: 20px;
            border-radius: .8rem;
            color: var(--light);
            background: var(--background);
            box-shadow: .4rem .4rem 1.4rem .2rem #17335C;
            position: relative;
            overflow: hidden;
            margin-left: 25%;
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
                            <li class="breadcrumb-item" style="color: #fff;">Users</li>
                            <li class="breadcrumb-item"><a href="customerList.php" style="color: #fff;">Customers</a></li>
                            <li class="breadcrumb-item"><a href="#" style="color: #42ecf5;">Update Customer Details</a></li>
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

            <div id="modal-opened">
                <div class="modal">

                    <div class="modal__details">
                        <h1 class="modal__title">Update customer details</h1>
                    </div>


                    <form action="./managerIncludes/updateCustomer.inc.php" method="post" id="insert_form">
                        <div class="form-body">

                            <div class="horizontal-group">
                                <div class="form-group left">
                                    <label for=""></label>
                                    <input type="text" name="fname" id="fname" value="<?php echo $fname ?>" class="form-control" />
                                </div>
                                <div class="form-group right">
                                    <label for=""></label>
                                    <input type="text" name="lname" id="lname" value="<?php echo $lname ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" name="email" id="email" value="<?php echo $email ?>" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" name="telNo" id="telNo" class="form-control" value="<?php echo $telNo ?>" pattern="[0-9]{9}" />
                            </div>

                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" name="nic" id="nic" class="form-control" value="<?php echo $nic ?>" readonly>
                            </div>

                        </div>
                        <input type="hidden" name="customer_id" id="customer_id" />
                        <div class="form-footer">
                            <button type="submit" name="submit" class="btn btn-primary form_btn">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        </div>

    </section>


</body>

</html>