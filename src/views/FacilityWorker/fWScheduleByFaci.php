<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <!--link rel="stylesheet" type="text/css" href="homesection.css"-->
    <!--link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css"-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <style>
        .item1 {
            grid-area: header;
            text-align: left;
        }


        .item2 {
            grid-area: menu;
        }

        .item3 {
            grid-area: main;
           }

        .item4 {
            transform: translate(63%, 10%);
            
           }

        .item4 .dropdown{
            font-size: 20px;
            font-weight: 700;
            
            color: #0F305B ;
}
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .home-section {
            position: relative;
            width: calc(100% - 340px);
            left: 340px;
            transition: all 0.5s ease;
            padding-top: 50px;
        }

        .grid-container {
            display: grid;
            grid-template-areas:
                'header header header header header header'
                'menu main main main main main';
            grid-gap: 10px;

            padding: 20px ;
            width: 90%;

        }

        .grid-container>div {

            padding: 20px 0;


        }

        .form {
    padding: 12px;
    
    width: 500px;
    height: 320px;
    float: right;
    border-radius: 12px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}




.form-body {
    padding: 10px 40px;
    color: rgb(8, 8, 8);
}

.home-section .table_view {
    border-collapse: collapse;
    transform: translate(0%, 10%);
    font-size: 0.9em;
    min-width: 400px;
    width: 70%;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    margin: 0%;
}

.table_view thead tr {
    background-color: #0F305B;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
}

.table_view th,
.table_view td {
    padding: 12px 15px;
}

.table_view td {
    color: #0F305B;
}

.table_view tbody tr {
    border-bottom: 1px solid #C4C4C4;
    background-color: FEFDFB;
}

.table_view tbody tr:nth-of-type(even) {
    background-color: #E0E0E0;
}

.table_topic {
    color: #0F305B;
    transform: translate(5%, 155%);
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
            padding-top: 5%;
            position: relative;
        }

        /* Display list items side by side */

ul.breadcrumb li {
    display: inline;
    font-size: 18px;
}


/* Add a slash symbol (/) before/behind each list item */

ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: "/\00a0";
}


/* Add a color to all links inside the list */

ul.breadcrumb li a {
    color: #01447e;
    text-decoration: none;
}


/* Add a color on mouse-over */

ul.breadcrumb li a:hover {
    color: #0a5ea8;
    text-decoration: underline;
}

.h2 {
    color: #0F305B;
    transform: translate(5%, 155%);
}
   
    </style>
</head>

<body>


    <?php include "./facilityWorkerIncludes/sideNavigation.php"; ?>

    <section class="home-section">

    <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
            <div>
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item">Facility Schedule</li>
                    <li class="breadcrumb-item"><a href="../../views/FacilityWorker/fWScheduleByFaci.php">Schedule by facility</a></li>
                    
                    </ul> 
                </div>

            </div>
        </nav>

        <div class="grid-container">
            <div class="item1">
                <h2 style="color: #0F305B;">
                Schedule by facility
                </h2>
            </div>
            <div class="item2"><?php include "./shiftCalendar.php"; ?></div>
            <div class="item3">
            <div class="item4">
                <div class="dropdown">
            <label for="facility">Select Facility: </label>
  <select name="facility" id="facility">
    <option value="bb">Basketball</option>
    <option value="bad">Badminton</option>
    <option value="bill">Billiard</option>
    <option value="tt">Table tennis</option>
    <option value="volley">Volleyball</option>
    <option value="swim">Swimming pool</option>


  </select>
            </div>
</div>
                <div class="form-body">
                <table class="table_view">
                <thead>
                    <tr>
                        <th>Facility</th>
                        <th>Reservation Time</th>
                        <th>Customer Name</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Badminton</td>
                        <td>10-11am</td>
                        <td>S.Perera</td>
                        
                    </tr>

                </tbody>
            </table>
                </div>
            
            </div>
        </div>
    </section>
</body>

</html>