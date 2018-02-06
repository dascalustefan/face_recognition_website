<?php
/* Displays user information and some useful messages */
require 'db.php';
session_start();
$profpic="back.jpg";
$email=$_SESSION['email'];

//echo $email;
// Check if user is logged in using the session variable

    
   //$result = mysqli_query($connection,"SELECT filename FROM files where email='$email'");
   
   $sqll="SELECT id FROM users WHERE email='$email'";

$resultat = $connection->query($sqll) or die($connection->error());
//$resultat = mysqli_query($connection, $sqll);
//$sqll="SELECT id FROM users WHERE email='$email'";
//$resultat=$con->query($sqll);

if ( $resultat ==null ){ // User doesn't exist
    echo "<script type='text/javascript'>alert('User does not exists!')</script>";
}
else { // User exists
    $user = $resultat->fetch_assoc(); 
    $iduser= $user['id'];
    
    $result = $connection->query("SELECT filename FROM files WHERE iduser='$iduser'") or die($connection->error());
}
   
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
html {
    max-width: 1000px;

    background-image: url('<?php echo $profpic;?>');
    padding: 0px 250px;
}

ul.topnav {
    list-style-type: none;
    margin: 0;
    padding: 50;
    overflow: hidden;
    background-color: #333;
}

ul.topnav li {float: left;}

ul.topnav li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

ul.topnav li a:hover:not(.active) {background-color: #111;}

ul.topnav li a.active {background-color: #4CAF50;}

ul.topnav li.right {float: right;}

@media screen and (max-width: 600px){
    ul.topnav li.right, 
    ul.topnav li {float: none;}
}

</style>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
  <meta charset="UTF-8">
  <title>Files uploaded</title>

  
</head>

<body>
<ul class="topnav">
  <li><a href="profile.php">Home</a></li>
  <li><a href="news.php">News</a></li>
   <li><a class="active" href="view_files.php">Files</a></li>
  <li class="right"><a href="contact.php">Contact</a></li>
  <li class="right"><a href="index.php">LogOut</a></li>
</ul>
</body>



<body>
  <div class="form">

        <?php
            echo "<table border='1'>
            <tr>
            <th>Filename</th>
            </tr>";

            
            //$row = mysqli_fetch_array($result);


            while($row = mysqli_fetch_array($result))
            {
                
            $target_dir = "uploads//" . $email . "//";
            $target_file = $target_dir . $row["filename"];    
            echo "<tr>";
            echo "<td>" . $row["filename"] . "</td>";
            echo "<td>"?><a href="<?php echo $target_file;?>">Download</a> <?php echo "</td>";
            echo "</tr>";
            }
            echo "</table>";

            mysqli_close($connection);

        ?>
    </div>

    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
