<?php
//Piraveen Ashwinath
//A19SC0349
//Section 01
//Secure Programming
//Assignmnet 1
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Recover Password</title>
    </head>

    <body>
        <h1>Password Recovery</h1>
        <h3>An email will be sent to your email address to recover your password.</h3>
        <br>
        <form action="recovery.mech.php" method="post">
    <label for="email">Email address:</label>
    <input type="text" id="email" name="email"><br><br>
    <input type="submit" name="submit"><br><br><br><br><br><br>
    </form>

    <a href="register.php">Sign up</a><br><br>
    <a href="login.php">Login</a>
 
    </body>

</html>