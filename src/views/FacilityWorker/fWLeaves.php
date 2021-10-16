<!DOCTYPE html>
<html>
  <head>
    <title>My Leaves</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/fWLeaves.css">
   <style>

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

.home-section {
            position: relative;
            width: calc(100% - 340px);
            left: 340px;
            transition: all 0.5s ease;
            padding-top: 50px;
        }

.home-section .home-content {
    position: relative;
    padding-top: 104px;
    width: 1000px;
    padding-left: 0px;
    padding-right: 20px;
}

.home-content .overview-boxes {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 20px;
    float: left;
    margin-bottom: 26px;
}

.overview-boxes .box {
    display: flex;
    align-items: center;
    justify-content: center;
    width: calc(100% / 3 - 25px);
    height: 150px;
    background: #fff;
    padding: 15px 14px;
    border-radius: 12px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    margin-left: 0%;
}

.overview-boxes .box-topic {
    font-size: 20px;
    font-weight: 500;
}

.home-content .box .number {
    display: inline-block;
    font-size: 35px;
    margin-top: -6px;
    font-weight: 500;
}

.home-content .box .indicator {
    display: flex;
    align-items: center;
}

.home-content .box .indicator i {
    height: 20px;
    width: 20px;
    background: #8FDACB;
    line-height: 20px;
    text-align: center;
    border-radius: 50%;
    color: #fff;
    font-size: 20px;
    margin-right: 5px;
}

.box .indicator i.down {
    background: #e87d88;
}

.home-content .box .indicator .text {
    font-size: 12px;
}

.topic {
    color: #0F305B;
    transform: translate(-5%, -30%);
    
}

.table_topic2 {
    transform: translate(-4%, 10%);
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
    display: inline;
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
                    <li class="breadcrumb-item"><a href="../../views/FacilityWorker/profile.php">My Profile</a></li>                  
                    <li class="breadcrumb-item">My Leaves</li>
                    
                    </ul> 
                </div>

            </div>
        </nav>

<div class="home-content">
<div class="header">
        <div class="topic"><h2>My Leaves</h2></div>

          <div class="overview-boxes">
          <div class="box">
          <div class="right-side">
          <div class="box-topic">Casual Leaves available for this month</div>
              <div class="number">02</div>
              <div class="indicator">
                <i class='bx bx-down-arrow-alt down'></i>
                <span class="text">Only 05 left for this year </span>
              </div>
            </div>
            <i class='bx bxs-cart-alt cart reservation'></i>
        </div>
        <div class="box">
          <div class="right-side">
          <div class="box-topic">Annual Leaves available for this month</div>
              <div class="number">14</div>
              <div class="indicator">
                <i class='bx bx-down-arrow-alt down'></i>
                <span class="text">Only 14 left for this Year </span>
              </div>
            </div>
            <i class='bx bxs-user-plus cart user'></i>
        </div>
        <div class="box">
          <div class="right-side">
          <div class="box-topic">Total leaves available for this Year</div>
              <div class="number">19</div>
              
            </div>
            <i class='bx bx-money cart revenue'></i>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div class="table_topic2"><h3 style="color: #0F305B;">Applied Leaves</h3></div>
        <div class="box-2" style="float: right;"><button class="button leave" onClick="window.location.href='../../views/FacilityWorker/fWLeaveReqForm.php';"
                    style="margin-right:30px;" >Apply for leave</button></div>
        </div>
        </br>
        <div class="tab">
            <button class="tablinks" onclick="openTable(event, 'Pending')" id="defaultOpen">Pending Leave</button>
            <button class="tablinks" onclick="openTable(event, 'Approved')">Approved Leave</button>
            <button class="tablinks" onclick="openTable(event, 'Rejected')">Rejected Leave</button>

        </div>
        <div id="Pending" class="tabcontent">

            <table class="table_view">
                <thead>
                    <tr>
                        <th>Leave date</th>
                        <th>Requested date</th>
                        <th>Leave type</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Update</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>4/2/2020</td>
                        <td>2/2/2020</td>
                        <td>Full day</td>
                        <td>Blah blah blah</td>
                        <td>Pending</td>
                        <td><button class="button update" onClick="window.location.href='../../views/FacilityWorker/fWEditLeaveReq.php';"> Update</button></td>
                        <td><button class="button remove">Delete</button></td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div id="Approved" class="tabcontent">

            <table class="table_view">
                <thead>
                    <tr>
                        <th>Leave date</th>
                        <th>Requested date</th>
                        <th>Leave type</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>4/2/2020</td>
                        <td>2/2/2020</td>
                        <td>Full day</td>
                        <td>Blah blah blah</td>
                        <td>Approved</td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div id="Rejected" class="tabcontent">

            <table class="table_view">
                <thead>
                    <tr>
                        <th>Leave date</th>
                        <th>Requested date</th>
                        <th>Leave type</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Rejected reason</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>4/2/2020</td>
                        <td>2/2/2020</td>
                        <td>Full day</td>
                        <td>Blah blah blah</td>
                        <td>Rejected</td>
                        <td>No more leaves</td>
                    </tr>

                </tbody>
            </table>
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