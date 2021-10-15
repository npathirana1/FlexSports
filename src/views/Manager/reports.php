<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reports</title>
    <script type="text/javascript" src="../../assets/JS/Script1.js"></script>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .form_title {
            color: #0F305B;
        }

        select {
            height: 2%;
            width: 50%;
            font-size: 18px;
        }

        #report {
            height: 40px;
            width: 50%;
            font-size: 18px;
            background-color: #0F305B;
            color: #f1f1ff;
            text-align: center;
            border: none;
        }

        #report a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            color: inherit;
        }
    </style>

</head>

<body>

    <?php include "managerIncludes/managerNavigation.php"; ?>

    <section class="home-section">
        <span onclick="goBack()" style="float: right;" class="go_back">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </span>
        <h2 class="form_title">Reports</h2>
        <div class="left">
            <div class="unit">
                <div class="topic">This weeks reservations</div>
                <div class="number">16</div>


            </div>
            <br>
            <div class="unit">
                <div class="topic">New customer registrations</div>
                <div class="number">3</div>
                <!--div class="icon">
                    <i class="bx bxs-group symbol"  ></i>
                </div-->
            </div>
            <br>
            <div class="unit">
                <div class="topic">Revenue for the past month</div>
                <div class="number">LKR 12,870</div>
            </div>

        </div>
        <div class="right">
            <div>
                <select>
                    <option name="Reservation" value="reservation">Reservations</option>
                    <option name="Customers" value="customers">Customers</option>
                    <option name="Revenue" value="revenue">Revenue</option>
                </select>
                <select placeholder="Select month">
                    <option name="" value="" style="display:none;">Select Month</option>
                    <option name="January" value="Jan">January</option>
                    <option name="February" value="Feb">February</option>
                    <option name="March" value="Mar">March</option>
                    <option name="April" value="Apr">April</option>
                    <option name="May" value="May">May</option>
                    <option name="June" value="Jun">June</option>
                    <option name="July" value="Jul">July</option>
                    <option name="August" value="Aug">August</option>
                    <option name="September" value="Sep">September</option>
                    <option name="October" value="Oct">October</option>
                    <option name="November" value="Nov">November</option>
                    <option name="December" value="Dec">December</option>
                </select>
                <button type="submit" id="report">
                    <a href="#report" download><i class='bx bxs-arrow-to-bottom' style="color: #f1f1f1"></i> Generate Report
                    </a></button>
            </div>
        </div>
    </section>

</html>