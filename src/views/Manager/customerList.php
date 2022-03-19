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
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

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

            .action {
                padding: 6%;
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
                            <li class="breadcrumb-item"><a href="customerList.php" style="color: #42ecf5;">Customers</a></li>
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
                            <th style="width: 13%;">Customer ID</th>
                            <th style="width: 25%;">Customer Name</th>
                            <th style="width: 13%;">Contact Number</th>
                            <th style="width: 13%;">NIC Number</th>
                            <th style="width: 13%;">Email</th>
                            <th>Action</th>

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
                                <!-- <td><a href="#modal-update"><button id="myBtn" class="button update">Update</button></a></td>
                                <td><button class="button remove">Delete</button></td> -->
                                <td>

                                    <a href="updateCustomer.php?id=<?php echo $row["CustomerID"];?>"><button class='action update edit_data' type="button" name="edit" value="Edit" id="<?php echo $row["CustomerID"]; ?>" data-toggle="modal"><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i></button></a>
                                    <a href="#modal-delete"><button class='action remove delete_data' type="button" name="delete" value="Delete" id="<?php echo $row["CustomerID"]; ?>" data-toggle="modal"><i class='fa fa-trash RepImage' aria-hidden='true'></i></button></a>

                                </td>
                                </td>
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

            <!-- add customer form -->
            <div class="modal-body">
                <div class="modal-container" id="modal-opened">
                    <div class="modal">

                        <div class="modal__details">
                            <h1 class="modal__title">Add new customer</h1>
                        </div>

                        <form action="../Receptionist/receptionistIncludes/addCustomer.inc.php" method="post" class="signup-form" name="addCustomer">
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
                                    <input type="text" placeholder="Enter National Identity Card Number" name="NIC" class="form-control" pattern="(([0-9]{9}(x|v))|([0-9]{12}))">
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

<!-- update form -->
<!-- <div class="modal-body">
    <div class="modal-container" id="modal-update">
        <div class="modal">

            <div class="modal__details">
                <h1 class="modal__title">Update customer details</h1>
            </div>


            <form action="./managerIncludes/updateCustomer.inc.php" method="post" id="insert_form">
                <div class="form-body">

                    <div class="horizontal-group">
                        <div class="form-group left">
                            <label for=""></label>
                            <input type="text" name="fname" id="fname" class="form-control" />
                        </div>
                        <div class="form-group right">
                            <label for=""></label>
                            <input type="text" name="lname" id="lname" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="email" id="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="telNo" id="telNo" class="form-control" pattern="[0-9]{9}" />
                    </div>
                   
                    <input type="hidden" name="nic" id="nic" class="form-control" onsubmit="return validateNIC()" readonly>
                   
                </div>
                <input type="hidden" name="customer_id" id="customer_id" />
                <div class="form-footer">
                    <button type="submit" name="submit" class="btn btn-primary form_btn">Update</button>
                </div>

            </form>

            <a href="customerList.php" class="link-2"></a>
        </div>
    </div>
</div> -->

<!-- delete confirmation-->
<div class="modal-body">
    <div class="modal-container" id="modal-delete">
        <div class="modal">

            <form action="./managerIncludes/deleteCustomer.inc.php" method="post" id="insert_form">
                <div class="form-body">

                    <div class="horizontal-group">
                        <h3>Are you sure you want to delete this account?</h3>
                    </div>
                    <div class="form-group">
                        <br>
                        <p>The account you are trying to delete will be permanantly removed and you won't be able to retrieve it again.</p>
                        <br>
                    </div>
                    
                    <input type="hidden" name="nic" id="nic" class="form-control" onsubmit="return validateNIC()" readonly>
                    
                </div>
                <input type="hidden" name="customer_id" id="customer_id" />
                <div class="form-footer-d ">
                    <a href="customerList.php" class="cancel_btn">Cancel</a>
                    <button type="submit" name="submit" class="btn btn-primary form_btn_dlt">Delete</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- <script>
    $(document).ready(function() {

        $(document).on('click', '.edit_data', function() {
            var customer_id = $(this).attr("id");
            $.ajax({
                url: "managerIncludes/fetchCustomer.inc.php",
                method: "POST",
                data: {
                    customer_id: customer_id
                },
                dataType: "json",
                success: function(data) {
                    $('#fname').val(data.FName);
                    $('#lname').val(data.LName);
                    $('#email').val(data.Email);
                    $('#telNo').val(data.TelephoneNo);
                    $('#nic').val(data.NIC);
                    $('#customer_id').val(data.CustomerID);
                }
            });
        }); 
    });
</script> -->

<script>
    $(document).ready(function() {
        $(document).on('click', '.delete_data', function() {
            var customer_id = $(this).attr("id");
            if(customer_id != '') {

                $.ajax({
                url: "./managerIncludes/fetchCustomer.inc.php",
                method: "POST",
                data: {
                    customer_id: customer_id
                },
                dataType: "json",
                success: function(value) {
                    $('#nic').val(value.NIC);
                    $('#customer_id').val(value.CustomerID); 
                    $('#email').val(value.Email);
                }
            });
            }
           
        });
    });
</script>

