<?php
session_start();
$host = "localhost"; 
$user = "root"; 
$password = "s@mple123"; 
$dbname = "fstest"; 

$conn = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}