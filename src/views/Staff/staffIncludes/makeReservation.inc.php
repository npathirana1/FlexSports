<?php
include("../../../config/db.php");

if (isset($_POST['submit'])) {

    if (isset($_SESSION['managerID'])) {
        $userEmail = $_SESSION['managerID'];
    } elseif (isset($_SESSION['receptionistID'])) {
        $userEmail = $_SESSION['receptionistID'];
    }

    $get_EmpID = "SELECT * from user_login where Email ='" . $userEmail . "' ";
    $result = mysqli_query($conn, $get_EmpID);
    $row = mysqli_fetch_assoc($result);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $timeslot = $_POST['timeslot'];
    $facility = $_POST['facility'];
    $payment = $_POST['payment'];
    $date =  $_POST['date'];
    $tel =  $_POST['tel'];
    $empid = $row['ID'];


    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['timeslot']) && !empty($_POST['facility']) && !empty($_POST['payment']) && !empty($_POST['tel'])) {
        
        if($payment == 'full'){
            $state = 'Confirmed';
        }elseif($payment == 'advance'){
            $state = 'Confirmed';
        }else{
            $state = 'Pending';
        }

        $make_res = "INSERT INTO reservation (date,timeslot,ReservationStatus,EmpID,FacilityName,CustName,CustEmail,PaymentStatus, TelNo) VALUES ('$date','$timeslot','$state','$empid','$facility','$name','$email','$payment','$tel')";
        $result_res = mysqli_query($conn, $make_res);

        if ($result_res) {

            //Sending the confirmation email to the user 
            $from = "flexsports6@gmail.com";
            $mail_subject = 'FlexSports Reservation Confirmation';
            $email_body   = "Reservation Confirmation from FlexSports Administration: <br>";
            $email_body   .= "<b>Reserved Facility: </b> {$facility} <br>";
            $email_body   .= "<b>Date:</b> {$date} <br>";
            $email_body   .= "<b>Timeslot:</b> {$timeslot} <br>";
            $email_body   .= "You have made a reservation with flexsports with the above mentioned details.<br>";

            $header       = "From: {$from}\r\nContent-Type: text/html;";

            $send_mail_result = mail($email, $mail_subject, $email_body, $header);

            
                    echo "<script>
                    alert('Reservation has been successfully created');
                    window.location.href= '../allReservations.php';
                    </script>";
        } else {
            echo "<script>
                alert('failed');
                window.history.back();
                </script>";
        }
    }else {
        echo
        "<script>
            alert('empty fields');
            window.history.back();   
        </script>";
    }
}
