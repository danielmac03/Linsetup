<?php

$server = "localhost";
$username = "phpmyadmin";
$password = "root";
$database = "linsetup";
$db = mysqli_connect($server, $username, $password, $database);

if($db == false){
   echo "Error: Unable to connect to MySQL" . mysqli_connect_errno();
   exit;
}  

mysqli_query($db, "SET NAMES 'utf8'");

session_start();
?>
