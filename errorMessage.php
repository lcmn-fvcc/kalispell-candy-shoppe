<?php

//Laura Mills Nelson
//Final Project
//Web Programming, CSCI 210, Sect. 01
//11/14/2020

//errorMessage.php

include 'dbconnect.php';


?>

<html>
<head>
<title>Error</title>

<!-- links stylesheet and print stylesheet -->
<link rel="stylesheet" href="styles.css" media="screen">

</head>
<body class="ca_error">

	<header> <h1>Kalispell Candy Shoppe</h1> </header>
	<br>
	<h2>Error</h2>
	
	<?php
		
		echo($_SESSION['ErrorMessage']);
	
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