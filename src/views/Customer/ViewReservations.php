<?php include "./customerIncludes/navbar1.php"?>
<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="../../assets/CSS/CustRes.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTablesCustomer.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/indexstyle.css">
    
    


    <title>Reservations</title>

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
        .back_button {
    float: left;
    margin-left: 100px;
    min-width: 250px;
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
.item1 { grid-area: header;
        margin-left: -150px;
        
        margin-top: -5px ;
    min-width: 1500px; }
.item2 { grid-area: menu;
    margin-left: -300px;
margin-top: 150px; }
.item3 { grid-area: main;
margin-bottom: 400px;
margin-left: -300px; }
.item4 { grid-area: right; }


.grid-container {
  display: grid;
  grid-template-areas:
    'header header header header header header'
    'menu main main main right right'
    'menu footer footer footer footer footer';
  grid-gap: 0px;

  
}

.grid-container > div {
  

  padding: none;
  
}
.top
{
    color: #17335C;
    font-size: 80px;
    font-weight: 900;
}
.topic{margin-left: 100px;
    font-size: 40px;}
    </style>

</head>

<body>
    
<div class="topic"><h2> Your<div class="top"> Reservations</div></h2></div>   
<div style="margin-top:-10px; " class="item2">
    <section class="home-section">
        <div class="header"></br></br></br>
       
        
        </div>
        </br>
        <div class="tab">
            <button class="tablinks" onclick="openTable(event, 'Upcoming')" id="defaultOpen">Upcoming</button>
            <button class="tablinks" onclick="openTable(event, 'Past')">Past</button>
           
        </div>
        <div id="Upcoming" class="tabcontent">

            <table class="table_view">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Facility</th>
                        <th>Email</th>
                        
                        <th>Update</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>4/2/2022</td>
                        <td>2.00 pm - 3.00 pm</td>
                        <td>Basketball</td>
                        <td>Damitha@gmail.com</td>
                        
                        <td><button class="button update">Update</button></td>
                        <td><button class="button remove">Cancel</button></td>
                    </tr>
                    <tr>
                        <td>23/05/2022</td>
                        <td>7.00 am - 8.00 pm</td>
                        <td>Volleyball</td>
                        <td>Sandali@gmail.com</td>
                       
                        <td><button class="button update">Update</button></td>
                        <td><button class="button remove">Cancel</button></td>
                    </tr>
                    
                    
                </tbody>
            </table>
        </div>

        <div id="Past" class="tabcontent">

            <table class="table_view">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Facility</th>
                        <th>Email</th>
                        <th>clear</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>4/2/2020</td>
                        <td>4.00 pm - 5.00 pm</td>
                        <td>Billiard</td>
                        <td>Ashane@gmail.com</td>
                        <td><button class="button remove">Clear</button></td>
                    </tr>

                </tbody>
            </table>
        </div>
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