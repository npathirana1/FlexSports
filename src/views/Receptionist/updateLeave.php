<!doctype html>
<html lang="en">

<head>
    <title>Request Leave</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/updateLeaveRequest.css">

</head>

<body>
    <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>
    <section class="home-section">

        <nav class="breadcrumb-nav">
            <div class="top-breadcrumb">
                <div>
                    <ul class="breadcrumb">

                        <li class="breadcrumb-item">My Profile</li>
                        <li class="breadcrumb-item"><a href="../../views/FacilityWorker/fWLeaves.php">My Leaves</a></li>
                        <li class="breadcrumb-item"><a href="../../views/FacilityWorker/fWEditLeaveReq.php">Edit Requested Leaves</a></li>


                    </ul>
                </div>

            </div>
        </nav>

        <!--div class="back_button">
                <button class="btn-back" onClick="window.location.href='recLeave.php';">&laquo; Go to existing leave</button>
            </div-->
        </br></br>
        <form action="" method="post" class="signup-form">

            <div class="form-header">
                <h1 class="form_title"> Edit Requested leaves</h1>
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

                <br><br>

            </div>

            <div class="form-footer">
                <center>
                    <button type="submit" name="submit" class="btn btn-primary form_btn">Update</button>
                </center>
            </div>

        </form>
    </section>
</body>

</html>