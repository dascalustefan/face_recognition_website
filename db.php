<?php

//class Database{
//   public $connection;
//    public $host='localhost',$db='accounts',$pass='',$user='root';
//    
//    public function connect()
//    {
//         $this->connection = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
//         //$this->connect($this->host, $this->dbuser, $this->dbpass, $this->dbname);
//    }
//
//    // This will be called at the end of the script.
 //   public function __destruct()
 //   {
//        mysqli_close($this->connection);
 //   }
//
 //   public function query($query)
//    {
 //       return mysqli_query($query, $this->connection);
//    }
//}
//$database = new Database;
//$database->connect();

function addition()
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'accounts';
    $GLOBALS['connection']=mysqli_connect($host, $user, $pass, $db);
}

addition();

//global $con;
//$con=mysqli_connect($host, $user, $pass, $db);

if(mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}