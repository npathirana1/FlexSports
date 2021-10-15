<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reservations</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
    <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/leave.css">
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
    </style>
    
</head> 

<body>
<?php include "managerIncludes/managerNavigation.php"; ?>
        
    <section class="home-section">
        <h2 class="form_title">Reservations</h2>
        <span onclick="goBack()" style="float: right;" class="go_back">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </span>
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

    </section>
</body>
</html>