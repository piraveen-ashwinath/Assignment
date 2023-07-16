<?php
//Piraveen Ashwinath
//A19SC0349
//Section 01
//Secure Programming
//Project
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Assignment 1</title>
    </head>

    <body>
        <h1>Login</h1>
    <form action="login.mech.php" method="post">
    <label for="email">Email address:</label>
    <input type="text" id="email" name="email"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" name="submit"><br><br>
    </form>

    <a href="register.php">Sign up</a><br><br>
    <a href="recovery.php">Forgot password</a>
 
    </body>

</html>