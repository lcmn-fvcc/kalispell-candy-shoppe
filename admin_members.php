<?php

//Laura Mills Nelson
//Final Project
//Web Programming, CSCI 210, Sect. 01
//11/14/2020  


//admin_members.php

	require 'dbconnect.php';
	
	if(isset($_POST))
	{
		
		if(!empty($_POST['action']))
		{
			
			if($_POST['action'] === 'Delete')
			{
				$uID = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
				$sql_delete = "DELETE FROM tbl_user ".
							   "WHERE user_id = ".$uID;
				$pdo->exec($sql_delete);
			}
			
		}
		
	}

	//assign SQL statement to variable
	$sql_contacts = "SELECT * ".
					"FROM tbl_user ".
					"ORDER BY lastname, firstname";
					
	//execute SQL statement
	$result_contacts = $pdo->query($sql_contacts);


?>

<html>
<head>
<title>Admin -- Member Contact Info</title>

<!-- links stylesheet and print stylesheet -->
<link rel="stylesheet" href="styles.css" media="screen">

<!-- these are styles specific to this page/table -->
<style>

	table { border-collapse: collapse;
	        border: 3px solid #000000;
			margin: auto;
			margin-top: 5%; }

	td { text-align: center;
		 padding: 5px 10px;
		 background-color: #FFFFFF; }
		 
	.table1 { font-weight: bold; 
			   background-color: #5DEB4D;
			   border: 3px solid #000000;
			   font-size: 110%; }
			   
	.columnh { font-weight: bold;
			   background-color: yellow;
			   border: 3px solid #000000; }
			   

</style>


</head>
<body>

	<header> <h1>Kalispell Candy Shoppe</h1> </header>
	<br>

	<h2>Admin Page -- Member Contact Information</h2>

	<table border="1">
	
		<tr>
			<td colspan="9" class="table1">Member Contact Information</td>
		</tr>
	
		<tr>
			<td class="columnh">First Name</td>
			<td class="columnh">Last Name</td>
			<td class="columnh">Address</td>
			<td class="columnh">City</td>
			<td class="columnh">State</td>
			<td class="columnh">Zip</td>
			<td class="columnh">Email</td>
			<td class="columnh">Username</td>
			<td class="columnh">Delete</td>
		</tr>
		
		<?php
		
			while($row=$result_contacts->fetch())
			{
			echo('<tr>'.
				'<td>'.$row['firstname'].'</td>'.
				'<td>'.$row['lastname'].'</td>'.
				'<td>'.$row['address'].'</td>'.
				'<td>'.$row['city'].'</td>'.
				'<td>'.$row['state'].'</td>'.
				'<td>'.$row['zip'].'</td>'.
				'<td>'.$row['email'].'</td>'.
				'<td>'.$row['username'].'</td>'.
				'<form method="POST" action="admin_members.php" 
					onsubmit="return confirm(\'Are you sure?\')">
					<input type="hidden" name="user_id" value="'.$row['user_id'].'">
				<td><input class="deleteb" type="submit" value="Delete" name="action">
				</td>
				</form>
				</tr>
					');
			}	
		
		?>
	
	
	</table>


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