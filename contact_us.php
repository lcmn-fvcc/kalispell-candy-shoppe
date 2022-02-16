<?php

//Laura Mills Nelson
//Final Project
//Web Programming, CSCI 210, Sect. 01
//11/14/2020  


//contact_us.php

require 'dbconnect.php';

?>

<html>
<head>
<title>Contact Us</title>

<!-- links stylesheet and print stylesheet -->
<link rel="stylesheet" href="styles.css" media="screen">

<style>

img { float: right;
	  margin-right: 10%;
	  padding: 20px; }
	  
.more { text-align: center; 
  

</style>

</head>
<body>

	<header> <h1>Kalispell Candy Shoppe</h1> </header>
	<br>
	<h2>Contact Us</h2>
	<p class="signin">Kalispell Candy Shoppe is located in downtown Kalispell in beautiful northwest Montana. We have the widest variety of old-fashioned candy found in the state of Montana. Our quaint store set on Kalispell's pedestrian-friendly Main Street provides the perfect doorway to afternoon delights while enjoying an afternoon stroll. We also offer special orders for members and event products. Contact us by visiting us at our store or by calling the number below.</p>
	<br> 
	<img src="images/store.jpg" alt="candy_jars" width="400">
	<br>
	<div class="signin">
	<br>
	<h3>Address:</h3>
	<p>7777 Seventh Ave East<br>
	Kalispell, MT  77777</p>
	<br>
	<h3> Phone Number:</h3>
	(777) 777-7777
	<br><br>
	</div>
	<br>
	<br>
	<br>
	<br>
	<p class="more">
	-----------------<br><br><br>
	Want to know more about our company?<br><br> <strong><a href="create_account.php">Create an account</a></strong> to request more info!
	</p>

	
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