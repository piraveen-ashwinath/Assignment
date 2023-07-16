<?php
//Piraveen Ashwinath
//A19SC0349
//Section 01
//Secure Programming
//Project
?>



<?php

if(isset($_POST["submit"])){
    $selector= bin2hex(random_bytes(8));
    $token=random_bytes(32);
    $url="reset.php?selector=" . $selector . "&validator=" . bin2hex($token);
    $expires=date("U")+ 900;

    require 'database.php';

    $userEmail=$_POST["email"];
    $sql="DELETE FROM passwordreset WHERE resetEmail=?";
    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo"Unexpected error  :(";
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql= "INSERT INTO passwordReset (resetEmail,resetSelector,resetToken,resetExpires) VALUES (?,?,?,?);";
    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo"Unexpected error  :(";
        exit();
    }
    else{
        $hashedToken=password_hash($token,PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ssss",$userEmail,$selector,$hashedToken,$expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to=$userEmail;
    $subject='Assignment Password Recovery';
    $message='<p>A request for password reset has been received by us from you. The link to reset the password can be found within this email. If you did not make this request, please ignore this email.</p>';
    $message.='<p>Here is the link to reset your password:<br></p>';
    $message.='<a href="'.$url.'">'.$url.'</a></p>';
    $headers="From: Assignment <assignment@gmail.com>\r\n";
    $headers.="Reply-To: assignment@gmail.com\r\n";
    $headers.="Content-type: text/html\r\n";

    mail($to,$subject,$message,$headers);
    header("Location:./reset.php");

}
else{
    header("location:./login.php");
}

?>