<!DOCTYPE html>
<html>

<head>
    <title>Shifts</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/modal.css">

    <style>
        .home-section .home-content {
            padding-top: 8%;
            position: relative;
        }

        .pgrid-container1 {
            display: grid;
            width: 95%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 3%;
            margin-bottom: 1%;
            margin-left: 2%;
            margin-right: 3%;
            border-radius: 5px;     
            padding: 10px;
        }
        
        td {
            vertical-align: middle;
        }

        .c1{
            width: 9%;
            padding: 5px;
            background-color: #0f305b;
            color: #cccccc;
            font-weight: bold;
            border-radius: 3px;
        }
        .c2{
            width: 13%;
            text-align: center;
            background-color: #e6e5e5;
        }
        .c3{
            width: 13%;
            font-size: 13px;
            font-weight: bold;
        }
        .hc2{
            width: 13%;
            font-size: 14px;
            color: #0f305b;
            font-weight: bold;
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
                        <li class="breadcrumb-item" style="color:#fff;">Personal Shift /</li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="home-content">
            <div class="grid-container">
                <div class="table_topic">
                    &nbsp;&nbsp;<h2>Bi-Weekly Schedule </h2>
                </div>
            </div>
            <div class="pgrid-container1">
                <table>

                    <tr style="height: 30px;">
                        <td class="c1h"></td>
                        <td class="hc2">Monday</td> 
                        <td class="hc2">Tuesday</td>
                        <td class="hc2">Wednesday</td>                       
                        <td class="hc2">Thursday</td>                      
                        <td class="hc2">Friday</td>                      
                        <td class="hc2">Saturday</td>                       
                        <td class="hc2">Sunday</td>
                        
                    </tr>
                    <tr style="height: 10px;">
                        <td class="c1h"></td>
                        <td class="c3">2022-03-22</td>
                        <td class="c3">2022-03-22</td>
                        <td class="c3">2022-03-22</td>                      
                        <td class="c3">2022-03-22</td>                      
                        <td class="c3">2022-03-22</td>                     
                        <td class="c3">2022-03-22</td>                     
                        <td class="c3">2022-03-22</td>
                        
                    </tr>
                    <tr style="height: 80px;">
                        <td class="c1" style="border-top: 1px solid #cccccc;border-bottom: 1px solid #cccccc;">Morning Shift</td>
                        <td class="c2"  style="background-color: green; color:#fff;">Scheduled</td>
                        <td class="c2"></td>
                        <td class="c2"></td>
                        <td class="c2"  style="background-color: green; color:#fff;">Scheduled</td>
                        <td class="c2"  style="background-color: red; color:#fff;">On Leave</td>
                        <td class="c2"></td>
                        <td class="c2"></td>
                    </tr>
                    <tr style="height: 80px;">
                        <td class="c1" style="border-top: 1px solid #cccccc;border-bottom: 1px solid #cccccc;">Evening Shift</td>
                        <td class="c2"></td>
                        <td class="c2"></td>
                        <td class="c2"  style="background-color: green; color:#fff;">Scheduled</td>
                        <td class="c2"></td>
                        <td class="c2"  style="background-color: red; color:#fff;">On Leave</td>
                        <td class="c2"></td>
                        <td class="c2"  style="background-color: green; color:#fff;">Scheduled</td>
                    </tr>
                </table>
            </div>

            <div class="pgrid-container1">
                <table>

                    <tr style="height: 30px;">
                        <td class="c1h"></td>
                        <td class="hc2">Monday</td> 
                        <td class="hc2">Tuesday</td>
                        <td class="hc2">Wednesday</td>                       
                        <td class="hc2">Thursday</td>                      
                        <td class="hc2">Friday</td>                      
                        <td class="hc2">Saturday</td>                       
                        <td class="hc2">Sunday</td>
                        
                    </tr>
                    <tr style="height: 10px;">
                        <td class="c1h"></td>
                        <td class="c3">2022-03-22</td>
                        <td class="c3">2022-03-22</td>
                        <td class="c3">2022-03-22</td>                      
                        <td class="c3">2022-03-22</td>                      
                        <td class="c3">2022-03-22</td>                     
                        <td class="c3">2022-03-22</td>                     
                        <td class="c3">2022-03-22</td>
                        
                    </tr>
                    <tr style="height: 80px;">
                        <td class="c1" style="border-top: 1px solid #cccccc;border-bottom: 1px solid #cccccc;">Morning Shift</td>
                        <td class="c2"  style="background-color: green; color:#fff;">Scheduled</td>
                        <td class="c2" ></td>
                        <td class="c2"></td>
                        <td class="c2"  style="background-color: green; color:#fff;">Scheduled</td>
                        <td class="c2"  style="background-color: red; color:#fff;">On Leave</td>
                        <td class="c2"></td>
                        <td class="c2"></td>
                    </tr>
                    <tr style="height: 80px;">
                        <td class="c1" style="border-top: 1px solid #cccccc;border-bottom: 1px solid #cccccc;">Evening Shift</td>
                        <td class="c2"></td>
                        <td class="c2"></td>
                        <td class="c2"  style="background-color: green; color:#fff;">Scheduled</td>
                        <td class="c2"></td>
                        <td class="c2"  style="background-color: red; color:#fff;">On Leave</td>
                        <td class="c2"></td>
                        <td class="c2"  style="background-color: green; color:#fff;">Scheduled</td>
                    </tr>
                </table>
            </div>

            
        </div>
    </section>
</body>

</html>