


<html>

<head>


</head>
<body>
	<form action ="comment.php" method ="post">
	<label><b> Name:</b><br><input type="text" name="name"><br><br><br></label>
		
	<label><b> Message:<b> 	<br><textarea name="mes" cols="50" rows="10"></textarea></label><br><br><br>
		
	<input type="submit" name="post" value="Post">
	
	
	</form>
</body>


</html>

<?php
$name="";
$text="";
$post="";

if ($_SERVER['REQUEST_METHOD']=='POST')
{
$name=$_POST["name"];
$text =$_POST["mes"];
$post=$_POST["post"];
}

if($post)
{
	#WRITE DOWN COMMENTS#
	
	$write = fopen("com.txt","a+");
	fwrite($write,"<u><b>$name</b></u></br>$text</br>");
	fclose($write);
	
	#DISPLAY COMMENT#
	
	$read=fopen("com.txt","r+t");
	echo "<br><br><br>All Comments :<br><br><br>";
	
	while(!feof($read)){
		echo fread($read,1024);
		echo"<br><br><br><br>";
	}
	
	
	fclose($read);
	
	
}

else
{
#DISPLAY COMMENT#
	
	$read=fopen("com.txt","r+t");
	echo "<br><br><br>All Comments :<br><br><br>";
	
	while(!feof($read)){
		echo fread($read,1024);
		echo "<br><br><br><br><br>";
	}
	fclose($read);
			
}


?>