<?php include "./customerIncludes/navbar1.php"?>
<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['customerID'])) {
  $userEmail=$_SESSION['customerID'];

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <link rel="stylesheet" type="text/css" href="../../assets/CSS/forms.css"> -->
  <link rel="stylesheet" type="text/css" href="../../assets/CSS/SubmitInquiry.css">
  <!-- <link rel="stylesheet" type="text/css" href="../../assets/CSS/nav.css"> -->
  <style>.circle {
    position: absolute;
    top: 100;
    left: 0;
    width: 100%;
    height: 100%;
    background: #8ab9ff;
    clip-path: circle(600px at right 800px);
}
.content .imgBox {
    width: 600px;
    display: flex;
    justify-content: flex-end;
    padding-right: 50px;
    margin-top: 50px;
   
}

.content .imgBox img {
    max-width: 340px;
}
.flexsports {
    /* mix-blend-mode: multiply; */
    overflow: hidden;
    border-radius: 60%;
}
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    height: 100vh;
    width: 100%;
}

h1{
    font-family: sans-serif;
    text-align: center;
    font-size: 30px;
    color: #222;
}

.profile-pic-div{
    height: 200px;
    width: 200px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    border-radius: 50%;
    overflow: hidden;
    border: 1px solid grey;
}

#photo{
    height: 100%;
    width: 100%;
}

#file{
    display: none;
}

#uploadBtn{
    height: 40px;
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    background: rgba(0, 0, 0, 0.7);
    color: wheat;
    line-height: 30px;
    font-family: sans-serif;
    font-size: 15px;
    cursor: pointer;
    display: none;
}
</style>

  
</head>

<body>
  
<!-- <div class="circle"></div> -->
  <section style="margin-top: 300px; margin-left:-580px;" class="home-section">
  

  
    </br></br></br></br>
    <form  action="#" method="post" style="min-height: 670px; margin-left:300px;min-width:400px; min-width: 550px;" class="signup-form">
    

      <div class="form-header">
        <h1 class="form_title">Update Profile Details</h1>
      </div>

      <div style="margin-top:-170px; margin-left:774px;" class="profile-pic-div">
  <img src="../../assets/Images/updateprofile.png" id="photo">
  <input type="file" id="file">
  <label for="file" id="uploadBtn">Choose Photo</label>
</div>

<script>

const imgDiv = document.querySelector('.profile-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');



imgDiv.addEventListener('mouseenter', function(){
    uploadBtn.style.display = "block";
});



imgDiv.addEventListener('mouseleave', function(){
    uploadBtn.style.display = "none";
});



file.addEventListener('change', function(){
    
    const choosedFile = this.files[0];

    if (choosedFile) {

        const reader = new FileReader(); 

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);

       
    }
});</script>
 
     <div style="height: 600px;" class="form-body">
        <div class="horizontal-group">
        <div class="form-group">
            <label for="">NIC</label> : 991162780V
          </div> <br>
         <div class="form-group">
            <label for="">Email</label> 
            <input type="text" placeholder="Ashanegunarathne@gmail.com" name="Email" class="form-control">
          </div>  
          <div class="form-group left">
            <label for="">First Name</label>
            <input type="text" placeholder="Ashane" name="FName" class="form-control">
          </div>
          <div class="form-group right">
            <label for="">Last Name</label>
            <input type="text" placeholder="Gunarathne" name="LName" class="form-control">
          </div>
        <div class="form-group">
          <label for="">Mobile Number</label>
          <input type="text" placeholder="0774145153" name="TelephoneNo" class="form-control">
        </div>
        <!-- <div class="form-group">
          <label for="">Password</label>
          <input type="password" placeholder="********" name="UserPsword" class="form-control">
        </div> -->
        
        
</div> 
<br> <br>
        
        
        </div>
      </div>
      

      <div style="margin-top: -70px;" class="form-footer">
        <button type="submit" name="submit" class="btn btn-primary form_btn">Update</button>
      </div>

    </form>
    <div style="margin-left: 10px;" class="imgBox">
                <img src="../../assets/Images/updateprofile.png" class="flexsports" >
            </div>





  </section>
</body>

</html>
<?php
}else {
  header('Location: ../login.php');
}

?>