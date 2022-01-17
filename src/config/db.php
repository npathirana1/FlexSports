<?php
session_start();
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "flexsports"; 

$conn = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if (session_status() === PHP_SESSION_NONE) { // start session if not started
  session_start();
}