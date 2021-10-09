<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="../../assets/CSS/leave.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">


    <title>Leave Status</title>

    <style>
        .leave {
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
    </style>

</head>

<body>

    <?php include "./receptionistIncludes/receptionistNavigation.php"; ?>
    <section class="home-section">
        <div class="header"></br></br></br>
        <div class="box-1 table_topic"><h2>Applied Leave</h2></div>
        <div class="box-2" style="float: right;"><button class="button leave" onClick="window.location.href='leaveForm.php';" style="padding:10px;">Apply for leave</button></div>
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
                        <td><button class="button update">Update</button></td>
                        <td><button class="button remove">Delete</button></td>
                    </tr>
                    <tr>
                        <td>4/2/2020</td>
                        <td>2/2/2020</td>
                        <td>Full day</td>
                        <td>Blah blah blah</td>
                        <td>Pending</td>
                        <td><button class="button update">Update</button></td>
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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>4/2/2020</td>
                        <td>2/2/2020</td>
                        <td>Full day</td>
                        <td>Blah blah blah</td>
                        <td>Rejected</td>
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