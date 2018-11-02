<?php include('server.php');
//if user is not signed in,they shall not pass..
//echo $_SESSION['email'];
if (empty($_SESSION['p_id'])){
    header('location: login.php');
}
//echo $_SESSION['id'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
		<title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="css/test.css"/>

</head>
<body>
    <div class="cont">
        <div class="header">
            <h1 class="h">Dashboard</h1>
        </div>
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

             <?php if (isset($_SESSION['email'])): ?>
             <marquee scrollamount="3" direction="left" behavior="scroll"><p>Welcome <strong><?php echo $_SESSION['name']; ?>!!</strong></p></marquee>
             <p><a href="home.php"> Go to home &nbsp;&nbsp;</p>
             <p><a>Progress History</P>

             <p><a>Settings</p>
             <p class="btn-login"> <a href="index1.php?logout='1'"> <strong>Logout</strong></a></p>

             <?php endif ?>
        </div>
    </div>
</body>
</html>
