<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "flexsports");  
 if(isset($_POST["res_id"]))  
 {  
      $query = "SELECT * FROM reservation WHERE ReservationNo = '".$_POST["res_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>