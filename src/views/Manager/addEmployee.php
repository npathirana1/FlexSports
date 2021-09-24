<!DOCTYPE html>
<html>
    <head>
        <title>
            Add Employee
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/style.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/home.css">
        
        <style>
            .form_box { 
                padding-top: 20px;
                padding-left: 20px;
            }
            input[type=date], input[type=tel],input[type=email] {
                width:70%;
                padding: 10px;
                margin: 5px 0 22px 0;
                border: none;
                border-radius: 7px;
                background: #f1f1f1;
            }
        </style>
    </head>
    <body>           
            <div class="main">
                <form class="form_body" method="post">
                    <div class="form_box">
                        <p class="form_title">Add Employee</p>
                        <label>
                            NIC
                        </label>
                        <input type="text" name="nic">
                        <br/>
                        <label>
                            First Name
                        </label>
                        <input type="text" name="fname">
                        <br/>
                        <label>
                            Last Name
                        </label>
                        <input type="text" name="lname">
                        <br/>
                        <label>
                            Date of Birth
                        </label>
                        <input type="date" name="DOB">
                        <br/>
                        <label>
                            Gender
                        </label>
                        <input type="radio" name="gender" value="male"> <label>Male</label>
                        <input type="radio" name="gender" value="female"> <label>Female</label>
                        <br/><br/>
                        <label>
                            Address
                        </label>
                        <input type="text" name="address">
                        <br/>
                        <label>
                            Contact No.
                        </label>
                        <input type="tel" name="contactNo">
                        <br/>
                        <label>
                            Email
                        </label>
                        <input type="email" name="email">
                        <br/>
                        <div style="text-align:center;">
                            <button type="submit" class="submit_btn">
                            Create
                            </button>
                        </div> 
                    </div>
                    
                </form>
            </div>
            <div class="navigation_pannel">
                <?php require 'managerIncludes/ManagerNavigation.php'; ?>
            </div>      
    </body>
</html>