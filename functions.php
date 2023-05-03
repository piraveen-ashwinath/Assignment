<?php
//Piraveen Ashwinath
//A19SC0349
//Section 01
//Secure Programming
//Assignmnet 1
?>

<?php

function emptyInputRegister($name, $email,$password, $confirmpassword){
    $result;
    if(empty($name)||empty($email)||empty($password)||empty($confirmpassword)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidName($name){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/" , $name)) {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidPassword($password, $confirmpassword){
    $result;
    if($password !== $confirmpassword){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function existingName($conn, $name, $email){
    $sql="SELECT * FROM users WHERE userName = ? OR userEmail = ? ;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:./register.php");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss",$name,$email);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if($row= mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result=false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $password){
    $sql="INSERT INTO users (userName, userEmail, userPassword) VALUES (?, ?, ?) ;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:./register.php");
        exit();
    }

    $hashedPassword=password_hash($password,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss",$name,$email,$hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ./landing.php");
    exit();
}

function emptyInputLogin($email,$password){
    $result;
    if(empty(empty($email)||empty($password))){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function loginUser($conn,$email,$password){
    $existingUser = existingName($conn, $email, $email);

    if($existingUser===false){
        header("location:./login.php");
        exit();
    }

    $passwordHashed=$existingUser["userPassword"];
    $checkPassword=password_verify($password,$passwordHashed);

    if($checkPassword===false){
        header("location:./login.php");
        exit();
    }
    else if($checkPassword===true){
        session_start();
        $_SESSION["userid"]=$existingUser["userId"];
        $_SESSION["username"]=$existingUser["userName"];
        header("location: ./landing.php");
        exit();
    }
}

?>