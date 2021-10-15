<!doctype html>
<html lang="en">

<head>
    <title>Request Leave</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: 700;
        }

        * {
            box-sizing: border-box;
        }

        .table_topic {
            text-align: left;
        }

        .form_box {
            margin-top: 30px;
            margin-left: 350px;
            position: relative;
            background: #0F305B;
            border-radius: 18px;
            align-items: center;
            width: 500px;
            padding-bottom: 20px;
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

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        .form_btn {
            background-color: #FEFDFB;
            color: #000000;
            border-radius: 18px;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: large;
            font-weight: 600;
        }

        .form_btn:hover {
            opacity: 1;
        }

        a {
            color: #ffb3b3;
        }

        .signin {
            background-color: #0F305B;
            text-align: center;
            color: #D5D5D5;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: 700;
        }

        * {
            box-sizing: border-box;
        }

        .home-section {
            position: relative;
            width: calc(100% - 340px);
            left: 340px;
            transition: all 0.5s ease;
            padding-top: 50px;
        }

        .signup-form {
            width: 500px;
            margin-left: 220px;
            border-radius: 12px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .form-body {
            padding: 10px 40px;
            color: #666;
        }

        .form-header {
            background-color: #0F305B;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin-top: 40px;
        }

        .form-header h1 {
            font-size: 30px;
            text-align: center;
            color: #dfdfdf;
            padding: 20px 0;
            border-bottom: 1px solid #cccccc;
        }

        .form-footer {
            background-color: #0F305B;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            padding: 10px 15px;
            text-align: right;
            border-top: 1px solid #cccccc;
            clear: both;
        }

        .form-group {
            padding-top: 30px;

        }

        .form-group-left {
            margin-top: 20px;

        }

        input[type=date] {
            font-size: 13px;
            background: #FEFDFB;
            padding: 10px;
            border-radius: 9px;
            font-family: sans-serif;

        }

        input[type=text] {
            width: 100%;
            padding: 10px;

            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus {
            background-color: #ddd;
            outline: none;
        }

        .form_btn {
            background-color: #FEFDFB;
            color: #000000;
            border-radius: 18px;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: large;
            font-weight: 600;
        }

        .radio-btn {
            padding-top: 30px;

        }

        .form_btn:hover {
            opacity: 1;
        }

        .back_button {
            float: left;
            margin-left: 3 0px;
        }

        .btn-back {
            background-color: #0F305B;
            color: white;
            border-radius: 4px;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 4px 2px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-back:hover {
            background-color: #355a8b;
            color: white;
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



        .home-section .content {
            padding-top: 3%;
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
                        <li class="breadcrumb-item">My Profile</li>
                        <li class="breadcrumb-item"><a href="recLeave.php" >Applied Leave</a></li>
                        <li class="breadcrumb-item"><a href="leaveForm.php" style="color: #42ecf5;">Apply for leave</a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="content">
            
            </br></br>
            <form action="" method="post" class="signup-form">

                <div class="form-header">
                    <h1 class="form_title"> Apply for leave</h1>
                </div>

                <div class="form-body">
                    <div class="form-group-left">
                        <label for="ldate">Leave Date</label>
                        <input type="date" id="ldate" name="ldate" value="" style="height:35px; width:300px;">
                    </div>

                    <div class="radio-btn">
                        <label for="ltype">Leave Type</label>&nbsp; &nbsp; &nbsp;
                        <input type="radio" id="ltype1" name="type" value="Full Day">
                          <label for="ltype1">Full Day</label>
                        <input type="radio" id="ltype2" name="type" value="Half Day">
                          <label for="ltype2">Half Day</label>
                    </div>

                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" placeholder="Reason for leave" name="leavReason" class="form-control">
                    </div>

                </div>

                <div class="form-footer">
                    <center>
                        <button type="submit" name="submit" class="btn btn-primary form_btn">Apply for leave</button>
                    </center>
                </div>

            </form>

        </div>
    </section>
</body>

</html>