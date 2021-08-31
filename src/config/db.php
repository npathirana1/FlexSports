<?php

require_once('./src/models/operations.php');

class database{ 
    public static function con(){
 
        $serverName = "localhost";
        $dbName = "flexsports";
        $username = "root";
        $password = "";

        $con = mysqli_connect($serverName, $username, $password, $dbName);

        if (!$con) {
          die("Connection Failed:" . mysqli_connect_error());
        }

        return $con;
    }
}
