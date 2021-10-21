<?php
include "../../config/db.php";

    if (isset($_SESSION['managerID'])) {
        header('Location: managerIndex.php');
    }else{
        header('Location: ../login.php');
    }
?>