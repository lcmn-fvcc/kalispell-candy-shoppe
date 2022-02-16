<?php

//Laura Mills Nelson
//Final Project
//Web Programming, CSCI 210, Sect. 01
//11/14/2020


//confirmation.php

require 'dbconnect.php';



?>


<html>
<head>
<title>Input Display</title>

<!-- links stylesheet and print stylesheet -->
<link rel="stylesheet" href="styles.css" media="screen">


</head>
<body>

	<header> <h1>Kalispell Candy Shoppe</h1> </header>
	<br>

	<h2>Congratulations on creating your account!</h2>
	<h3>Here is the information you have entered:</h3>
	
	
	<?php
	
		//create SQL query to select last entry
		$sql_selectLastAccount = "SELECT * ".
								 "FROM tbl_user ".
								 "WHERE user_id = (SELECT MAX(user_id) ".
								 "FROM tbl_user )";
								 
		//run the query
		$accountData = $pdo->query($sql_selectLastAccount);
		
		//loop through the columns
		foreach($accountData as $row)
		{
			echo("<div class='infolist'>
				 <strong>First Name: </strong>".$row['firstname']. "<br>".
				 "<strong>Last Name: </strong>".$row['lastname']. "<br>".
				 "<strong>Address: </strong>".$row['address']. "<br>".
				 "<strong>City: </strong>".$row['city']. "<br>".
				 "<strong>State: </strong>".$row['state']. "<br>".
				 "<strong>Zip: </strong>".$row['zip']. "<br>".
				 "<strong>Email: </strong>".$row['email']. "<br>".
				 "<strong>Username: </strong>".$row['username']. "<br><br></div>");
			
			
			if(($row['info']) == 1)
			{
				echo('<i>You have requested more information.</i>');
			}

		}
	
		echo('<br>');
		echo("<p class='signin'>Now you can <strong><a href='login.php'>sign in</a> </strong>to your account!</p>");
	
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
