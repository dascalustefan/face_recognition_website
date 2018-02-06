<?php
/* Displays user information and some useful messages */
session_start();
$profpic="back.jpg";

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

  <meta charset="UTF-8">
  <title>Welcome</title>

  
</head>

  <head>
    <!-- This stylesheet contains specific styles for displaying the map
         on this page. Replace it with your own styles as described in the
         documentation:
         https://developers.google.com/maps/documentation/javascript/tutorial -->
    <link rel="stylesheet" href="/maps/documentation/javascript/demos/demos.css">
  </head>

<body>
<ul class="topnav">
  <li><a href="profile.php">Home</a></li>
  <li><a href="news.php">News</a></li>
  <li><a href="view_files.php">Files</a></li>
  <li class="right" class="active"><a href="contact.php">Contact</a></li>
  <li class="right"><a href="index.php">LogOut</a></li>
</ul>
</body>



<body>
  <div class="form">

      <h1 style="color:white;">Military Technical Academy</h1>

<div id="googleMap" style="width:100%;height:400px;"></div>

<script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(44.416831666,26.083999664),
    zoom:15,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD09F2XOyGVKvbChVEs8ZZnwlITtJ9fj68&callback=myMap"></script>
          
    </div>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
