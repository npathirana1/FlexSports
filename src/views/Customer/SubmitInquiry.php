
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../../../assets/CSS/forms.css">
  <link rel="stylesheet" type="text/css" href="../../../assets/CSS/SubmitInquiry.css">
  
</head>

<body>
  

  <section class="home-section">

    
    </br></br></br></br>
    <form action="../SubmitInquiry.inc.php" method="post" class="signup-form">

      <div class="form-header">
        <h1 class="form_title">Make an inquiry</h1>
      </div>

      <div class="form-body">
        <div class="horizontal-group">
          <div class="form-group">
            <label for=""></label>
            <input type="text" placeholder="Enter Name" name="SenderName" class="form-control">
          </div>
        <div class="form-group">
          <label for=""></label>
          <input type="text" placeholder="Enter Email" name="SenderEmail" class="form-control">
        </div>
        <div class="form-group">
          <label for=""></label>
          <input type="radio" id="General" name="InquiryType" value="General">
          <label for="General">General</label>
          <div class="form-group right">
          <input type="radio" id="Managerial" name="InquiryType" value="Managerial">
         <label for="Managerial">Managerial</label>
</div> 
<br> <br>
        <div class="form-group">
          <label for=""></label>
          <textarea placeholder="Enter inquiry" cols="50" rows="7" name="Description" class="form-control"></textarea>
        </div>
        
        </div>
      </div>
      

      <div class="form-footer">
        <button type="submit" name="submit" class="btn btn-primary form_btn">submit</button>
      </div>

    </form>





  </section>
</body>

</html>