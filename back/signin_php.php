<?php
require 'db.php';
session_start();

    $email=$_POST["email"];
    $password=$_POST["password"];
    $_SESSION['email']=$email;
    $photo_code=$_POST['photo_code'];
    $_SESSION['photo_code']=$photo_code;

//    $pyscript = 'C:\\wamp64\\www\\login\\test.py';
 //   $returns=exec("py $pyscript ", $output, $return );//$filePath
 //   foreach ($output as &$value)
 //   {
 //      echo $value;
 //   }
 //   if($value=="1")
 //   {
 //       echo "e 1";
 //   }
  //  else
  //  {
  //      if($value=="-1")
 //       {
 //           echo "e 0";
 //       }
  //  }
    
    
    $result = $connection->query("SELECT * FROM users WHERE email='$email' and password='$password'") ;

    // We know user email exists if the rows returned are more than 0
    if ( $result->num_rows > 0 ) {

        $_SESSION['message'] = 'Welcome user!';
        
        $resultt = $connection->query("SELECT Image FROM users WHERE email='$email'") ;
        $value = mysqli_fetch_object($resultt);
        $my_photo=$value->Image;
        $_SESSION['my_photo'] = $value->Image;
        
         $resultt2 = $connection->query("SELECT Image2 FROM users WHERE email='$email'") ;
        $value2 = mysqli_fetch_object($resultt2);
        $my_photo2=$value2->Image2;
        
         $resultt3 = $connection->query("SELECT Image3 FROM users WHERE email='$email'") ;
        $value3 = mysqli_fetch_object($resultt3);
        $my_photo3=$value3->Image3;
        
         $resultt4 = $connection->query("SELECT Image4 FROM users WHERE email='$email'") ;
        $value4 = mysqli_fetch_object($resultt4);
        $my_photo4=$value4->Image4;
        
         $resultt5 = $connection->query("SELECT Image5 FROM users WHERE email='$email'") ;
        $value5 = mysqli_fetch_object($resultt5);
        $my_photo5=$value5->Image5;
        
         $resultt6 = $connection->query("SELECT Image6 FROM users WHERE email='$email'") ;
        $value6 = mysqli_fetch_object($resultt6);
        $my_photo6=$value6->Image6;
        
        #echo $my_photo;
        #echo $my_photo2;
        #echo $my_photo3;
        #echo $my_photo4;
        #echo $my_photo5;
        #echo $my_photo6;
        #echo $photo_code;
		$pyscript = 'C:\\xampp\\htdocs\\test2.py';
		#echo "py $pyscript $my_photo $my_photo2 $my_photo3 $my_photo4 $my_photo5 $my_photo6 $photo_code";
		$returns=exec("py $pyscript $my_photo $my_photo2 $my_photo3 $my_photo4 $my_photo5 $my_photo6 $photo_code", $output, $return );
		//echo "ceva";
		 foreach ($output as &$value)
        {
	#		echo "a intrat";
	#		echo $value;
			if($value=="people")
			{
		#		echo $value;
				require 'profile.php';
			}
			if($value!="people")
			{
		#		echo $value;
				require 'index_camera_signin.php';
			}
			
		}
    }
    else { // Email doesn't already exist in a database, proceed...


            $_SESSION['message'] = 'Wrong email or password!';
            header("location: errorr.php");
    }

?>