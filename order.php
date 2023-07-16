<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PIZZA PIZZA PIZZA</title>
    </head>
    <body>
        <h1>Review order</h1>
        <h2>Selected PIZZAS:</h2>
    </body>

</html>





<?php

if(isset($_POST['pizza1'])== 'pizza1') 
{
    echo "Chicken Pepperoni (RM 12.00) ";
}
if(isset($_POST['pizza2'])=='pizza2'){
    echo "   BBQ Chicken (RM 12.00) ";
}
if(isset($_POST['pizza3'])=='pizza3'){
    echo "   Hawaiian Chicken (RM 12.00) ";
}

if(isset($_POST['pizza1'])== ''){
    if(isset($_POST['pizza1'])== ''){
        if(isset($_POST['pizza1'])== ''){
            echo "No PIZZAS have been selected :(";
        }
    }
}

?>
<html>
<body>
        <br>
    <button onclick="checkout.php">Checkout</button>
    </body>
</html>

<html>
<body>
        <br><br><br>
    <button onclick="logout.mech.php">Logout</button>
    </body>
</html>