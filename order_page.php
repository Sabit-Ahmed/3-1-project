<?php include('server.php');
//if user is not signed in,they shall not pass..
//echo $_SESSION['email'];
if (empty($_SESSION['c_id'])){
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

  <p><input type="radio" name="service" <?php if(isset($service) && $service =="1") echo "checked";?> value="1">Home Delivery &nbsp;&nbsp; </p>
  <p><input type="radio" name="service" <?php if(isset($service) && $service =="2") echo "checked";?> value="2">Shopping &nbsp;&nbsp; </p>
  <p><input type="radio" name="service" <?php if(isset($service) && $service =="3") echo "checked";?> value="3">Quick Fix &nbsp;&nbsp; </p>
  <p><input type="radio" name="service" <?php if(isset($service) && $service =="4") echo "checked";?> value="4">Driving &nbsp;&nbsp; </p>
  <p><input type="radio" name="service" <?php if(isset($service) && $service =="5") echo "checked";?> value="5">Construction &nbsp;&nbsp;</p>
  <p><input type="radio" name="service" <?php if(isset($service) && $service =="6") echo "checked";?> value="6">Home Tasks &nbsp;&nbsp; </p>
  <p><input type="radio" name="service" <?php if(isset($service) && $service =="7") echo "checked";?> value="7">Cleaning &nbsp;&nbsp; </p>
  <p><input type="radio" name="service" <?php if(isset($service) && $service =="8") echo "checked";?> value="8">Tuition &nbsp;&nbsp; </p>
  <p><input type="radio" name="service" <?php if(isset($service) && $service =="9") echo "checked";?> value="9">Decoration &nbsp;&nbsp; </p>
  <p><input type="radio" name="service" <?php if(isset($service) && $service =="10") echo "checked";?> value="10">Home Shifting &nbsp;&nbsp; </p><br>
  <p>Quantity <input type="number" name="qty" min="0"></p>
  <p><input type="submit" name="add" value="ADD"></p>
</form>
</p>

</body>
</html>
