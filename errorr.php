<?php
/* Displays all error messages */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$profpic="baa.jpg";
?>
<!DOCTYPE html>
<html>
    
    <style>
html {
    max-width: 1000px;

    background-image: url('<?php echo $profpic;?>');
    padding: 0px 250px;
	}
	

</style>
    
<head>
  <title>Error</title>
  
</head>
<body>
<div class="form">
    <h1>Error</h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    //else:
       // header( "location: signup.php" );
    endif;
    ?>
    </p>     
    <a href="index.php"><button class="button button-block"/>Home</button></a>
</div>
</body>
</html>
