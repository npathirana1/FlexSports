<?php

include("../../../config/db.php");

if (isset($_POST['leave-submit'])) {

    $Date = $_POST['ldate'];
    $LeaveType = $_POST['type2'];
    $Description = $_POST['leavReason'];
    /*$TelephoneNo = $_POST['TelephoneNo'];
    $NIC = $_POST['NIC'];
    $UserPsword = $_POST['UserPsword'];
    $repeat = $_POST['UserPsword-repeat'];
    $UserType = 'customer';*/

    if (!empty($_POST['ldate']) && !empty($_POST['type2']) && !empty($_POST['leavReason']) ) {
        //check for customers with same email
        

       

                $query = "INSERT INTO customer (ldate,type2,leavReason,) VALUES ('$Date','$LeaveType','$Description')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "<script>
                            alert('Leave updated succesfully');
                            window.location.href='../fWLeaves.php';
                        </script>";
                } 
    } else {
        echo
        "<script>
            alert('empty fields');
            window.location.href = '../fWLeaves.php';
        </script>";
    }
}
