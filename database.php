<?php
//Piraveen Ashwinath
//A19SC0349
//Section 01
//Secure Programming
//Project
?>

<?php

$serverName="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="assignment";
$conn=mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

?>