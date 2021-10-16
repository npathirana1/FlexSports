<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <!--link rel="stylesheet" type="text/css" href="../../assets/CSS/shedule.css"-->
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
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

            padding: 10px;
            width: 90%;

        }

        .grid-container>div {

            padding: 20px 0;
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
            font-weight: 700;
        }

       
        .home-section .content{
            padding-top: 5%;
            position: relative;
        }
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

<?php include "./receptionistIncludes/receptionistNavigation.php"; ?>
    <section class="home-section">
    <nav class="breadcrumb-nav">
    <div class="top-breadcrumb">
            <div>
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item">Facility Shedule</li>
                    <li class="breadcrumb-item" ><a href="todaySchedule.php" style="color: #42ecf5;">Today</a></li>
                    </ul> 
                </div>

            </div>
        </nav>
        <div class="content">
        <div class="grid-container">

            <div class="item1">
                <h2 class="table_topic">Facility Shedule</h2>
            </div>
            
            <div class="item3">
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