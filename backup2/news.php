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
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
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
  <title>Welcome <?= $first_name.' '.$last_name ?></title>
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

          <h1>Welcome</h1>
          
          <h2><?php echo "Today is " . date("Y/m/d") . "<br>"; ?></h2>
          
          <h3> This cloud was created with lot of effort and time. The crew worked hardly on a period of 3 months, advancing as the time passed. </h3>
          <h3> Here we are now! Our work is done and we are proud to announce you the Cloud System! </h3>
          <h3> Here you can deposit your files and download them anytime you want. Enjoy our work! </h3>
          
          <h2>Crew:</h2> <h2>Croitoru Andrei</h2> <h2>Dascalu Stefan</h2> <h2>Fulgescu Vlad</h2> <h2>Vitelaru Bogdan</h2>
          
    </div>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
