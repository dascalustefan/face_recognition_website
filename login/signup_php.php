<?php
session_start();
require 'db.php';

    $first_name=$_POST["firstname"];
    $last_name=$_POST["lastname"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $_SESSION['email']=$email;
    //echo $_SESSION['email'];

        $cars=array();
    $cars=$_SESSION['cars'];
    $_SESSION['cars']=$cars;
    
    $photo_code=$cars[0];
    $photo_code2=$cars[1];
    $photo_code3=$cars[2];
    $photo_code4=$cars[3];
    $photo_code5=$cars[4];
    $photo_code6=$cars[5];

    //echo $photo_code;
    
    $path="uploads//" . $email . "//";
    mkdir($path);

    $result = $connection->query("SELECT * FROM users WHERE email='$email'") or die($connection->error());

    // We know user email exists if the rows returned are more than 0
    if ( $result->num_rows > 0 ) {

        $_SESSION['message'] = 'User with this email already exists!';
        //header("location: errorr.php");
        require 'errorr.php';

    }
    else { // Email doesn't already exist in a database, proceed...

        // active is 0 by DEFAULT (no need to include it here)
        $sql = "INSERT INTO users (first_name, last_name, email, password, Image, Image2, Image3, Image4, Image5, Image6) " 
                . "VALUES ('$first_name','$last_name','$email','$password', '$photo_code', '$photo_code2', '$photo_code3', '$photo_code4', '$photo_code5', '$photo_code6')";

        // Add user to the database
        if ( $connection->query($sql) )
        {
            $_SESSION['message'] = 'User with this email already exists!';
        }
    }

require 'profile.php'

?>