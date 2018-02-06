<?php
session_start();
$profpic="baa.jpg";
$_SERVER['REQUEST_METHOD'] = 'POST';

$number=$_SESSION['number'];


$photo_code=$_POST['photo_code'];
$_SESSION['photo_code']=$photo_code;

$cars=array();
$cars=$_SESSION['cars'];
$cars[$number]=$photo_code;
$_SESSION['cars']=$cars;

$number=$number+1;
$_SESSION['number']=$number;


$pyscript = 'C:\\xampp\\htdocs\\test1.py';
$returns=exec("py $pyscript $photo_code", $output, $return );//$filePath

//$pyscript = 'C:\\xampp\\htdocs\\test1.py';
//$python = 'C:\\PROGRAMDATA\\ANACONDA3\\python.exe';
//exec("$python $pyscript $photo_code ", $output, $return );//$filePath
//
//
//    echo $return;
//    foreach ($output as &$value)
//			{
//				 echo $value;
//
//		    		    }

        foreach ($output as &$value)
        {
            if($value!="merge")
            {
            echo "nu e fata";
            $number=$number-1;
            $_SESSION['number']=$number;
            require 'index_camera_signup.php';
            }
        }
        if($number<6)
        {
            require 'index_camera_signup.php'; 
        }
  
    else
    {
        require 'signup.php';
    }
    
    
?>



