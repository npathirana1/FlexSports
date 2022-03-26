<?php
include "../../../config/db.php";

$null='';

if (isset($_POST['submit-inquiry'])) {
    $Name = $_POST['SenderName'];
    $Email = $_POST['SenderEmail'];
    $Type = $_POST['InquiryType'];
    $Description = $_POST['Description'];
   

    if (isset($_SESSION['customerID'])) {
        $userEmail = $_SESSION['customerID'];

        $sql1 = "SELECT * from customer where Email ='" . $userEmail . "' ";

        $result = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result);
        $userID = $row1['CustomerID'];
        
        $date=date("Y-m-d");

        $sql2 = "INSERT INTO inquiry (SenderName, SenderEmail, InquiryType, Description, CustomerID,date) VALUES ('$Name', '$Email', '$Type','$Description','$userID','$date')";
        if (mysqli_query($conn, $sql2)) {
            echo "<script>
                alert('Inquiry successfully submitted');
                window.location.href='../CustomerInquiries.php';
            </script>";
        }
    } else {

        $date=date("Y-m-d");

        $sql3 = "INSERT INTO inquiry (SenderName, SenderEmail, InquiryType, Description, date) VALUES ('$Name', '$Email', '$Type','$Description','$date')";
   
        if (mysqli_query($conn, $sql3)) {
            echo "<script>
                alert('Inquiry successfully submitted');
                window.location.href='../../Website/contactus.php';
            </script>";
        }
     }
}
