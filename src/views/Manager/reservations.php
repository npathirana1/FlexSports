<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['managerID'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Reservations</title>
       
        <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/receptionistInquiry.css">
    </head>

    <body>
        <?php include "managerIncludes/managerNavigation.php"; ?>

        <section class="home-section">
            <nav class="breadcrumb-nav">
                <div class="top-breadcrumb">
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" style="color: #fff;">Reservations</li>
                            <li class="breadcrumb-item"><a href="reservations.php" style="color: #42ecf5;">Reservation List</a></li>
                            <li class="breadcrumb-item"><a href="../StaffReservation/addReservation.php">Add Reservation</a></li>
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
                <div class="header"></br></br></br>
                    <div class="box-1 table_topic">
                        <h2>Customer Reservations</h2>
                    </div>
                    <!-- <div class="box-2" style="float: right;"><button class="button reserve" onClick="window.location.href='addReservation.php';" style="padding:10px;">Add new reservation</button></div> -->
                </div>
                </br>
                <!-- <div class="grid-container">
                    <div class="grid-item"><input type="text" id="search" placeholder="Search by facility.." title="facility"></div>
                    <div class="grid-item"><input type="text" onfocus="(this.type = 'date')" id="search" placeholder="Search by date.." title="date"></div>

                </div> -->

                <div class="tab">
                    <button class="tablinks" onclick="openTable(event, 'Today')" id="defaultOpen">Today</button>
                    <button class="tablinks" onclick="openTable(event, 'ThisWeek')">This Week</button>
                    <button class="tablinks" onclick="openTable(event, 'ThisMonth')">This Month</button>
                    <button class="tablinks" onclick="openTable(event, 'All')">All Reservations</button>
                </div>
                <div id="Today" class="tabcontent">
                    <div class="grid-container" style="margin-left: 110px;"></br></br>
                        <div class="grid-item item1"><input type="text" id="search" placeholder="Search by facility.." title="facility"></div>
                        <div class="grid-item item2"><input type="text" id="search" placeholder="Search by date.." title="date"></div>
                    </div>

                    <table class="table_view">
                        <thead>
                            <tr>
                                <th>Reservation date</th>
                                <th>Time</th>
                                <th>Facility</th>
                                <th>Customer Name</th>
                                <th>Payment Status</th>
                                <th>Update</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>4/2/2020</td>
                                <td>10.30am-11.30am</td>
                                <td>Swimming - Lane 1</td>
                                <td>Nethmi Pathirana</td>
                                <td>Pending</td>
                                <td><button id="myBtn" class="button update">Update</button></td>
                                <td><button class="button remove">Delete</button></td>
                            </tr>
                            <tr>
                                <td>4/2/2020</td>
                                <td>5pm-6pm</td>
                                <td>Basketball</td>
                                <td>Sandali Boteju</td>
                                <td>Advance Paid</td>
                                <td><button id="myBtn" class="button update">Update</button></td>
                                <td><button class="button remove">Delete</button></td>
                            </tr>


                        </tbody>
                    </table>
                </div>

                <div id="ThisWeek" class="tabcontent">
                    <div class="grid-container" style="margin-left: 110px;"></br></br>
                        <div class="grid-item item1"><input type="text" id="search" placeholder="Search by facility.." title="facility"></div>
                        <div class="grid-item item2"><input type="text" id="search" placeholder="Search by date.." title="date"></div>
                    </div>
                    <center>
                        <table class="table_view">
                            <thead>
                                <tr>
                                    <th>Reservation date</th>
                                    <th>Time</th>
                                    <th>Facility</th>
                                    <th>Customer Name</th>
                                    <th>Payment Status</th>
                                    <th>Update</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>4/2/2020</td>
                                    <td>10.30am-11.30am</td>
                                    <td>Swimming - Lane 1</td>
                                    <td>Nethmi Pathirana</td>
                                    <td>Pending</td>
                                    <td><button id="myBtn" class="button update">Update</button></td>
                                    <td><button class="button remove">Delete</button></td>
                                </tr>
                                <tr>
                                    <td>4/2/2020</td>
                                    <td>5pm-6pm</td>
                                    <td>Basketball</td>
                                    <td>Sandali Boteju</td>
                                    <td>Advance Paid</td>
                                    <td><button id="myBtn" class="button update">Update</button></td>
                                    <td><button class="button remove">Delete</button></td>
                                </tr>


                            </tbody>
                        </table>
                    </center>
                </div>

                <div id="ThisMonth" class="tabcontent">
                    <div class="grid-container" style="margin-left: 110px;"></br></br>
                        <div class="grid-item item1"><input type="text" id="search" placeholder="Search by facility.." title="facility"></div>
                        <div class="grid-item item2"><input type="text" id="search" placeholder="Search by date.." title="date"></div>
                    </div>
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
                                    <td>Asela Weeransinghe</td>
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
                                    <td>Sujatha Jayasinghe</td>
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
                                    <td>Savithri Fernando</td>
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
                                    <td>Asoka Weerasinghe</td>
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
                    <div class="grid-container" style="margin-left: 110px;"></br></br>
                        <div class="grid-item item1"><input type="text" id="search" placeholder="Search by facility.." title="facility"></div>
                        <div class="grid-item item2"><input type="text" id="search" placeholder="Search by date.." title="date"></div>
                    </div>
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
                                    <td>Asela Weeransinghe</td>
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
                                    <td>Sujatha Jayasinghe</td>
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
                                    <td>Savithri Fernando</td>
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
                                    <td>Asoka Weerasinghe</td>
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
                                    <td>Sudarma De Silva</td>
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
<?php
} else {
    header('Location: ../login.php');
}

?>