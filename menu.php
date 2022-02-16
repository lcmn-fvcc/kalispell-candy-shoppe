<?php

//Laura Mills Nelson
//Final Project
//Web Programming, CSCI 210, Sect. 01
//11/14/2020 


//menu.php
	

?>


<html>
<head>
<title>Menu</title>

<!-- links stylesheet and print stylesheet -->
<link rel="stylesheet" href="styles.css" media="screen">

</head>

<body>
<div class="menu">
	<strong>
	<br><hr><br>
	&nbsp;&nbsp;::&nbsp;&nbsp;<a href="index.php">Home</a>
	&nbsp;&nbsp;::&nbsp;&nbsp;<a href="about_us.php">About Us</a>
	&nbsp;&nbsp;::&nbsp;&nbsp;<a href="contact_us.php">Contact Us</a>

<?php	

	if(!isset($_SESSION['LoginStatus']))
	{
		echo('&nbsp;&nbsp;::&nbsp;&nbsp;<a href="login.php">User Login</a>&nbsp;&nbsp;::&nbsp;&nbsp;');
	}		

	if(!isset($_SESSION['LoginStatus']))
	{
		echo('<a href="create_account.php">Create Account</a>&nbsp;&nbsp;::&nbsp;&nbsp;<br><br>');
	}	
		
?>	
	
	&nbsp;&nbsp;::&nbsp;&nbsp;
	<a href="memberPage1.php">My Account<a/>&nbsp;&nbsp;::&nbsp;&nbsp;
	<a href="memberPage2.php">Our Products</a>&nbsp;&nbsp;::&nbsp;&nbsp;
	
<?php	

	if(isset($_SESSION['LoginStatus']))
	{
		echo('<a href="logout.php">Log Out</a>&nbsp;&nbsp;::&nbsp;&nbsp;
		<br>');
	}	
	

	try {

		
		if(isset($_SESSION['LoginStatus']) && $_SESSION['CurrentUser'] === 'admin')
		{
			echo('
			<br>
			&nbsp;&nbsp;::&nbsp;&nbsp;
			<a href="admin_members.php">Admin - Member Info</a>
			&nbsp;&nbsp;::&nbsp;&nbsp;');
			
			echo('<a href="admin_products.php">Admin - Product Info</a>&nbsp;&nbsp;::&nbsp;&nbsp;<br>');
		}
	}
	catch(Exception $e){
				
		
	}

?>
	
	</strong>

<?php	
	if(isset($_SESSION['LoginStatus']))
	{
		echo('<br><strong>&nbsp;&nbsp;::&nbsp;&nbsp;</strong>
		Current User is <strong>'.$_SESSION['CurrentUser'].
		'&nbsp;&nbsp;::</strong><br>');
	}	
	
?>	
	<br><br>
</div>
</body>
</html>