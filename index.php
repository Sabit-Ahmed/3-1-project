<?php include('login_validation.php');
//if user is not signed in,they shall not pass..
//echo $_SESSION['email'];
if (empty($_SESSION['email'])){
    header('location: login.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
		<title>Home page</title>
        <link rel="stylesheet" type="text/css" href="css/test.css"/>

</head>
<body>
    <div class="cont">
        <div class="header">
            <h1 class="h">Home page</h1>
        </div>
        <div class="content">
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
             <marquee scrollamount="3" direction="left" behavior="scroll"><p>Welcome <strong><?php echo $_SESSION['username']; ?>!!</strong></p></marquee>
             <p> <a href="index.php?logout='1'"> Logout</a></p>

             <?php endif ?>
        </div>
    </div>
</body>
</html>
