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
        <title>Assignment 1</title>
    </head>

    <body>
        <h1>Sign up</h1>
    <form action="register.mech.php" method="post">
    <label for="name">Username:</label>
    <input type="text" id="name" name="name"><br><br>
    <label for="email">Email address:</label>
    <input type="text" id="email" name="email"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <label for="confirmpassword">Confirm password:</label>
    <input type="password" id="confirmpassword" name="confirmpassword"><br><br>
    <input type="submit" name="submit"><br><br>
    </form>

    <a href="login.php">Sign in</a>

    </body>

</html>