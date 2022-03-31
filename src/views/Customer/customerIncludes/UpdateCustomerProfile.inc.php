<?php
include "../../../config/db.php";

if (isset($_POST['submit'])) {
    $FName = $_POST['FName'];
    $LName = $_POST['LName'];
    $TelephoneNo = $_POST['TelephoneNo'];
    $UserPsword = $_POST['UserPsword'];
    $OldPsword = $_POST['OldPsword'];
  

    if (isset($_SESSION['customerID'])) {
        $userEmail = $_SESSION['customerID'];

        $sql1 = "SELECT * from customer where Email ='" . $userEmail . "' ";

        $result = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result);
        $old = $row1['UserPsword'];

        $oldhashedPwd = password_hash($OldPsword, PASSWORD_DEFAULT);

        if($old=$oldhashedPwd){
        $hashedPwd = password_hash($UserPsword, PASSWORD_DEFAULT);
        $sql2 = "UPDATE customer SET FName='$FName',LName='$LName',TelephoneNo='$TelephoneNo',UserPsword='$hashedPwd' WHERE Email ='" . $userEmail . "' ";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        if ($result2) {
            echo "<script>
                alert('Profile Updated Succesfully');
                window.location.href='../UpdateCustomerProfile.php';
            </script>";
        }}
        else{echo "<script>
            alert('Old password entered is incorrect. Please try again');
            window.location.href='../UpdateCustomerProfile.php';
        </script>";}
    } else {

        header('Location: ../login.php');
     }
}

