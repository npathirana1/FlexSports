<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reservations</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
    <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/leave.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
    <style>
        .form_title{
                color:#0F305B;
        }
        select {
            padding: 5px;
            margin: 0;
        }
        .table_view{
            width:90%;
        }
        .tab .tablinks {
            border-style: none;
        }
        .grid-container {
            display: grid;
            grid-template-columns: 25% 25%;
            grid-gap: 10px;
            width: 90%;
            padding-bottom: 10px;
            padding-left: 20px;
            text-align: left;
        }
        .grid-container .add_button {
            text-align: right;
        }
        .grid-container .table_topic {
            text-align: right;
        }
        .grid-item {
            text-align: right;
        }
        input[type=date] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 22px 0;
            border: none;
            border-radius: none;
            background: #f1f1f1;
        }

    </style>
    
</head> 

<body>
<?php include "managerIncludes/managerNavigation.php"; ?>
        
    <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <!-- <i class='bx bx-menu sidebarBtn'></i> -->
        <span class="dashboard">Reservations</span>
        <div>
        <ul class="breadcrumb">
          
          <li>Reservations /</li>
        </ul> 
      </div>
      </div>
      <div>
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Manager</span>
        <!--i class='bx bx-chevron-down'></i-->
      </div>
      
    </nav>

    <div class="home-content">
        <h2 class="form_title"></h2>
        <span onclick="goBack()" style="float: right;" class="go_back">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </span>
        <br>
            <a href="addReservation.php"><button class="add_btn">
                Make Reservation
            </button></a>
            <br><br>
            <div class="grid-container">
                <div class="grid-item"><input type="text" id="search" placeholder="Search by facility.." title="facility"></div>
                <div class="grid-item"><input type="text" onfocus="(this.type = 'date')" id="search" placeholder="Search by date.." title="date"></div>

            </div>
            <br>
        <div class="tab">
            <button class="tablinks" onclick="openTable(event, 'Today')" id="defaultOpen">Today</button>
            <button class="tablinks" onclick="openTable(event, 'ThisWeek')">This Week</button>
            <button class="tablinks" onclick="openTable(event, 'ThisMonth')">This Month</button>
            <button class="tablinks" onclick="openTable(event, 'All')">All Reservations</button>


        </div>
        <div id="Today" class="tabcontent">
            <center>
            <table class="table_view">
                <thead>
                        <tr>
                            <th>Reservation ID</th>
                            <th>Customer Name</th>
                            <th>Contact Number</th>
                            <th>Facility</th>
                            <th>Action</th>
                        </tr>
                </thead>
                <tbody>
                    <tr>
                            <td>1</td>
                            <td>Domenic</td>
                            <td>011 2546 325</td>
                            <td>Tennis court</td>
                            <td>
                                <select name="action">
                                    <option value="view"> <a href="#view">View</a> </option>
                                    <option value="update"> <a href="#update">Update</a> </option>
                                    <option value="delete"> <a href="#delete">Delete</a> </option>
                                </select>
                            </td>
                    </tr>

                </tbody>
            </table>
            </center>
        </div>

        <div id="ThisWeek" class="tabcontent">
        <center>
            <table class="table_view">
                <thead>
                        <tr>
                            <th>Reservation ID</th>
                            <th>Customer Name</th>
                            <th>Contact Number</th>
                            <th>Facility</th>
                            <th>Action</th>
                        </tr>
                </thead>
                <tbody>
                    <tr>
                            <td>1</td>
                            <td>Domenic</td>
                            <td>011 2546 325</td>
                            <td>Tennis court</td>
                            <td>
                                <select name="action">
                                    <option value="view"> <a href="#view">View</a> </option>
                                    <option value="update"> <a href="#update">Update</a> </option>
                                    <option value="delete"> <a href="#delete">Delete</a> </option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                            <td>2</td>
                            <td>Sally</td>
                            <td>071 4865 256</td>
                            <td>Swinning pool</td>
                            <td>
                                <select name="action">
                                    <option value="view"> <a href="#view">View</a> </option>
                                    <option value="update"> <a href="#update">Update</a> </option>
                                    <option value="delete"> <a href="#delete">Delete</a> </option>
                                </select>
                            </td>
                        </tr>

                </tbody>
            </table>
            </center>
        </div>

        <div id="ThisMonth" class="tabcontent">
        <center>
            <table class="table_view">
            <thead>
                        <tr>
                            <th>Reservation ID</th>
                            <th>Customer Name</th>
                            <th>Contact Number</th>
                            <th>Facility</th>
                            <th>Action</th>
                        </tr>
                </thead>
                <tbody>
                    <tr>
                            <td>1</td>
                            <td>Domenic</td>
                            <td>011 2546 325</td>
                            <td>Tennis court</td>
                            <td>
                                <select name="action">
                                    <option value="view"> <a href="#view">View</a> </option>
                                    <option value="update"> <a href="#update">Update</a> </option>
                                    <option value="delete"> <a href="#delete">Delete</a> </option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                            <td>2</td>
                            <td>Sally</td>
                            <td>071 4865 256</td>
                            <td>Swinning pool</td>
                            <td>
                                <select name="action">
                                    <option value="view"> <a href="#view">View</a> </option>
                                    <option value="update"> <a href="#update">Update</a> </option>
                                    <option value="delete"> <a href="#delete">Delete</a> </option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                            <td>3</td>
                            <td>Kasey Landry</td>
                            <td>071 4896 556</td>
                            <td>Billiards</td>
                            <td>
                                <select name="action">
                                    <option value="view"><a href="#view">View</a></option>
                                    <option value="update"><a href="#update">Update</a></option>
                                    <option value="delete"><a href="#delete">Delete</a></option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                            <td>4</td>
                            <td>Bella Adkins</td>
                            <td>078 5465 256</td>
                            <td>Swinning pool</td>
                            <td>
                                <select name="action">
                                    <option value="view"><a href="#view">View</a></option>
                                    <option value="update"><a href="#update">Update</a></option>
                                    <option value="delete"><a href="#delete">Delete</a></option>
                                </select>
                            </td>
                    </tr>

                </tbody>
            </table>
        </center>
        </div>
        <div id="All" class="tabcontent">
        <center>
            <table class="table_view">
            <thead>
                        <tr>
                            <th>Reservation ID</th>
                            <th>Customer Name</th>
                            <th>Contact Number</th>
                            <th>Facility</th>
                            <th>Action</th>
                        </tr>
                </thead>
                <tbody>
                    <tr>
                            <td>1</td>
                            <td>Domenic</td>
                            <td>011 2546 325</td>
                            <td>Tennis court</td>
                            <td>
                                <select name="action">
                                    <option value="view"> <a href="#view">View</a> </option>
                                    <option value="update"> <a href="#update">Update</a> </option>
                                    <option value="delete"> <a href="#delete">Delete</a> </option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                            <td>2</td>
                            <td>Sally</td>
                            <td>071 4865 256</td>
                            <td>Swinning pool</td>
                            <td>
                                <select name="action">
                                    <option value="view"> <a href="#view">View</a> </option>
                                    <option value="update"> <a href="#update">Update</a> </option>
                                    <option value="delete"> <a href="#delete">Delete</a> </option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                            <td>3</td>
                            <td>Kasey Landry</td>
                            <td>071 4896 556</td>
                            <td>Billiards</td>
                            <td>
                                <select name="action">
                                    <option value="view"> <a href="#view">View</a> </option>
                                    <option value="update"> <a href="#update">Update</a> </option>
                                    <option value="delete"> <a href="#delete">Delete</a> </option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                            <td>4</td>
                            <td>Bella Adkins</td>
                            <td>078 5465 256</td>
                            <td>Swinning pool</td>
                            <td>
                                <select name="action">
                                    <option value="view"> <a href="#view">View</a> </option>
                                    <option value="update"> <a href="#update">Update</a> </option>
                                    <option value="delete"> <a href="#delete">Delete</a> </option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                            <td>5</td>
                            <td>Marley Wagner</td>
                            <td>011 6665 256</td>
                            <td>Basketball Court</td>
                            <td>
                                <select name="action">
                                    <option value="view"> <a href="#view">View</a> </option>
                                    <option value="update"> <a href="#update">Update</a> </option>
                                    <option value="delete"> <a href="#delete">Delete</a> </option>
                                </select>
                            </td>
                    </tr>

                </tbody>
            </table>
            </center>
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
    </div>
    </section>
</body>
</html>