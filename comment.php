<?php


/*mysql_connect("localhost","root","");
mysql_select_db("commentbox");*/

if ($_SERVER['REQUEST_METHOD']=='POST'){
$name=$_POST['name'];
$comment=$_POST['comment'];
$submit=$_POST['submit'];
}

$dbLink = mysqli_connect('localhost','root','','commentbox');
    mysqli_query("SET character_set_connection=utf8", $dbLink);
    mysqli_query("SET character_set_connection=utf8", $dbLink);
 if ($_SERVER['REQUEST_METHOD']=='POST'){
if($submit)
{
if($name&&$comment)
{
$insert=mysqli_query("INSERT INTO comment (name,comment) VALUES ('$name','$comment') ");
echo "<meta HTTP-EQUIV='REFRESH' content='0; url=comment.php'>";
}
else
{
echo "please fill out all fields";
}
}
 }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
		<title>Home page</title>
        <link rel="stylesheet" type="text/css" href="css/page.css"/>

</head>
<body>

<div class="head">
        <img src="clubs/ruet.png"/>
        <div id="relog">
                <a href="login.php">Login</a> &nbsp;
                <a href="register.php">Register</a>
        </div>
</div>
<ul>
<li><a  href="home.php">  Home </a></li>
<li><a>  Ruetian Clubs</a>
<ul>
    <li><a href="rapl.php">RAPL</a></li>
    <li><a href="IEEE.php">IEEE Ruet</a></li>
    <li><a href="RCF.php">Ruet Career Forum</a></li>
    <li><a  href="RDC.php">Ruet Debating Club</a></li>
    <li><a href="RSC.php">Robotic Society of Ruet</a></li>
    <li><a href="psr.php">Photographic Society of Ruet</a></li>
    <li><a href="onu.php">অনুরণন</a></li>
    <li><a>সমানুপাতিক</a></li>
</ul>
</li>
<li><a>Events</a>
    <ul>
        <li><a>August</a></li>
        <li><a>September</a></li>
        <li><a>October</a></li>
    </ul>
</li>
<li><a href="blog.php">Blog</a></li>
<li><a href="contact.php">  Contact us</a></li>
</ul></br></br>


    <div class="img" style="max-width:800px">
    <img class="mySlides" src="clubs/platoon/f1.jpg" style="width:100%">
    </div>

    </br></br>
    <div class="cont"><h3>CROWEDFUNDING</h3>
    <p>Team Crack Platoon is fighting for the pride of 16 core Bangladeshi. They will be the 1st one to introduce FORMULA RACING CAR in Bangladesh from Bangladesh by Bangladesh.
        To participate in this competition they will need a huge amount of money. Their Total Budget is 72 lakhs. Among which only a few couple of lakhs have been managed so far.
        Thus we have no other way but to crowdfund. Please help us by spreading the news, Donating money or Have us introduced to the companies that might be interested in sponsoring us.
        Our business team is working day and night to improve and introduce more business opportunities for the interested companies.
    </p>


<form action="comment.php" method="POST">

		<table>
		<tr><td>Name: <br><input type="text" name="name"/></td></tr>
		<tr><td colspan="2">Comment: </td></tr>
		<tr>
		<td colspan="5"><textarea name="comment" rows="10" cols="50"></textarea></td></tr>
		<tr><td colspan="2"><input type="submit" name="submit" value="Submit"></td></tr>

		</table>
</form>

    </div>



    <?php
$dbLink = mysqli_connect('localhost','root','','commentbox');
    mysqli_query("SET character_set_results=utf8", $dbLink);
    mb_language('uni');
    mb_internal_encoding('UTF-8');

$getquery=mysqli_query("SELECT * FROM comment ORDER BY id DESC");
while($rows=mysqli_fetch_assoc($getquery))
{
$id=$rows['id'];
$name=$rows['name'];
$comment=$rows['comment'];


echo $name . '<br/>' . '<br/>' . $comment . '<br/>' . '<br/>' . '<hr size="1"/>';


}
?>

</body>
</html>
