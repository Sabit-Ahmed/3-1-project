<?php
$servername="localhost";
$username="root";  //root
$password="";
$db="registration";

$conn=new mysqli($servername,$username,$password,$db);

if($conn->connect_error){
  die("Connection failed:  ".$conn->connect_error);
}

$qty=$service="";

if(isset($_POST['add'])){

  $service=$_POST['service'];
  $qty=$_POST['qty'];

  if(!empty($service &&  $qty)){
    $Service_ID=$service;
    $c_id=$_SESSION['c_id'];

    $sql1="INSERT INTO relation (Customer_ID,Service_ID,O_quantity) VALUES ('$c_id','$Service_ID','$qty')";
    $re1=$conn->query($sql1);
    $l_id=$conn->insert_id;
    //echo $l_id;
    $_SESSION['l_id']=$l_id;
    header('location: confirm.php?s_id='.$Service_ID);
  }
}
//for proider
$p_service=$p_service_id="";
if(isset($_POST['choose'])){
  $p_service=$_POST['p_service'];
  //echo $p_service;
  if(!empty($p_service)){
    $p_service_id=$p_service;
    //$p_id=$_SESSION['p_id'];
   //echo $p_service_id;
   $pro_email=$_SESSION['pro_email'];
    $sql1="UPDATE provider SET Service_ID='$p_service_id' WHERE Email='$pro_email'";
    $re1=$conn->query($sql1);
    //$l_id=$conn->insert_id;
    //$_SESSION['l_id']=$l_id;
    unset($_SESSION['pro_email']);
    session_destroy();
    header('location: login.php');
  }
}
//for Confirm
$p_name=$pro_id=$o_id="";
if(isset($_POST['choose_p'])){
  $p_name=$_POST['p_name'];
  //echo $p_name;
  if(!empty($p_name && $_SESSION['l_id'])){
    $pro_id=$p_name;
    $c_id=$_SESSION['c_id'];
    $o_id=$_SESSION['l_id'];
    $sql1="UPDATE relation SET Provider_ID='$pro_id' WHERE O_ID='$o_id'";
    $re1=$conn->query($sql1);

    unset($_SESSION['l_id']);
    die("Success!");

  }
  /*else{
    //die("Confirmed already!");
    header('location: order_page.php');
  }*/
}


$conn->close();
?>
