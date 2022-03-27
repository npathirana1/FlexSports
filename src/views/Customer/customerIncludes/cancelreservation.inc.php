<?php
session_start();

include("../../../config/db.php");



    $id=$_POST['ReservationNo'];
    print_r($id);
 
  
   

     $sql2 = "UPDATE reservation SET ReservationStatus ='Cancelled',timeslot= NULL WHERE ReservationNo ='" . $id . "' ";
        $result2 = mysqli_query($conn, $sql2);
        print_r($result2);

        if ($result2) {
            echo "<script>
                alert('Your reservation was succesfully cancelled');
                window.location.href='../ViewReservations.php';
            </script>";
        } else {
            echo "<script>alert('Cancellation failed');</script>";
            echo "<script>window.location.href = '../ViewReservations.php';</script>";
        }
   

mysqli_close($conn);