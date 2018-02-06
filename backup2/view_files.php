<?php
/* Displays user information and some useful messages */
session_start();
$profpic="back.jpg";

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    
   $result = mysqli_query($con,"SELECT filename FROM files where email='$email'");
    
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
html {
    max-width: 10000px;

    background: white;
    padding: 0px;
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

  <meta charset="UTF-8">
  <title>Files uploaded</title>
  <?php include 'css/css.html'; ?>

  
</head>

<body>
<ul class="topnav">
  <li><a class="active" href="profile.php">Home</a></li>
  <li><a href="news.php">News</a></li>
  <li class="right"><a href="contact.php">Contact</a></li>
</ul>
</body>



<body>
  <div class="form">

        <?php
            echo "<table border='1'>
            <tr>
            <th>Filename</th>
            </tr>";

            while($row = mysqli_fetch_array($result))
            {
                
                
            echo "<tr>";
            echo "<td>" . $row['filename'] . "</td>";
            echo "<td>"?><a href="<?php echo $row['filename'];?>">Download</a> <?php echo "</td>";
            echo "</tr>";
            }
            echo "</table>";

            mysqli_close($con);

        ?>
    </div>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
