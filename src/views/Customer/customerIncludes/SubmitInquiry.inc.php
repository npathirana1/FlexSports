<?php

$link = mysqli_connect("localhost", "root", "", "FlexSports");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['SenderName']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['SenderEmail']);
$email = mysqli_real_escape_string($link, $_REQUEST['InquiryType']);
$Description= mysqli_real_escape_string($link, $_REQUEST['Description']);
// Attempt insert query execution
$sql = "INSERT INTO Inquiry (SenderName, SenderEmail, InquiryType, Description) VALUES ('$first_name', '$last_name', '$email','$Description')";
if(mysqli_query($link, $sql)){
    echo "<script>
    alert('Inquiry successfully submitted');
    window.location.href='../CustomerInquiries.php';
</script>";

} else{
    // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>