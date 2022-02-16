<?php

//Laura Mills Nelson
//Final Project
//Web Programming, CSCI 210, Sect. 01
//11/14/2020


//memberPage2.php (called "Our Products" on the website)

	require 'dbconnect.php';
	
	if(!$_SESSION['LoginStatus'])
	{
		header("Location: login.php");
	}	

?>

<html>
<head>
<title>Our Products</title>

<!-- links stylesheet and print stylesheet -->
<link rel="stylesheet" href="styles.css" media="screen">

<style>

	img { width: 200px; }

</style>

</head>
<body>

	<header> <h1>Kalispell Candy Shoppe</h1> </header>
	<br>
	
	<h2>Our Products</h2>
	<p class="signin">Check out the table below for the full list of our available products.<br> From chewy to chocolate, hard candy to DIY gingerbread house kits, we've got you covered!</p>

	
<?php

		//assign SQL statement to variable
		$sql_contacts = "SELECT * ".
						"FROM tbl_product ".
						"ORDER BY pname";
										
		//execute SQL statement/record set
		$result_contacts = $pdo->query($sql_contacts);
		
		echo('
		<br>
		<table border="1" class="ptable">	
			<tr>
				<td colspan="9" class="ptableh">Our Products</td>
			</tr>		
			<tr>
				<td class="pcolumnh">Product Name</td>
				<td class="pcolumnh">Photo</td>
				<td class="pcolumnh">Price</td>
				<td class="pcolumnh">Description</td>
			</tr>
		');//end of echo
		
			while(($row=$result_contacts->fetch()) != null)
			{

			echo('
				<tr>'.
				'<td class="ptabletd">'.$row['pname'].'</td>
				');//end of echo
				
				try
				{				
					echo('<td class="ptabletd"><image src="data:'.$row['image_type'].';base64,'.$row['photo'].'"></td>');
					//end of echo				
				}
				catch(Exception $e)
				{
					echo('<td class="ptabletd">Error: '.$e->getMessage().'</td>');
					//end of echo
				}
				
				echo(
				'<td class="ptabletd">'.$row['price'].'</td>'.
				'<td class="ptabletd">'.$row['descrip'].'</td>'.
				'</form>
				</tr>
				');//end of echo

			}	
		echo('
		</table>
		<br>');//end of echo	





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

