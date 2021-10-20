<?php
session_start();
unset($_SESSION["customerID"]);
session_destroy();
header("Location:../views/website/home.php");
