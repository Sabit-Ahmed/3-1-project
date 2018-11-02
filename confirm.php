<?php
include('server.php');
//if user is not signed in,they shall not pass..
//echo $_SESSION['email'];
if (empty($_SESSION['c_id'])){
    header('location: login.php');
}
else if(empty($_SESSION['l_id'])){
  header('location: order_page.php');
}
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
  <h1>Confirm!</h1>

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

    $s_id=$_GET['s_id'];
    $sql="SELECT * FROM provider WHERE Service_ID='$s_id'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
    while($rows=$result->fetch_assoc()){
       //$s_id=$rows['Service_ID'];
       ?><p><input type="radio" name="p_name" <?php if(isset($p_name) && $p_name ==$rows['Pro_ID']) echo "checked";?> value="<?=$rows['Pro_ID']?>">
       <?php echo $rows['First_name']."<br>";
    }
  }
  else{
    die("No provider is available for this service");
  }
     ?>&nbsp;&nbsp; </p>

    <p><input type="submit" name="choose_p" value="Choose Provider!"></p>
  </form>
  </p>

</body>
</html>
