<!DOCTYPE html>
<html>
    <head>
        <title>
            Home
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/home.css">
    </head>
    <body>
        <div>
        <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>
        </div>
        <div class="main">
            
            <div class="defaultbg" id="notification">
                <p class="topic">Notification</p>
                <!-- repeat the div display class for each notification-->
                <div class="display"><!-- a single notification is written should improve this to dispaly multiple. recursive is better-->
                    <p style="padding: left 25px;">Date &emsp; Time</p>
                    <p>Notification</p>
                </div>
                <!--this should be removed after completing the backend-->
                <div class="display"><!-- a single notification is written should improve this to dispaly multiple. recursive is better-->
                    <p style="padding: left 25px;">Date &emsp; Time</p>
                    <p>Notification</p>
                </div>
                <div style=" padding-bottom: 20px;">
                </div>
            </div>

            <div class="grid">
                <div class="defaultbg list" id="left_pannel"> <!-- most booked facilities-->
                    <p class="topic">
                        Most Booked Facilities
                    </p>
                    <div>
                        <!-- incluse the most booked facilities-->
                       <p>Facility 1</p>
                        <p>Facility 2</p>
                        <p>Facility 3</p>
                    </div>      
                </div>

                <div class="defaultbg list" id="right_pannel"> <!-- top customers-->
                    <p class="topic">
                        Most Booked Facilities
                    </p>
                    <div>
                        <!-- incluse the top customers-->
                        <p>Customer 1</p>
                        <p>Customer 2</p>
                        <p>Customer 3</p>
                    </div> 
                </div>
            </div>
            <div class="reoprt"><!--for the 4 squares with the reports-->
                <div class="single_report" style="float: left;">
                    report1
                </div>
                <div class="single_report">
                    report2
                </div>
                <div class="single_report">
                    report3
                </div>
                <div class="single_report">
                    report4
                </div>
            </div>
        </div>
    </body>
</html>