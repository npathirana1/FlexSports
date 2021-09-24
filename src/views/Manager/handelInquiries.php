<!DOCTYPE html>
<html>
    <head>
        <title>
            Update Employee
        </title>
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/style.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/home.css">
        <style>
            .form_box { 
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
        <div class="main" >
            <form class="form_body" method="post">
                <div class="form_box">
                    <p class="form_title">Inquiry</p>
                    <label>
                        Name
                    </label>
                    <input type="text" name="name">
                    <br/>
                    <label>
                        Email
                    </label>
                    <input type="text" name="email">
                    <br/>
                    <label>
                        Inquiry
                    </label>
                    <input type="text" name="Inquiry">
                    <br/>
                    <label>
                        Reply
                    </label>
                    <input type="text" name="Reply">
                    <br/>
                    <div style="text-align:center;">
                        <button type="submit" class="submit_btn">
                            Send
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