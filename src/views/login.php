<html>

<head>
  <meta charset="utf-8">
  <title>Sign in</title>
  <link rel="stylesheet" type="text/css" href="../assets/CSS/login.css">
</head>
<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-shapes">
          <!--The background shapes-->
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--cyan" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <!--Form placement-->
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1>FlexSports</h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Sign in to your account</span>
              <!--Sign in form-->
              <form action="../config/login.inc.php" method="post">
                <div class="form_body">
                  <p style="color:#0F305B;">Please fill in your credentials to log in.</p>
                  <input type="text" placeholder="Enter Email" name="Email" id="email" required>
                  <input type="password" placeholder="Enter Password" name="UserPsword" id="UserPassword" required>
                  <div class="reset-pass">
                    <a href="forgotPassword.php">Forgot your password?</a>
                  </div>
                  <div>
                    <input type="submit" name="login-submit" class="btn btn-primary form_btn" value="Log In">
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>Don't have an account? <a href="../views/Customer/registration.php">Sign up</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="#">© FlexSports</a></span>
              <span><a href="#">Contact</a></span>
              <span><a href="#">Privacy & terms</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>