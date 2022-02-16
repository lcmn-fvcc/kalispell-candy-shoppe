<?php

//Laura Mills Nelson
//Final Project
//Web Programming, CSCI 210, Sect. 01
//11/14/2020  


//index.php

require 'dbconnect.php';

?>

<html>
<head>
<title>Home</title>

<!-- links stylesheet and print stylesheet -->
<link rel="stylesheet" href="styles.css" media="screen">

</head>
<body>

	<header> <h1>Kalispell Candy Shoppe</h1> </header>
	<br>
	<h2>Welcome to Kalispell Candy Shoppe!</h2>
	<p>At Kalispell Candy Shoppe, we know how delightful it is to savor a truly special treat. That's why we offer the widest variety of old-fashioned candy in the entire state of Montana, as well as specialty items such as gourmet caramel apples and high-quality gingerbread house kits.<p>
	<p>Feeling nostalgic for the days when you would walk from Grandma's house to the quaint candy store down the road? Enjoy one (or several!) of our delicious sweets while strolling down the beautiful Main Street of Kalispell, MT, stopping in small shops along the way.</p>
	<p>Looking for a way to make a special occasion that much more memorable? Choose from our vast selection of treats a party gift that your guests will never forget.</p>
	<br>
	<p class="signin">
	Login or create an account to check out our full selection!
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