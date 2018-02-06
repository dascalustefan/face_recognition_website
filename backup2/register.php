<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
$first_name = $con->escape_string($_POST['firstname']);
$last_name = $con->escape_string($_POST['lastname']);
$email = $con->escape_string($_POST['email']);
$password = $con->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $con->escape_string( md5( rand(0,1000) ) );
     

// Check if user with that email already exists
$result = $con->query("SELECT * FROM users WHERE email='$email'") or die($con->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (first_name, last_name, email, password, hash) " 
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";

    // Add user to the database
    if ( $con->query($sql) ){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
       

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}