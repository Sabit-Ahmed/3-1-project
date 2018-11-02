<?php include('server.php');
//if user is not signed in,they shall not pass..
if (empty($_SESSION['username'])){
    header('location: login.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
		<title>Home page</title>
        <link rel="stylesheet" type="text/css" href="css/indexTest.css"/>

</head>
<body>

    <div class="head">
        <img src="clubs/ruet.png">
    </div>
    <ul>
    <li><a  href="home.htm">  Home </a></li>
    <li><a>  Ruetian Clubs</a>
    <ul>
      <li><a href="rapl.htm">Home Delivery</a></li>
      <li><a href="IEEE.htm">Shopping</a></li>
      <li><a href="RCF.htm">Quick Fix</a></li>
      <li><a  href="RDC.htm">Driving</a></li>
      <li><a href="RSC.htm">Tuition</a></li>
      <li><a href="psr.htm">Construction</a></li>
      <li><a href="onu.htm">Home Tasks</a></li>
      <li><a>Cleaning</a></li>
      <li><a>Car Wash</a></li>
      <li><a>Catering</a></li>
      <li><a>Shifting</a></li>
      <li><a>Decoration</a></li>
    </ul>
    </li>
    <li><a>Events</a>
        <ul>
            <li><a>August</a></li>
            <li><a>September</a></li>
            <li><a>October</a></li>
        </ul>
    </li>
    <li><a href="blogcomment.php">Blog</a></li>
    <li><a href="contact.php">  Contact us</a></li>
</ul></br></br>


    <div class="cont">
        <div class="content" id="animate-area">
             <?php if(isset($_SESSION['success'])): ?>
                 <div class="error_success">
                     <h3>
                        <?php
                              echo $_SESSION['success'];
                              unset ($_SESSION['success']);
                        ?>
                     </h3>
                 </div>
             <?php endif ?>

             <?php if (isset($_SESSION["username"])): ?>
             <marquee scrollamount="3" direction="left" behavior="scroll"><h2>Welcome <strong><?php echo $_SESSION['username']; ?>!!</strong></h2></marquee>
             <h2><a href="index.php?logout='1'"> Logout</a></h2>

             <?php endif ?>
        </div>
    </div>
</body>
</html>
