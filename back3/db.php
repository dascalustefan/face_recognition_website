<?php
/* Database connection settings */
//$host = 'localhost';
//$user = 'root';
//$pass = '';
//$db = 'accounts';
//global $mysqli;
//$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

function addition()
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'accounts';
    $GLOBALS['con']=mysqli_connect($host, $user, $pass, $db);
}

addition();

//global $con;
//$con=mysqli_connect($host, $user, $pass, $db);

if(mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}