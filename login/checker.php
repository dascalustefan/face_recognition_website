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

echo $number;

foreach($cars as &$value)
{
    echo $value;
}
    
//$pyscript = 'C:\\wamp64\\www\\login\\webcam.py';
//$returns=exec("py $pyscript ", $output, $return );//$filePath
//foreach ($output as &$value)
//{
//    echo $value;
 //   if($value=="1")
 //   {
 //       echo $number;
        if($number<6)
        {
            require 'index_camera_signup.php'; 
        }
 //   
    else
    {
        require 'signup.php';
    }
//}
    
    
?>



