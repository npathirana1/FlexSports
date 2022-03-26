<?php
include "../../config/db.php";
$name = $_GET['sendername'];
$email = $_GET["email"];
$inquiry =  $_GET["inquiry"];
$no = $_GET["no"];
//Check user login or not
if (isset($_SESSION['managerID'])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Inquiries</title>


        <link rel="stylesheet" type="text/css" href="../../assets/CSS/staffMain.css">
        <link rel="stylesheet" type="text/css" href="../../assets/CSS/modal.css">
        <style>
            .home-section .home-content {
                padding-top: 10%;
                position: relative;
            }

            .modal {
                width: 30%;
                height: 75%;
            }

            input[type=text],
            input[type=password] {
                width: 100%;
                padding: 15px;

                display: inline-block;
                border: none;
                background: #f1f1f1;
            }

            input[type=text]:focus,
            input[type=password]:focus {
                background-color: #ddd;
                outline: none;
            }

            .form_btn {
                padding: 10px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 30%;
            }

            .form-footer {
                margin-top: 8px;
            }

            .modal {
                width: 50%;
                /* height: 80%; */
                padding: 20px;
                border-radius: .8rem;
                color: var(--light);
                background: var(--background);
                box-shadow: .4rem .4rem 1.4rem .2rem #17335C;
                position: relative;
                overflow: hidden;
                margin-left: 25%;
            }
        </style>

    </head>

    <body>
        <?php include "managerIncludes/managerNavigation.php"; ?>

        <section class="home-section">
            <nav class="breadcrumb-nav">
                <div class="top-breadcrumb">
                    <div>
                        <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./handelInquiries.php" style="color: #42ecf5;">Inquiries </a></li>
                            <li class="breadcrumb-item" style="color: #fff;">Respond to Inquiry</li>
                        </ul>
                    </div>

                </div>
            </nav>

            <div class="home-content">

                <div id="modal-opened">
                    <div class="modal">

                        <div class="modal__details">
                            <h1 class="modal__title">Respond to Inquiry</h1>
                        </div>

                        <form action="../Staff/staffIncludes/replyInquiry.inc.php" method="post" id="edit-form" name="addCustomer">
                            <div class="form-body">
                                <div class="form-group">
                                    <label for=""></label>
                                    <input type="text" name="Name" class="form-control" value="<?php echo $name ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for=""></label>
                                    <input type="text" name="Email" class="form-control" value="<?php echo $email ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for=""></label>
                                    <input type="text" name="Inquiry" class="form-control" value="<?php echo $inquiry ?>" readonly>
                                </div>

                                <input type="hidden" name="InquiryNo" id="InquiryNo" value="<?php echo $no ?>" />

                                <div class="form-group">
                                    <label for=""></label>
                                    <textarea rows="4" cols="78.75" name="response" id="response" placeholder="Enter your response here"></textarea>
                                </div>
                            </div>

                            <div class="form-footer">
                                <button type="submit" name="submit" class="btn btn-primary form_btn">Respond</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </section>
    </body>

    </html>
<?php
} else {
    header('Location: ../login.php');
}

?>