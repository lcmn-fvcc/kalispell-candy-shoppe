<?php

//Laura Mills Nelson
//Final Project
//Web Programming, CSCI 210, Sect. 01
//11/14/2020  


//admin_products.php

	require 'dbconnect.php';
	
	if(isset($_POST['pname']))
	{
		
		//get the file
		$thefile = $_FILES['photo']['tmp_name'];
		$size = filesize($thefile);
		$imagetype = mime_content_type($thefile);
		
		//retrieve the file and encode it as base64
		$image = base64_encode(file_get_contents($thefile));
		
		//set up SQL statement
		$sql_product = "INSERT INTO tbl_product(pname, photo, image_type, image_size, price, descrip) ".
		"VALUES(:pname,:photo,:image_type,:image_size,:price,:descrip)";
		
		//prepare the SQL statement
		$sql_product = $pdo->prepare($sql_product);
		
		//sanitize
		$pname = filter_var($_POST['pname'], FILTER_SANITIZE_STRING);
		$price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
		$descrip = filter_var($_POST['descrip'], FILTER_SANITIZE_STRING);
		
		//bind
		$sql_product->bindparam(":pname", $pname);
		$sql_product->bindparam(":price", $price);
		$sql_product->bindparam(":descrip", $descrip);
		
		//specify longblob
		$sql_product->bindparam(":photo", $image, PDO::PARAM_LOB);
		$sql_product->bindparam(":image_type", $imagetype);
		$sql_product->bindparam(":image_size", $size);
		
		try
		{		
			$upload_check = $sql_product->execute();			
		}
		catch(PDOException $e)
		{
			echo('Failed: '.$e->getMessage());
		}
		
		if($upload_check)
		{
			header("Location: admin_products.php");
		}
		else
		{
			echo('<br>********* File failed to upload *********<br>');
			
			header("Location: admin_products.php");
		}
		
	}
	else
	{
		
	echo('

		<html>
		<head>
		<title>Admin -- Product Info</title>
			
		<!-- links stylesheet and print stylesheet -->
		<link rel="stylesheet" href="styles.css" media="screen">
			
		<style>	
		
			img { width: 200px; }
		
		</style>

		</head>
		<body>
			
		<header> <h1>Kalispell Candy Shoppe</h1> </header>
		<br>

		<h2>Admin Page -- Product Information</h2>
				
		<h3>Upload Product Info:</h3>

		<form method="POST" action="admin_products.php" enctype="multipart/form-data">
		<table>
			<tr>
				<td><strong>Product Name:&nbsp;&nbsp;</strong></td>
				<td><input type="text" size="25" name="pname" value="Gummy Bears"></td>
			</tr>
			<tr>
				<td><strong>Photo:</strong></td>
				<td><input type="file" name="photo" accept=".jpg,.jpeg,.png"></td>
			</tr>
			<tr>
				<td><strong>Price:</strong></td>
				<td><input type="text" size="25" name="price" value="$4.99/lb"></td>
			</tr>
			<tr>
				<td><strong>Description:</strong></td>
				<td><input type="text" size="75" name="descrip" value="Assorted flavors -- made with gelatin"></td>
			</tr>
			<tr>
				<td><br></td>
				<td><input class="accountbtn2" type="submit" value="Upload"></td>
			</tr>
		</table>
		</form>
				
		<br><hr>
		'); //end of echo	
			
		if(isset($_POST))
		{
							
			if(!empty($_POST['action']))
			{
								
				if($_POST['action'] === 'Delete')
				{
					$pID = filter_var($_POST['prod_id'], FILTER_SANITIZE_NUMBER_INT);
					$sql_delete = "DELETE FROM tbl_product ".
								  "WHERE prod_id = ".$pID;
					$pdo->exec($sql_delete);
				}
				
				if($_POST['action'] === 'Edit')
				{
					$_SESSION['prodEditID'] = filter_var($_POST['prod_id'], FILTER_SANITIZE_NUMBER_INT);
				
					header("Location:edit_product.php");
				}
								
			}
							
		}
						
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
				<td class="pcolumnh">Edit</td>
				<td class="pcolumnh">Delete</td>
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
				'<form method="POST" action="admin_products.php" 
					onsubmit="return confirm(\'Are you sure?\')">
					<input type="hidden" name="prod_id" value="'.$row['prod_id'].'">
				<td class="ptabletd"><input class="editb" type="submit" value="Edit" name="action">
				</td>
				<td class="ptabletd"><input class="deleteb" type="submit" value="Delete" name="action">
				</td>
				</form>
				</tr>
				');//end of echo

			}	
		echo('
		</table>
		<br>

		</body>
		');//end of echo
		
		include 'menu.php';
		
		echo('
		<footer></footer>
		
		<div class="copyright">

		<h5>Copyright &copy; 
		<script> document.write(new Date().getFullYear());
		</script> 
		Kalispell Candy Shoppe &#124; All Rights Reserved 
		</h5>
		</div>
		
		</html>

		'); //end of echo	
			
		
	}//end of else
	

?>
