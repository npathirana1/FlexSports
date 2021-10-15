<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inquiries</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/receptionistInquiry.css">
<style>
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
        }

       

        .home-section-table .content{
            padding-top: 10%;
            position: relative;
        }
</style>
    
</head> 

<body>

    <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>

    <section class="home-section-table">
    <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
            <!--div>
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Manage Shifts</a></li>
                    <li class="breadcrumb-item"><a href="#">Shift List</a></li>
                    <li class="breadcrumb-item">Add Shift </li>
                    </ul> 
                </div-->

            </div>
        </nav>

        <div class="content">
        <h2 class="table_topic">Inquiries</h2>

        <input type="text" id="search" placeholder="Search by sender name.." title="senderName">
       

        <table style="width:90%;" class="table_view">
            <thead>
                <tr>
                    <th>Sender Name</th>
                    <th>Sender Email</th>
                    <th>Inquiry</th>
                    <th>Response</th>
                    <th>Respond</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nethmi Pathirana</td>
                    <td>nethmi.pathirana@gmail.com</td>
                    <td>Is the pool open after 9 p.m on Friday?</td>
                    <td>Unfortunately the pool will be closed after 7 p.m on Fridays for cleaning purposes.</td>
                    <td><button class="button respond" id="myBtn">Respond</button></td>
                    <td><button class="button remove">Delete</button></td>
                </tr>
                <tr>
                    <td>Sandali Boteju</td>
                    <td>sandali@yahoo.com</td>
                    <td>Are there any packages available to book the entire sport's facility</td>
                    <td>Kindly inquire us via the main line regarding this matter.</td>
                    <td><button class="button respond" id="myBtn">Respond</button></td>
                    <td><button class="button remove">Delete</button></td>
                </tr>
            </tbody>
        </table>
        </div>
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
                                <textarea rows="6" cols="53" name="response"  placeholder="Enter your response here"></textarea>
                            </div>
                            </br>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary form_btn">Send</button>
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