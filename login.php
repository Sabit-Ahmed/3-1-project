<?php include('server2.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
		<title>login page</title>
        <link rel="stylesheet" type="text/css" href="css/style signup.css"/>
</head>
<body>

    <div class="container">
        <img src="images/man.PNG">
				<p> Login as: </p>
         <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>">

						 <p><input type="radio" name="all_user" <?php if(isset($lall_user) && $lall_user =="customer") echo "checked";?> value="customer">Customer
						 	 <input type="radio" name="all_user" <?php if(isset($lall_user) && $lall_user =="provider") echo "checked";?> value="provider">Provider
						 	 <span class="error"> *&nbsp;&nbsp;  <?=$lcaterr;?></span></p>
             <p class="form-input">
                 <input type="email" name="email" placeholder="Enter Username" value="<?=$email;?>"><span class="error">  <?=$emerr;?></span> </p>
             <p class="form-input">
                 <input type="password" name="password1" placeholder="Enter Password" value="<?=$pass1;?>"><span class="error"> <?=$perr1;?></span></p>
            <p> <input type="submit" name="login" value="LOGIN" class="btn-login"></p>
         </br>Not a member yet?<a href="sign_up.php"> Sign up</a>
         </form>
    </div>
</body>
</html>
