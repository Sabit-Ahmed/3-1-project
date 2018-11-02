
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Comment</title>
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
<li><a href="blog.htm">Blog</a></li>
<li><a href="contact.htm">  Contact us</a></li>
</ul></br></br>


    <div class="img" style="max-width:800px">
    <img class="mySlides" src="images/ruet2.jpg" style="width:100%">
    <img class="mySlides" src="clubs/shahidMinar.jpg" style="width:100%">
    <img class="mySlides" src="clubs/ruetCampus.jpg" style="width:100%">
    </div>

    <div class="button" >
      <div class="button2">
        <button class="greyButton" id="grey1" onclick="plusDivs(-1)">❮ Prev</button>
        <button class="greyButton" id="grey2" onclick="plusDivs(1)">Next ❯</button>
      </div>
      <button class="demoButton" id="red1" onclick="currentDiv(1)">1</button>
      <button class="demoButton" id="red2" onclick="currentDiv(2)">2</button>
      <button class="demoButton" id="red3" onclick="currentDiv(3)">3</button>
    </div>

  <script>
  var slideIndex = 1;
  showDivs(slideIndex);

  function plusDivs(n) {
    showDivs(slideIndex += n);
  }

  function currentDiv(n) {
    showDivs(slideIndex = n);
  }

  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
       dots[i].className = dots[i].className.replace(" w3-red", "");
    }
    x[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " w3-red";
  }
  </script>

    </br></br>
    <div class="cont"><h3>Ruetian Clubs</h3>
    <p>Students of RUET are involved in different organizations and clubs of the university. Members of these organizations and clubs organize different national programs at RUET.
    They also participate in different national and international competitions and shows indomitable performances.
    This website is about to show the activities of the organizations and helps the students who are eager to join these clubs.
    </p>

    <b>&nbsp;&nbsp;&nbsp;Please leave a reply:</b></br>
    <form action="blogcomment.php" method="POST">

		<table>
		<tr><td>Name: <br><input type="text" name="name"/></td></tr>
		<tr><td colspan="2">Comment: </td></tr>
		<tr>
		<td colspan="5"><textarea name="mes" rows="10" cols="50"></textarea></td></tr>
		<tr><td colspan="2"><input type="submit" name="post" value="Submit"></td></tr>

		</table>
    </form>

<?php
$name="";
$text="";
$post="";

if ($_SERVER['REQUEST_METHOD']=='POST'){
$name=$_POST["name"];
$text =$_POST["mes"];
$post=$_POST["post"];
}

if($post)
{
	#WRITE DOWN COMMENTS#

	$write = fopen("comment.txt","a+") or die("Unable!");
	fwrite($write,"<u><b>$name:</b></u></br>$text</br>");
	fclose($write);

	#DISPLAY COMMENT#

	$read=fopen("comment.txt","r+t");
	echo "<br><br><br>All Comments :<br><br><br>";

	while(!feof($read)){
		echo fread($read,1024);
		echo"<br><br><br><br>";
	}


	fclose($read);


}

else
{
#DISPLAY COMMENT#

	$read=fopen("comment.txt","r+t");
	echo "<br><br><br>All Comments :<br><br><br>";

	while(!feof($read)){
		echo fread($read,1024);
		echo "<br><br><br><br><br>";
	}
	fclose($read);

}
?>

    </div>

</body>
</html>
