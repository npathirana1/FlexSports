<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "flexsports");  
 if(isset($_POST["shift_id"]))  
 {  
      $query = "SELECT * FROM emp_shift WHERE ShiftNo  = '".$_POST["shift_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>