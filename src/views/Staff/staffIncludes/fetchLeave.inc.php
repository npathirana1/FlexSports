<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "flexsports");  
 if(isset($_POST["leave_id"]))  
 {  
      $query = "SELECT * FROM leave_request WHERE LeaveNo = '".$_POST["leave_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>