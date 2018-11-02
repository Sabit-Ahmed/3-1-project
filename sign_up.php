<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
		<title>Sign up page</title>
        <link rel="stylesheet" type="text/css" href="css/style signup.css"/>
</head>
<body>
    <div class="container">
        <img src="images/man.PNG">
					<p><marquee scrollamount="3" direction="left" behavior="scroll">Order any service or be a provider. Choose your category!</marquee></p>
			  <p><span class="error1">* Required field</span></p>
         <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>">
             <!--display validation errors here-->
						 <?php include('server2.php'); ?>
	<p><input type="radio" name="all_user" <?php if(isset($all_user) && $all_user =="customer") echo "checked";?> value="customer">Customer
	   <input type="radio" name="all_user" <?php if(isset($all_user) && $all_user =="provider") echo "checked";?> value="provider">Provider
		 <span class="error"> *&nbsp;&nbsp;  <?=$caterr;?></span></p>
	<p class="form-input"> <input type="text" name="fname" placeholder="Firstname" value="<?=$fname;?>"> <span class="error"> *  <?=$fnerr;?></span></p>
  <p class="form-input"> <input type="text" name="lname" placeholder="Lastname" value="<?=$lname;?>"> <span class="error">  <?=$lnerr;?></span></p>
  <p class="form-input"> <input type="email" name="email" placeholder="Email" value="<?=$remail;?>"> <span class="error"> *  <?=$remerr;?></span> </p>
  <p class="form-input"> <input type="password" name="password1" placeholder="Password" value="<?=$rpass1;?>"><span class="error"> *  <?=$rperr1;?></span></p>
  <p class="form-input"> <input type="password" name="password2" placeholder="Confirm password" value="<?=$pass2;?>"><span class="error"> *  <?=$perr2;?></span></p>
	<p class="form-input"> <input type="text" name="mob" placeholder="+880" value="<?=$mob;?>"><span class="error"> *  <?=$moberr;?></span></p>
  <p>Gender: <input type="radio" name="gender" <?php if(isset($gender) && $gender =="male") echo "checked";?> value="male">Male
            <input type="radio" name="gender" <?php if(isset($gender) && $gender =="female") echo "checked";?> value="female">Female
            <input type="radio" name="gender" <?php if(isset($gender) && $gender =="other") echo "checked";?> value="other">Other
            <span class="error"> *&nbsp;&nbsp;  <?=$generr;?></span></p>
             <input type="submit" name="register" value="Register" class="btn-login">
             </br>
             Already a member?<a href="login.php" ><u> Sign in</u></a>
         </form>
    </div>
</body>
</html>
