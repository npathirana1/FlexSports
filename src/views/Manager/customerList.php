<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customers</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
    <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/receptionistInquiry.css">
    <style>
           .form_title{
                color:#0F305B;
           }
           select {
            padding: 5px;
            margin: 0;
            }
    </style>
    
</head> 

<body>

    <?php include "managerIncludes/managerNavigation.php"; ?>

    <section class="home-section">
        <span onclick="goBack()" style="float: right;" class="go_back">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </span>
        <h2 class="form_title">Manage Customers</h2>
            <a href="addEmployee.php"><button class="add_btn">
                Add Customer
            </button></a>
            <br><br>
        <input type="text" id="search" placeholder="Search by Customer name.." title="senderName">
       
        <center>
        <table style="width:90%;" class="table_view">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Nethmi Pathirana</td>
                    <td>nethmi.pathirana@gmail.com</td>
                    <td>
                            <select name="action" onchange="seletced_option(this.value)">
                                <option value="view">View</option>
                                <option value="updateEmployee">Update</option>
                                <option value="delete">Delete</option>
                            </select>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Sandali Boteju</td>
                    <td>sandali@yahoo.com</td>
                    <td>
                            <select name="action" onchange="seletced_option(this.value)">
                                <option value="view">View</option>
                                <option value="updateEmployee">Update</option>
                                <option value="delete">Delete</option>
                            </select>
                    </td>
                </tr>
            </tbody>
        </table>
        </center>
    </section>

    <!-- The Modal -->
    <div id="formModal" class="modal">

        <!-- Modal content -->
        <center>
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <p class="form_title"> Reply to Inquiry</p>
                    <p style="color:#FEFDFB;">Type your response here</p>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form_body">

                            <hr>

                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" placeholder="Sender's name" name="Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" placeholder="Email Address" name="Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" placeholder="Inquiry" name="Inquiry" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <textarea name="response"  placeholder="Enter your response here"></textarea>
                            </div>
                            
                        </div>
                    </form>
                </div>

            </div>
        </center>
    </div>

</body>

<script>
    // Get the modal
    var modal = document.getElementById("formModal");

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

</html>