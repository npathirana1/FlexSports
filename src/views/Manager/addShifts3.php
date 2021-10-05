<!DOCTYPE html>
<html>
    <head>
        <title>
            Add Shift
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/pagesetup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTables.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .form_title{
                color:#0F305B;
            }
            .table_view {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                min-width: 400px;
                border-radius: 5px 5px 0 0;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }
        </style>
        
    </head>
    <body>
        <?php 
            include "managerIncludes/ManagerNavigation.php"; 
        ?>
        <section class="home-section">
            
            <span onclick="goBack()" style="float: right;" class="go_back">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </span>

            <h2 class="form_title">Add Shift</h2>
            
                <form method="post" class="form_box">
                    <label>
                        Date
                    </label>
                    <input type="date" name="date">
                    <br/>
                    <label>
                        Time
                    </label>
                    <select name="shift">
                        <option value="morning">Morning</option>
                        <option value="evening">Evening</option>
                    </select>
                    <br/>
                    <label>
                        Employee
                    </label>
                    <input type="int" name="empid">
                    <br/>
                    <div style="text-align:center;">
                        <button type="submit" class="submit_btn">
                                Submit
                        </button>
                    </div>    
                </form>
            
            <h2 class="form_title">Available Employees</h2>
            <center>
                <table class="table_view">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Domenic</td>

                        <tr>
                            <td>2</td>
                            <td>Sally</td>

                        </tr>
                    </tbody>
                </table> 
            </center>

        </section>

        <script>
            function goBack() {
                window.history.back();
            }
        </script> 
    </body>
</html>