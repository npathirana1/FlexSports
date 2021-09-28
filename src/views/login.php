<!DOCTYPE html>
<html>
<head>
 <title>Login</title>
 <link rel="icon" href="../assets/images/icon.css" type="image/ico">
 <link rel="stylesheet" href="../assets/CSS/forms.css" type="text/css">
</head>
<body>
<center>
<div class="form_box">  
<form action="login.php" method="post">
    <div class="form_body">
        <p class="form_title"> Sign in  </p>
        <p style="color:#FEFDFB;">Please fill in your credentials to log in.</p>
        <hr> 
        <input type="text" placeholder="Enter Email" name="Email" id="email" required>

        <input type="password" placeholder="Enter Password" name="UserPsword" id="UserPassword" required>

        <hr>
        <input type="submit" class="form_btn" name="login-submit">
    
  </div>
  
  <div class="container signin">
    <p>Don't have an account? <a href="#">Sign up</a>.</p>
  </div>
</form>
</div>
</center>
</body>
</html>