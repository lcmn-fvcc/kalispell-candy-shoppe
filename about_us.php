<?php

//Laura Mills Nelson
//Final Project
//Web Programming, CSCI 210, Sect. 01
//11/14/2020  


//about_us.php

require 'dbconnect.php';

?>

<html>
<head>
<title>About Us</title>

<!-- links stylesheet and print stylesheet -->
<link rel="stylesheet" href="styles.css" media="screen">

</head>
<body>

	<header> <h1>Kalispell Candy Shoppe</h1> </header>
	<br>
	<h2>About Us</h2>
	<p>Kalispell Candy Shoppe's roots run deep. Founder and owner Karla Peterson loves to reminisce about her idyllic childhood growing up in the beautiful Flathead Valley. Each week, while visiting their grandparents, Karla and her siblings would be allowed to choose one special item from the candy store run by her grandparents for decades. As she grew up, Karla worked in the store with her grandparents and learned to keep alive the magic and traditions that it created.<p>
	<p>Kalispell Candy Shoppe seeks to bring the same sense of childlike joy to people's daily lives that Karla and her siblings found in her grandparent's old-fashioned candy store. We invite you to join us as we bring a delightful smile to the faces of children and adults alike! </p>
	<br>
	<p class="signin">
	Want to know where to find us? Visit our <strong><a href="contact_us.php">Contact Us</a></strong> page!
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