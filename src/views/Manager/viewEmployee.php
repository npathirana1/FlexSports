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
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
        <!--script type="text/javascript" src="../../assets/JS/Script1.js"></script-->
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/modal.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <style>
            .add {
                font-weight: bold;
                background-color: #0F305B;
            }

            .home-section .home-content {
                padding-top: 6%;
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

            /* The Modal (background) */

            .viewmodal {
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

            .viewUserDetails {
                padding: 10px;
                display: inline-block;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                text-align: justify;
                font-size: 18px;
                color: #FEFDFB;
            }

            .viewUserDetails p {
                margin-bottom: 0%;
            }

            input[type=text],
            input[type=date],
            input[type=tel],
            input[type=email],
            select,
            option {
                width: 100%;
                padding: 10px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;
            }
        </style>
    </head>

    <body>
        <?php include 'managerIncludes/ManagerNavigation.php'; ?>
        <section class="home-section">
            <span onclick="goBack()" style="float: right;" class="go_back">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </span>
            <nav class="breadcrumb-nav">
                <div class="top-breadcrumb">
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" style="color: #fff;">Users</li>
                            <li class="breadcrumb-item"><a href="viewEmployee.php" style="color: #42ecf5;">Employees</a></li>
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
                        &nbsp;&nbsp;<h2>Employees</h2>
                    </div>
                    <div class="grid-item item1"><input type="text" id="searchName" placeholder="Search by Employee name.." title="Employee name" onkeyup="searchName()"></div>
                </div>
                <center>
                    <table style="width:90%;" class="table_view" id="empTable">
                        <thead>
                            <tr>
                                <th style="width: 13%;">Employee ID</th>
                                <th style="width: 30%;">Employee Name</th>
                                <th style="width: 15%;">Contact Number</th>
                                <th style="width: 15%;">Position</th>
                                <th style="text-align: center;">Action</th>
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
                                    <tr style="height: 3%;">
                                        <td style="text-align: center;"><?php echo $row["EmpID"]; ?></td>
                                        <td><?php echo $row["FName"] . " " . $row["LName"]; ?></td>
                                        <td><?php echo $row["ContactNo"]; ?></td>
                                        <td><?php echo "$UserType"; ?></td>
                                        <td style="text-align: center;">
                                                                        <div>
                                                                        <a href='./viewEmployeeDetails.php?id=<?=$ID?>'> <button class='action view'><i class='fa fa-eye RepImage' aria-hidden='true'></i>
                                                    </button></a>
                                                    <button class='action update'><a href='./updateEmployee.php?id=<?=$ID?>'><i class='fa fa-pencil-square-o RepImage' aria-hidden='true'></i></a>
                                                    </button>
                                                    <a href='#modal-delete'><button class='action remove delete_data' type='button' name='delete' value='Delete' id='<?=$ID?>' data-toggle='modal'><i class='fa fa-trash RepImage' aria-hidden='true'></i></button></a>
                                                    <!-- <a href="#modal-delete"><button class='action remove delete_data' type="button" name="delete" value="Delete" id="<?php echo $rowRes["ReservationNo"]; ?>" data-toggle="modal"><i class='fa fa-trash RepImage' aria-hidden='true'></i></button></a> -->

                                                </div>
                                                                        
                                        </td>
                                    </tr>
            </div>

            <!-- The Modal to view ll employee details -->
            <!--div id="myModal" class="viewmodal"-->

                <!-- Modal content -->
                <!--div class="modal-content">
                    <div class=" form_body">
                        <span class="close">&times;</span>


                        <h2 class="form_title"><?php echo $row["FName"] . " " . $row["LName"]; ?></h2>
                        <hr>
                        <div class="viewUserDetails">
                            <p><b>Employee ID: </b><?php echo $row["EmpID"]; ?></p>
                            <p><b>NIC: </b><?php echo $row["NIC"]; ?></p>
                            <p><b>Address: </b><?php echo $row["Address"]; ?></p>
                            <p><b>Contact No: </b><?php echo $row["ContactNo"]; ?></p>
                            <p><b>Email: </b><?php echo $row["Email"]; ?></p>
                            <p><b>Date of Birth: </b><?php echo $row["DOB"]; ?></p>
                            <p><b>Gender: </b><?php echo $row["Gender"]; ?></p>
                            <p><b>Position: </b><?php echo "$UserType"; ?></p>
                        </div>
                    </div>
                </div-->

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

        <div class="wrapper">
            <div class="icon add">
                <div class="tooltip">Add Employee</div>
                <span><a href="#modal-opened" class="link-1" id="modal-closed"><i class="fas fa-plus" style="font-size: 25px;"></i></a></span>
            </div>
        </div>
        <!-- Add a new Employee to the system pop up-->
        <div class="modal-body">
            <div class="modal-container" id="modal-opened">
                <div class="modal">

                    <div class="modal__details">
                        <h1 class="modal__title">Add Employee</h1>
                    </div>

                    <form action="./managerIncludes/addUser.inc.php" method="POST" class="signup-form" name="addUser">
                        <div class="form-body">
                            <div class="horizontal-group">
                                <div class="form-group left">
                                    <label for=""></label>
                                    <input type="text" placeholder="Enter First Name" name="fname" class="form-control">
                                </div>
                                <div class="form-group right">
                                    <label for=""></label>
                                    <input type="text" placeholder="Enter Last Name" name="lname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" placeholder="Enter National Identity Card Number" name="NIC" class="form-control" onsubmit="return validateNIC()">
                            </div>
                            <div class="horizontal-group">
                                <div class="form-group left">
                                    <label for=""></label>
                                    <select name="gender" class="form-control">
                                        <option disabled selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group right">
                                    <label for=""></label>
                                    <input placeholder="Enter Date of Birth" type="text" onfocus="(this.type = 'date')" name="DOB" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="tel" name="contactNo" placeholder="Enter Mobile Number" class="form-control" pattern="[0][0-9]{9}">
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input placeholder="Enter Email" type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input placeholder="Enter Address" type="text" name="address" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for=""></label>
                                <select name="userType" class="form-control">
                                    <option value="" disabled selected>Select the user type</option>
                                    <option value="manager">Manager</option>
                                    <option value="receptionist">Receptionist</option>
                                    <option value="facilityworker">Facility Worker</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-footer">
                            <button type="submit" name="submit" class="btn btn-primary form_btn">Add Employee</button>
                        </div>
                    </form>

                    <a href="viewEmployee.php" class="link-2"></a>

                </div>
            </div>
        </div>
        <!-- Add a new Employee to the system pop up ends here-->

        <!-- Conformation pop up to delete a user is here-->
        <!--div id="deleteItem" class="viewmodel">
            <span onclick="document.getElementById('deleteItem').style.display='none'" class="close" title="Close Modal">×</span>
            <form class="modal-content" action="#" method="POST">
                <div class="DelItemCon">
                    <h1>Delete Account</h1>
                    <p>Are you sure you want to delete your account?</p>

                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('.deleteItem').style.display='none'" class="cancelbtn">Cancel</button>
                        <button type="button" onclick="document.getElementById('.deleteItem').style.display='none'" class="deletebtn">Delete</button>
                    </div>
                </div>
            </form>
        </div-->

        <!-- Conformation pop up to delete a user ends here-->
        <!-- delete confirmation-->
        <div class="modal-body">
            <div class="modal-container" id="modal-delete">
                <div class="modal">

                    <form action="./managerIncludes/deleteUser.inc.php" method="post" id="insert_form">
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
                        <input type="hidden" name="user_id" id="user_id" />
                        <div class="form-footer-d ">
                            <a href="./viewEmployee.php" class="cancel_btn">Cancel</a>
                            <button type="submit" name="submit" class="btn btn-primary form_btn_dlt">Delete</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        </section>
        <script>
    $(document).ready(function() {
        $(document).on('click', '.delete_data', function() {
            var user_id = $(this).attr("id");
            if(user_id != '') {

                $.ajax({
                url: "./managerIncludes/fetchStaffUser.inc.php",
                method: "POST",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function(value) {
                   // $('#nic').val(value.NIC);
                    $('#user_id').val(value.ID); 
                }
            });
            }
           
        });
    });
</script>
        <script>
            var imageSF = document.querySelectorAll('.myBtn');
            var backdrop = document.querySelector('.close');
            var modal = document.querySelector('.viewmodal');

            function openModal() {
                backdrop.style.display = 'block';
                modal.style.display = 'block';
            }

            function closeModal() {
                backdrop.style.display = 'none';
                modal.style.display = 'none';
            }

            for (i = 0; i < imageSF.length; i++) {
                imageSF[i].addEventListener('click', openModal);
            }

            backdrop.addEventListener('click', closeModal);
            // Get the modal
            //var modal = document.querySelector('.modal');

            // Get the button that opens the modal
            //var btn = document.querySelector('.myBtn');

            // Get the <span> element that closes the modal
            //var span = document.querySelector('.close');

            // function openModal(){
            //    btn.style.display='block';
            //    span.style.display
            //}

            // When the user clicks the button, open the modal 
            //btn.onclick = function() {
            //    modal.style.display = "block";
            //}

            // When the user clicks on <span> (x), close the modal
            //span.onclick = function() {
            //    modal.style.display = "none";
            //}

            // When the user clicks anywhere outside of the modal, close it
            //window.onclick = function(event) {
            //    if (event.target == modal) {
            //        modal.style.display = "none";
            //    }

            //}
        </script>

        <script>
            function searchName() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("searchName");
                filter = input.value.toUpperCase();
                table = document.getElementById("empTable");
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
        </script>
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>