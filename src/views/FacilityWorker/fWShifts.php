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



.form_body {
    padding: 16px;
    background-color: #0F305B;
    width: 100%;
}

.form_title {
    font-size: 40px;
    padding-top: 15px;
    color: #FEFDFB;
}
      


.form-body {
    padding: 10px 40px;
    color: rgb(8, 8, 8);
}

.display_box{
    border-color:#0b0b0c;
    border-radius: 10px;
    background-color: #8ec1f8;
    width: 300px;
    height: 70px;
    padding: 5px;
    margin-right: 20px;
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
   
    </style>
</head>

<body>


    <?php include "./facilityWorkerIncludes/sideNavigation.php"; ?>

    <section class="home-section">

    <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
            <div>
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item">My Profile</li>
                    <li class="breadcrumb-item"><a href="../../views/FacilityWorker/fWShifts.php">My Shifts</a></li>
                    
                    </ul> 
                </div>

            </div>
        </nav>

        <div class="grid-container">
            <div class="item1">
                <h2 style="color: #0F305B;">
                Work Schedule
                </h2>
            </div>
            <div class="item2"><?php include "./shiftCalendar.php"; ?></div>
            <div class="item3">
                <div class="form-body">
                    <h3 style="color: #0F305B;">
                    Assigned Facility
                   </h3>
                    <br>
                    <div class="display_box">
                        <p>Message Appears Here</p>
                    </div>
                    <br> <br>
<hr> 
<br> 
                    <h3 style="color: #0F305B;">
                    Shift
                   </h3>
                    <br>
                    <div class="display_box">
                        <p>Message Appears Here</p>
                    </div>

                </div>
            </div>

        </div>
    </section>
</body>

</html>