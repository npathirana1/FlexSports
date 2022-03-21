<?php
session_start();

include("../../../config/db.php");



    $id=(int) $_GET['ReservationNo'];
   

     $sql2 = "UPDATE reservation SET ReservationStatus ='Cancelled' WHERE ReservationNo ='" . $id . "' ";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            echo "<script>
                alert('Customer account has been successfully deleted');
                window.location.href='../ViewReservations.php';
            </script>";
        } else {
            echo "<script>alert('Deletion failed');</script>";
            echo "<script>window.location.href = '../ViewReservations.php';</script>";
        }
   

mysqli_close($conn);