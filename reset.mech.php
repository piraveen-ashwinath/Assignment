<?php
//Piraveen Ashwinath
//A19SC0349
//Section 01
//Secure Programming
//Assignmnet 1
?>

<?php

if(isset($_POST["submit"])){
    $selector=$_POST["selector"];
    $validator=$_POST["validator"];
    $password=$_POST["password"];
    $confirmPassword=$_POST["confirmPassword"];

    if(empty($password)||empty($confirmPassword)){
        header("Location:./login.php?=empty_field_detected");
        exit();
    }
    else if($password != $confirmPassword){
        header("Location:./login.php?=password_not_matching");
        exit();
    }

    $currentDate=date("U");

    require 'database.php';

    $sql="SELECT * FROM passwordreset WHERE resetSelector=? AND resetExpires>=?";
    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo"There was an error!";
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$selector);
        mysqli_stmt_execute($stmt,$currentDate);

        $result=mysqli_stmt_get_result($stmt);
        if(!$row=mysqli_fetch_assoc($result)){
            echo"Error occured. Resubmit your request";
            exit();
        }
        else{
            $tokenBin=hex2bin($validator);
            $tokenCheck=password_verify($tokenBin,$row["resetToken"]);

            if($tokenCheck===false){
                echo"Error occured. Resubmit your request";
                exit();
            }
            elseif($tokenCheck===true){
                $tokenEmail=$row['resetEmail'];
                $sql="SELECT * FROM users WHERE userEmail=?;";
                $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql)){
                    echo "There was an error!";
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $result=mysqli_stmt_bind_param($stmt);

                    if(!$row=mysqli_fetch_assoc($result)){
                        echo "There was an error!";
                        exit();
                    }
                    else{
                        $sql="UPDATE users SET userPassword=? WHERE userEmail=?";
                        $stmt=mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo "There was an error!";
                            exit();
                        }
                        else{
                            $newPasswordHash=password_hash($password,PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt,"ss",$newPasswordHash,$tokenEmail);
                            mysqli_stmt_execute($stmt);
                            $sql="DELETE FROM passwordreset WHERE resetEmail=?";
                            $stmt=mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt,$sql)){
                                echo "There was an error!";
                                exit();
                            }
                            else{
                                mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location:./login.php");
                            }
                        }
                    }
                }
            }
        }
    }
}
else{
    header("Location:./login.php");
}

?>