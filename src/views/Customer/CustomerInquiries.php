<?php include "./customerIncludes/navbar1.php" ?>
<?php
include "../../config/db.php";

//Check user login or not
if (isset($_SESSION['customerID'])) {
    $userEmail = $_SESSION['customerID'];

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Inquiries</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/customerhome.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/indexstyle.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/viewTablesCustomer.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/InquiriesSubmitted.css">
        <style>
            h2 {
                color: #000000;
                font-size: 4em;
                line-height: 1.4em;
                font-weight: 500;
            }

            .top {
                color: #17335C;
                font-size: 3.4em;
                font-weight: 900;
            }

            .topic {
                margin-left: 100px;
            }

            a {
                color: #FFFAE4;
            }
        </style>
    </head>

    <body>
        <div class="topic" style="margin-top: 10%;">
            <div class="top">Your Inquiries</div>
        </div>
        <section>

            <!-- <div class="circle"></div> -->
            <div class="home-section-table">
                <table style="width:100%; margin-top:-50px;" class="table_view">
                    <thead>
                        <tr>
                            <th>Sender Name</th>
                            <th>Sender Email</th>
                            <th>Inquiry</th>
                            <th>Status</th>
                            <th>Reply</th>
                            <!-- <th>Remove</th> -->
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $viewCustomer = "SELECT * FROM inquiry WHERE SenderEmail ='$userEmail'";
                        $cResult = mysqli_query($conn, $viewCustomer);
                        while ($row = mysqli_fetch_assoc($cResult)) { ?>
                            <tr>
                                <td><?php echo $row["SenderName"]; ?></td>
                                <td><?php echo $row["SenderEmail"]; ?></td>
                                <td><?php echo $row["Description"]; ?></td>
                                <td><?php echo $row["InquiryStatus"]; ?></td>
                                <td><?php echo $row["Reply"]; ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </section>
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>