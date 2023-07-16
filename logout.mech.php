<?php
//Piraveen Ashwinath
//A19SC0349
//Section 01
//Secure Programming
//Assignmnet 1
?>



<?php

session_start();
session_unset();
session_destroy();

header("location: ./login.php");
exit();

?>