<?php
//Piraveen Ashwinath
//A19SC0349
//Section 01
//Secure Programming
//Assignmnet 1
?>

<?php
if (isset($_POST["submit"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $confirmpassword=$_POST["confirmpassword"];

    require_once 'database.php';
    require_once 'functions.php';

    if (emptyInputRegister($name,$email,$password,$confirmpassword)!==false){
        header("location:./register.php");
        exit();
    }
    if (invalidName($name)!==false){
        header("location:./register.php");
        exit();
    }
    if (invalidEmail($email)!==false){
        header("location:./register.php");
        exit();
    }
    if (invalidPassword($password,$confirmpassword)!==false){
        header("location:./register.php");
        exit();
    }
    if (existingName($conn,$name,$email)!==false){
        header("location:./register.php");
        exit();
    }
    createUser($conn,$name,$email,$password);
}

else{
    header("location:./register.php");
    exit();
}

?>