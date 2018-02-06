<?php
require 'db.php';
session_start();

    $email=$_POST["email"];
    $password=$_POST["password"];
    $_SESSION['email']=$email;


    
    //echo $photo_code;
    
    
    $pyscript = 'C:\\wamp64\\www\\login\\test.py';
    $returns=exec("py $pyscript ", $output, $return );//$filePath
    foreach ($output as &$value)
    {
       echo $value;
    }
    if($value=="1")
    {
        echo "e 1";
    }
    else
    {
        if($value=="-1")
        {
            echo "e 0";
        }
    }
    
    
    $result = $connection->query("SELECT * FROM users WHERE email='$email' and password='$password'") ;

    // We know user email exists if the rows returned are more than 0
    if ( $result->num_rows > 0 ) {

        $_SESSION['message'] = 'Welcome user!';
        
        $resultt = $connection->query("SELECT Image FROM users WHERE email='$email'") ;
        $value = mysqli_fetch_object($resultt);
        $_SESSION['my_photo'] = $value->Image;

    }
    else { // Email doesn't already exist in a database, proceed...


            $_SESSION['message'] = 'Wrong email or password!';
            header("location: errorr.php");
    }
require 'profile.php';
?>