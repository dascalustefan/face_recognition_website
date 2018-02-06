<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'db.php';
$profpic="back.jpg";
$_SERVER['REQUEST_METHOD'] = 'POST';
    
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
    padding: 20px 20px;
}

</style>
</head>


<body>

<ul class="topnav">
  <li><a href="index.php">Back</a></li>
</ul>
    
    
<div>
    
    <form action="signup_php.php" method="post">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name.." required>
	
    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" placeholder="Your email.." required>

    <label for="pass">Password</label>
    <input type="password" id="pass" name="password" placeholder="Your password.." required>
    
    <label for="photo_code">Photo Code</label>
    <input type="text" id="photo_code" name="photo_code" value="<?php echo $photo_code ?>" required>
    
    <label for="photo_code2">Photo Code2</label>
    <input type="text" id="photo_code2" name="photo_code2" value="<?php echo $photo_code2 ?>" required>
    
    <label for="photo_code3">Photo Code3</label>
    <input type="text" id="photo_code3" name="photo_code3" value="<?php echo $photo_code3 ?>" required>
    
    <label for="photo_code4">Photo Code4</label>
    <input type="text" id="photo_code4" name="photo_code4" value="<?php echo $photo_code4 ?>" required>
    
    <label for="photo_code5">Photo Code5</label>
    <input type="text" id="photo_code5" name="photo_code5" value="<?php echo $photo_code5 ?>" required>
    
    <label for="photo_code6">Photo Code6</label>
    <input type="text" id="photo_code6" name="photo_code6" value="<?php echo $photo_code6 ?>" required>
    
    <input type="submit" value="Submit">
  </form>
  
</div>

</body>
</html>
