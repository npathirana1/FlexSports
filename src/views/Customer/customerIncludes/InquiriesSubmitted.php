
<?php
session_start();
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "flexsports"; 

$conn = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inquiries</title>
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTablesCustomer.css">
    <link rel="stylesheet" type="text/css" href="../../assets/CSS/InquiriesSubmitted.css">

</head> 

<body>

  

    <section class="home-section-table">
        

       
       

        <table style="width:90%;" class="table_view">
            <thead>
                <tr>
                    <th>Sender Name</th>
                    <th>Sender Email</th>
                    <th>Inquiry</th>
                    <th>Response</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>




           





            <?php 

                    $viewCustomer = "SELECT * FROM inquiry";
                    $cResult = mysqli_query($conn, $viewCustomer);
                    while ($row = mysqli_fetch_assoc($cResult)) { ?>
                        <tr>
                            <td><?php echo $row["SenderName"]; ?></td>
                            <td><?php echo $row["SenderEmail"] ;?></td>
                            <td><?php echo $row["Description"]; ?></td>
                            <td><?php echo $row["Reply"]; ?></td>
                            <td><?php // echo $row["Email"]; ?></td>
                        </tr>
                    <?php } ?>


 
 </tbody></table>
              
    </section>

    

</body>



</html>