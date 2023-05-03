<?php
//Piraveen Ashwinath
//A19SC0349
//Section 01
//Secure Programming
//Assignmnet 1
?>

<?php

$selector=$_GET["selector"];
$validator=$_GET["validator"];

if (empty($selector)||empty($validator)){
    echo"Could not validate your request!";
}
else{
    if (ctype_xdigit($selector)!==false&&ctype_xdigit($validator)!==false){
        ?>
        
        <form action="reset.mech.php" method="POST">
            <input type="hidden" name="selector" value="<?php echo $selector;?>">
            <input type="hidden" name="validator" value="<?php echo $validator;?>">
            <input type="password" name="password" value="Enter new password">
            <input type="password" name="confirmPassword" value="Confirm password">
            <button type="submit" name="submit">Reset password</button>
        </form>


        <?php
    }
}

?>