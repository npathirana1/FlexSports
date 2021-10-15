<?php
include "../../config/db.php";

    if (isset($_SESSION['receptionistID'])) {
        header('Location: receptionistIndex.php');
    }else{
        header('Location: ../login.php');
    }
