<!DOCTYPE html>
<html>
    <head>
	<title>
		dickface
		</title>
	<script language="javascript" type="text/javascript">
document.write("<font color='green'>This document was
last modified on "+document.lastModified+"</font>");
</script>

	</head>
	<body>
		
		Hello, world!
        <h1>
		
          <?php
		   
		   $pyscript = 'C:\\xampp\\htdocs\\1.py';
		   $python = 'C:\\PROGRAMDATA\\ANACONDA3\\python.exe';
		   //$filePath = 'C:\\wamp\\www\\testing\\uploads\\thumbs\\10-05-2012-523.jpeg'


			$returns=	exec("$python $pyscript ", $output, $return );//$filePath
			foreach ($output as &$value)
			{
				 echo $value;
		    }
		  $a=5;
		  var_dump($a==5);
               echo "hello"; 
          ?>
		  </h1>
		  <p>
8 1 Introducing HTML
Here's the status of our new house. (We know you're
fascinated!)</p>
<!-- Link to your image goes here. -->
<img src="house.jpg" align="left" /><br />
        
	</body>
</html>