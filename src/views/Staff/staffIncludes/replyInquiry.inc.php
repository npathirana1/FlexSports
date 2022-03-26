<?php

include("../../../config/db.php");

if (isset($_POST['submit'])) {

    $response = $_POST['response'];
    $inquiry = $_POST['Inquiry'];
    $name = $_POST['Name'];
    $Email = $_POST['Email'];
    $inquiryNo = $_POST['InquiryNo'];
    $state = 'Responded';

    if (!empty($_POST['response'])) {
        
                $query = "UPDATE inquiry SET Reply='$response', InquiryStatus='$state' where InquiryNo='$inquiryNo'";
                $result = mysqli_query($conn, $query);

                if ($result) {

                    //Sending the confirmation email to the user 
                    $from = "nethmi.pathirana@gmail.com";
                    $mail_subject = 'Inquiry to FlexSports';
                    $email_body   = "Dear {$name} <br>";
                    $email_body   .= "This is with regards to the inquiry made by you. <br>";
                    $email_body   .= "<b> {$response} </b><br>";
                    $email_body   .= "Kindly get back to us if you have any further questions.<br>";
                    $email_body   .= "Best regards,<br>";
                    $email_body   .= "Flexsports<br>";

                    $header       = "From: {$from}\r\nContent-Type: text/html;";

                    $send_mail_result = mail($Email, $mail_subject, $email_body, $header);

                    echo "<script>
                            alert('The response has been successfully sent');
                            window.location.href='../../Receptionist/inquiryList.php';
                        </script>";
                } else {
                    echo "<script>alert('failed to response');</script>";
                    echo "<script>window.location.href = '../../Receptionist/inquiryList.php';</script>";
                }
            }
        
}

mysqli_close($conn);
