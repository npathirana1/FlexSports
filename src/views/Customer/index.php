<?php
include "../../config/db.php";

    if (isset($_SESSION['customerID'])) {
        header('Location: profile.php');
    }else{
        header('Location: ../login.php');
    }
