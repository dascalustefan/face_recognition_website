
<?php

/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
//include 'db.php';
global $con;
session_start();
// Set session variables to be used on profile.php page
$filename = basename( $_FILES["fileToUpload"]["name"]);
$email = $_SESSION['email'];

//$resultat = $con->query("SELECT * FROM users WHERE email='$email'") or die($con->error());

$sqll="SELECT id FROM users WHERE email='$email'";
if($con!=null)
{
    echo "nu e gol!!!!!";
}
else
{
    echo "e gol!!!";
}
$resultat = mysqli_query($con, $sqll);
//$sqll="SELECT id FROM users WHERE email='$email'";
//$resultat=$con->query($sqll);

if ( $resultat ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $resultat->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
        
        $iduser= $user['id'];
    }
}


//$iduser="SELECT id FROM users WHERE email='$email'";
//$_SESSION['iduser'] = $_POST['iduser'];
//$row=mysql_fetch_assoc($iduser);
// Escape all $_POST variables to protect against SQL injections
//$filename = $con->escape_string($_POST['filename']);
//$iduser = $con->escape_string($_POST['iduser']);
      
// Check if user with that email already exists
$resulttt = $con->query("SELECT * FROM files WHERE filename='$filename'") or die($con->error());

// We know user email exists if the rows returned are more than 0
if ( $resulttt->num_rows > 0 ) {
    
    $_SESSION['message'] = 'File exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    
    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO files (iduser, filename) " 
            . "VALUES ('$iduser','$filename')";

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