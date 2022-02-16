<?php

//Laura Mills Nelson
//Final Project
//Web Programming, CSCI 210, Sect. 01
//11/14/2020


//memberPage1.php (called "My Account" on the website)

	require 'dbconnect.php';
	
	
	if(!$_SESSION['LoginStatus'])
	{
		header("Location: login.php");
	}	


?>

<html>
<head>
<title>My Account</title>

<!-- links stylesheet and print stylesheet -->
<link rel="stylesheet" href="styles.css" media="screen">

</head>
<body>

	<header> <h1>Kalispell Candy Shoppe</h1> </header>
	<br>
	<h2>Welcome!</h2>
	<p>Welcome to your account! Within your account, you can learn about member benefits and browse our full selection of old-fashioned candy.</p>
	<p>Member benefits include a free Whirly Pop old-fashioned lollipop with each purchase of $20 or more! Additional holiday discounts and member coupons are available throughout the year to make each special occasion truly memorable.</p>
	<p>Membership at Kalispell Candy Shoppe involves exclusive access to delicious treats the whole family will love! </p>
	<p>To view all of our products, visit the <strong><a href="memberPage2.php">Our Products</a></strong> page.</p>
	
<?php

	include 'menu.php';

?>

</body>
<footer></footer>

<div class="copyright">

	<h5>Copyright &copy; 
	<script> document.write(new Date().getFullYear());
	</script> 
	Kalispell Candy Shoppe &#124; All Rights Reserved 
	</h5>
</div>

</html>

