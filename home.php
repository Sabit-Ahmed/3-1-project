<?php //include('server.php');
session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Home page</title>
        <link rel="stylesheet" type="text/css" href="css/page.css"/>

</head>
<body>

<section class="head">
        <img src="clubs/ruet.png"/>
</section>
<section>
<ul>
<li><a  href="home.php">  Home </a></li>
<li><a>  Services  </a>
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

<?php if(isset($_SESSION['p_id'])):?>
	  <li><a>Progress History</a></li>
<?php else:?>
		<li><a href="order_page.php">Order Anything</a></li>
<?php endif;?>

<?php if(isset($_SESSION['c_id'])):?>
    <li>	<a href="index2.php"> Dashboard</a> </li>

<?php elseif(isset($_SESSION['p_id'])):?>
		<li><a href="index1.php"> Dashboard</a></li>

<?php else:?>
		<li><a href="BeProvider.htm">Sign up</a></li>
<?php endif;?>

<li><a href="contact.htm">  Help Center</a></li>
</ul></br></br>
</section>

    <div class="img" style="max-width:800px">
    <img class="mySlides" src="images/tech.png" style="width:100%">
    <img class="mySlides" src="images/ruet2.jpg" style="width:100%">
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
    <div class="cont"><h3>Fulfill your desire!</h3>
    <p>Grab your options, fulfill your desires! Get your works done with a blink of your eye! 'X' online service provides you the best service in Bangladesh. Choose any tasks and get it done!
    </p>
    </br></br>
    </div>


</body>
</html>
