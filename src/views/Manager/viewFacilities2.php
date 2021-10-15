<!doctype html>
<html lang="en">

<head>
    <title>
        Manage Shifts
    </title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/breadcrumbs.css">
    <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
    <style>
        .form_title {
            color: #0F305B;
        }

        .table_view {
            border-collapse: collapse;
            margin: 55px 25px;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        option {
            width: 50px;
            height: 5px;
        }

        .table_view td {
            padding: 0 15px;
        }
    </style>
</head>

<body>
    <?php include 'managerIncludes/ManagerNavigation.php'; ?>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <!-- <i class='bx bx-menu sidebarBtn'></i> -->
                <span class="dashboard">Shift list</span>
                <div>
                    <ul class="breadcrumb">
                        <li><a href="viewFacilities1.php">Shifts</a></li>
                        <li>Shift List</li>
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
            <span onclick="goBack()" style="float: right;" class="go_back">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </span>
            <!--h2 class="form_title">
                Shift list
            </h2-->
            <a href="addShifts3.php"><button class="add_btn">
                    Add Shift
                </button></a>
            <center>
                <table class="table_view" style="width:90%; ">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Contact Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Graham</td>
                            <td>011 2546 325</td>
                            <td>
                                <select name="action" onchange="seletced_option(this.value)">
                                    <option value="updateEmployee">Update</option>
                                    <option value="delete">Delete</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Matt</td>
                            <td>071 4865 256</td>
                            <td>
                                <select name="action" onchange="seletced_option(this.value)">
                                    <option value="updateEmployee">Update</option>
                                    <option value="delete">Delete</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Mary</td>
                            <td>071 4865 256</td>
                            <td>
                                <select name="action" onchange="seletced_option(this.value)">
                                    <option value="updateEmployee">Update</option>
                                    <option value="delete">Delete</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </center>
        </div>
</body>

</html>