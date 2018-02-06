<?php
/* Displays user information and some useful messages */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$profpic="back.jpg";

$pyscript = 'C:\\wamp64\\www\\login\\webcam.py';
$returns=exec("py $pyscript ", $output, $return );//$filePath
foreach ($output as &$value)
{
    echo $value;
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
  <title>Welcome</title>

  
</head>

<body>
<ul class="topnav">
    <li><a href="profile.php">Home</a></li>
  <li><a class="active" href="news.php">News</a></li>
   <li><a href="view_files.php">Files</a></li>
  <li class="right"><a href="contact.php">Contact</a></li>
  <li class="right"><a href="index.php">LogOut</a></li>
</ul>
</body>



<body>
  <div class="form" >
      <form>
          <center>
          <h1>Welcome</h1>
          
          <h2><?php echo "Today is " . date("Y/m/d") . "<br>"; ?></h2>
          
          <h3> This cloud was created with lot of effort and time. The crew worked hardly on a period of 3 months, advancing as the time passed. </h3>
          <h3> Here we are now! Our work is done and we are proud to announce the Cloud System! </h3>
          <h3> Here you can deposit your files and download them anytime you want. Enjoy our work! </h3>
          
          <h2>Crew:</h2> <h2>Croitoru Andrei</h2> <h2>Dascalu Stefan</h2> <h2>Fulgescu Vlad</h2> <h2>Vitelaru Bogdan</h2>
          </center>
      </form>
    </div>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>
