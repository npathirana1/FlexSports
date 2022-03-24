<?php
//fetch.php  
$connect = mysqli_connect("localhost", "root", "", "flexsports");
//include "../../config/db.php";
if (isset($_POST["user_id"])) {
    // $ID='39';
    // echo $_POST["user_id"];
    $Tablequery = "SELECT * FROM user_login WHERE ID = '" . $_POST["user_id"] . "'";
    $Tableresult = mysqli_query($connect, $Tablequery);
    $Tablerow = mysqli_fetch_array($Tableresult);
     $UserType=$Tablerow['UserType'];
     if ($UserType == 'manager') {
         $TableName = "manager_staff";
     } elseif ($UserType == 'receptionist') {
         $TableName = "receptionist_staff";
     } elseif ($UserType == 'facilityworker') {
         $TableName = "facility_staff";
     }
     //echo $UserType;
     $query = "SELECT * FROM $TableName WHERE EmpID = '" . $_POST["user_id"] . "'";
     $result = mysqli_query($connect, $query);
     $row = mysqli_fetch_array($result);
    echo json_encode($Tablerow);
}
