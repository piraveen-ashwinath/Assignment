<?php
//Piraveen Ashwinath
//A19SC0349
//Section 01
//Secure Programming
//Project
?>

<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PIZZA PIZZA PIZZA</title>
    </head>
    <body>
        <h1>Order Pizza</h1>
        <form action="order.php" method="post">
        <input type="checkbox" id="pizza1" name="pizza1" value="pizza1">
        <label for="pizza1"> Chicken Pepperoni</label><br>
        <input type="checkbox" id="pizza2" name="pizza2" value="pizza2">
        <label for="pizza2"> BBQ Chicken</label><br>
        <input type="checkbox" id="pizza3" name="pizza3" value="pizza3">
        <label for="pizza3"> Hawaiian Chicken</label><br>
        <input type="submit" value="Submit">
        </form>
        <br><br><br>
    <button onclick="logout.mech.php">Logout</button>
    </body>

</html>