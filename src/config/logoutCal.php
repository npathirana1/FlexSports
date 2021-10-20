<?php
session_start();
if (isset($_SESSION['customerID'])) {
    unset($_SESSION["customerID"]);
    session_destroy();
    header("Location:../views/website/home.php");
} else {
    unset($_SESSION["id"]);
    session_destroy();
    header("Location:../views/login.php");
}
