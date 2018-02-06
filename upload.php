<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'db.php';
$email=$_SESSION['email'];


$target_dir = "uploads//" . $email . "//";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    //$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //if($check !== false) {
    //    echo "<script type='text/javascript'>alert('File is an image - " . $check["mime"] . ".')</script>";
        //echo "File is an image - " . $check["mime"] . ".";
    //    $uploadOk = 1;
    //} else {
    //    echo "<script type='text/javascript'>alert('File is not an image.')</script>";
        //echo "File is not an image.";
    //    $uploadOk = 0;
    //}
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<script type='text/javascript'>alert('Sorry, file already exists.')</script>";
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
else
{
// Check file size

// Allow certain file formats

// Check if $uploadOk is set to 0 by an error

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<script type='text/javascript'>alert('The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.')</script>";
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.')</script>";
        //echo "Sorry, there was an error uploading your file.";
    }
//echo basename( $_FILES["fileToUpload"]["name"]);
    
    
    
$filename = basename( $_FILES["fileToUpload"]["name"]);
//$email = $_POST['email'];

//$resultat = $con->query("SELECT * FROM users WHERE email='$email'") or die($con->error());

$sqll="SELECT id FROM users WHERE email='$email'";

$resultat = $connection->query($sqll) or die($connection->error());
//$resultat = mysqli_query($connection, $sqll);
//$sqll="SELECT id FROM users WHERE email='$email'";
//$resultat=$con->query($sqll);

if ( $resultat ==null ){ // User doesn't exist
    echo "<script type='text/javascript'>alert('User does not exists!')</script>";
    //$_SESSION['message'] = "User with that email doesn't exist!";
    //header("location: errorr.php");
}
else { // User exists
    $user = $resultat->fetch_assoc(); 
    $iduser= $user['id'];
}


//$iduser="SELECT id FROM users WHERE email='$email'";
//$_SESSION['iduser'] = $_POST['iduser'];
//$row=mysql_fetch_assoc($iduser);
// Escape all $_POST variables to protect against SQL injections
//$filename = $con->escape_string($_POST['filename']);
//$iduser = $con->escape_string($_POST['iduser']);
      
// Check if user with that email already exists
$resulttt = $connection->query("SELECT * FROM files WHERE filename='$filename' and iduser='$iduser'") or die($connection->error());

// We know user email exists if the rows returned are more than 0
if ( $resulttt->num_rows > 0 ) {
    //echo "eroare 2";
    //$_SESSION['message'] = 'File exists!';
    //header("location: errorr.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    //echo "baaaaaaaaaaaaaaaaaaaaaaaaa";
    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO files (iduser, filename) " 
            . "VALUES ('$iduser','$filename')";

    // Add user to the database
    if ( $connection->query($sql) ){


    }
    else {
        //echo "eroare 3";
        //$_SESSION['message'] = 'Registration failed!';
        //header("location: errorr.php");
    }

}
}
mysqli_close($connection);

require 'profile.php';
    
?>