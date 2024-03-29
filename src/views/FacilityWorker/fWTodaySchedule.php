<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/fWTodaySchedule.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .leave {
            width: 150px;
            font-weight: bold;
            background-color: #0F305B;
        }
        .update {
            background-color: Green;

        }

        .box-1, .box-2{
            display: inline-block;
            width: 50%;
            height: 10px;
        }

        .box-2{
            text-align: right;
        }

        h2 {
            transform: translate(0%, -80%);
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

        .grid-item {
            text-align: right;
        }

        .item1 {
            grid-column: 1 / span 2;
            grid-row: 2;
            
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
                    <li class="breadcrumb-item"><a href="../../views/FacilityWorker/fWTodaySchedule.php">Today's Schedule</a></li>
                    
                    </ul> 
                </div>

            </div>
        </nav>
        <div class="header"></br></br></br>
        <div class="box-1 table_topic"><h2>Today's Schedule</h2></div>

        </div>
</div>
</br></br></br>
        <div class="grid-item"> 
        <div class="item1"><input type="text" id="search" placeholder="Search by customer name.." title="Customer name"></div>
</div>
        </br>
        
    

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

     
       

    </section>
</body>

</html>