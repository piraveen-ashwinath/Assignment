<?php
//Piraveen Ashwinath
//A19SC0349
//Section 01
//Secure Programming
//Assignmnet 1
?>

<?php

if (isset($_POST["submit"])){
    $email=$_POST["email"];
    $password=$_POST["password"];

    require_once 'database.php';
    require_once 'functions.php';

    if (emptyInputLogin($email,$password)!==false){
        header("location:./login.php");
        exit();
    }

    loginUser($conn,$email,$password);
}
else{
    header("location:./login.php");
    exit();
}

?>