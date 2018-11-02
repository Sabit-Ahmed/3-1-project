<?php //include('server.php');
//if user is not signed in,they shall not pass..
//echo $_SESSION['email'];
session_start();
if (empty($_SESSION['pro_email'])){
    header('location: login.php');
}
//echo $_SESSION['id'];





?>

<!DOCTYPE html>
<html>
<head>
  <title>A Simple Form</title>
  <style>
    .error{
      color:red;
    }
  </style>
</head>
<body>
  <h1>Order now!</h1>

<p>
<form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <?php include('order.php');?>

  <?php
  $servername="localhost";
  $username="root";  //root
  $password="";
  $db="registration";

  $conn=new mysqli($servername,$username,$password,$db);

  if($conn->connect_error){
    die("Connection failed:  ".$conn->connect_error);
  }

  $sql="SELECT * FROM service";
  $result=$conn->query($sql);
  if($result->num_rows>0){
  while($rows=$result->fetch_assoc()){
     //$s_id=$rows['Service_ID'];
     ?><p><input type="radio" name="p_service" <?php if(isset($p_service) && $p_service ==$rows['Service_ID']) echo "checked";?> value="<?=$rows['Service_ID']?>">
     <?php echo $rows['Service_name']."<br>";
  }
}
   ?>&nbsp;&nbsp; </p>

  <p><input type="submit" name="choose" value="Choose One!"></p>
</form>
</p>

</body>
</html>
