<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/leave.css">
    <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
    

    <title>Leaves</title>

    <style>
        .home-section {
            padding-top: 0.5px;
        }
        .leave {
            width: 150px;
            font-weight: bold;
            background-color: #0F305B;
        }
        .box-1, .box-2{
            display: inline-block;
            width: 50%;
            height: 10px;
        }

        .box-2{
            text-align: right;
        }
        select {
            padding: 5px;
            margin: 0;
        }
        .form_title{
            color:#0F305B;
        }
        .table_view{
            width:90%;
        }
        .tablinks{
            border-style: none;
        }
    </style>

</head>

<body>

    <?php include "managerIncludes/managerNavigation.php"; ?>
        
    <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <!-- <i class='bx bx-menu sidebarBtn'></i> -->
        <span class="dashboard">Leave List</span>
        <div>
        <ul class="breadcrumb">
          
          <li>Leave List /</li>
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
        <!--h2 class="form_title">Leave List</h2-->
        <span onclick="goBack()" style="float: right;" class="go_back">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </span>
        <br>
        <div class="tab">
            <button class="tablinks" onclick="openTable(event, 'Pending')" id="defaultOpen">Pending Leave</button>
            <button class="tablinks" onclick="openTable(event, 'Approved')">Approved Leave</button>
            <button class="tablinks" onclick="openTable(event, 'Rejected')">Rejected Leave</button>

        </div>
        <div id="Pending" class="tabcontent">
            <center>
            <table class="table_view">
                <thead>
                    <tr>
                        <th>Leave date</th>
                        <th>Requested date</th>
                        <th>Leave type</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>4/2/2020</td>
                        <td>2/2/2020</td>
                        <td>Full day</td>
                        <td>Blah blah blah</td>
                        <td>Pending</td>
                        <td>
                            <select name="action" onchange="seletced_option(this.value)">
                                    <option>Accept</option>
                                    <option>Reject</option>
                            </select>
                        </td>
                    </tr>

                </tbody>
            </table>
            </center>
        </div>

        <div id="Approved" class="tabcontent">
        <center>
            <table class="table_view">
                <thead>
                    <tr>
                        <th>Leave date</th>
                        <th>Requested date</th>
                        <th>Leave type</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>4/2/2020</td>
                        <td>2/2/2020</td>
                        <td>Full day</td>
                        <td>Blah blah blah</td>
                        <td>Approved</td>
                    </tr>

                </tbody>
            </table>
            </center>
        </div>

        <div id="Rejected" class="tabcontent">
        <center>
            <table class="table_view">
                <thead>
                    <tr>
                        <th>Leave date</th>
                        <th>Requested date</th>
                        <th>Leave type</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>4/2/2020</td>
                        <td>2/2/2020</td>
                        <td>Full day</td>
                        <td>Blah blah blah</td>
                        <td>Rejected</td>
                    </tr>

                </tbody>
            </table>
    </center>
        </div>
        </div>

        <script>
            function openTable(evt, Period) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(Period).style.display = "block";
                evt.currentTarget.className += " active";
            }

            document.getElementById("defaultOpen").click();
        </script>

    </section>
</body>

</html>
<?php
}else {
  header('Location: ../login.php');
}

?>