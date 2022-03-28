<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "flexsports");  
 if(isset($_POST["customer_id"]))  
 {  
      $query = "SELECT * FROM customer WHERE CustomerID = '".$_POST["customer_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>