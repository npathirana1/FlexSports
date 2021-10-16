<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="../../assets/CSS/leave.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">


    <title>Reservations</title>

    <style>
        .reserve {
            width: 150px;
            font-weight: bold;
            background-color: #0F305B;
        }

        .update{
            background-color: green;
        }

        .box-1, .box-2{
            display: inline-block;
            width: 50%;
            height: 10px;
        }

        .box-2{
            text-align: right;
        }

        #search {
            background-image: url('../../assets/Images/searchIcon.png');
            background-size: 30px 30px;
            background-position: 5px 5px;
            background-repeat: no-repeat;
            width: 25%;
            height: 40px;
            font-size: 14px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            border-radius: 15px;
            margin-bottom: 1px;
        }

        input[type=text] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 74% 25%;
            grid-gap: 10px;
            width: 90%;
            padding-bottom: 10px;
        }

        .grid-container .add_button {
            text-align: right;
        }

        .grid-container .table_topic {
            text-align: left;
        }


        .grid-item {
            text-align: right;
        }

        .item1 {
            grid-column: 1 / span 2;
            grid-row: 2;
        }

        .item2 {
            grid-column: 1 / span 2;
            grid-row: 3;
        }

        .home-section .breadcrumb-nav {
            display: flex;
            justify-content: space-between;
            height: 30px;
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

       
        .home-section .content{
            padding-top: 2%;
            position: relative;
        }
    </style>

</head>

<body>

    <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>

    <section class="home-section">
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
        <div class="header"></br></br></br>
        <div class="box-1 table_topic"><h2>Customer Reservations</h2></div>
        <div class="box-2" style="float: right;"><button class="button reserve" onClick="window.location.href='addReservation.php';" style="padding:10px;">Add new reservation</button></div>
        </div>
        </br>
        <div class="tab">
            <button class="tablinks" onclick="openTable(event, 'Upcoming')" id="defaultOpen">Upcoming Reservation</button>
            <button class="tablinks" onclick="openTable(event, 'Past')">Past Reservation</button>
        </div>
        <div id="Upcoming" class="tabcontent">

        <div class="grid-container">
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
                        <td><button class="button update">Update</button></td>
                        <td><button class="button remove">Delete</button></td>
                    </tr>
                    <tr>
                        <td>4/2/2020</td>
                        <td>5pm-6pm</td>
                        <td>Basketball</td>
                        <td>Sandali Boteju</td>
                        <td>Advance Paid</td>
                        <td><button class="button update">Update</button></td>
                        <td><button class="button remove">Delete</button></td>
                    </tr>
                    
                    
                </tbody>
            </table>
        </div>

        <div id="Past" class="tabcontent">

        <div class="grid-container">
           <div class="grid-item item1"><input type="text" id="search" placeholder="Search by facility.." title="facility"></div>
            <div class="grid-item item2"><input type="text" id="search" placeholder="Search by customer name.." title="custName"></div>

        </div>

        <table class="table_view">
                <thead>
                    <tr>
                        <th>Reservation date</th>
                        <th>Time</th>
                        <th>Facility</th>
                        <th>Customer Name</th>
                        <th>Payment Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>4/2/2020</td>
                        <td>10.30am-11.30am</td>
                        <td>Swimming - Lane 1</td>
                        <td>Nethmi Pathirana</td>
                        <td>Completed</td>
                        </tr>
                    <tr>
                        <td>4/2/2020</td>
                        <td>5pm-6pm</td>
                        <td>Basketball</td>
                        <td>Sandali Boteju</td>
                        <td>Completed</td>
                    </tr>
                    
                    
                </tbody>
            </table>
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