<?php
error_reporting(E_ALL ^ E_NOTICE); 
session_start();
//require 'db.php';
$profpic="back.jpg";
//$email=$_POST["email"];
//$password=$_POST["password"];
$email=$_SESSION['email'];
//$_SESSION['email']=$email;

$photo_code=$_SESSION['photo_code'];
//$_SESSION['photo_code']=$photo_code;
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
    padding: 20px;
}

</style>
</head>
<body>
    
<ul class="topnav">
  <li><a class="active" href="profile.php">Home</a></li>
  <li><a href="news.php">News</a></li>
  <li><a href="view_files.php">Files</a></li>
  <li class="right"><a href="contact.php">Contact</a></li>
  <li class="right"><a href="index.php">LogOut</a></li>
</ul>

    
        <embed  width="700" height="500"
src="https://www.youtube.com/embed/H9q69HmFGg4" >
        
        
<div style="padding:0 24px;">
  
    <form action="upload.php" method="post" enctype="multipart/form-data">
            <p>Select file to upload:</p>
            
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload File" name="submit">
            
    </form>
    
</div>



</body>
</html>
