<?php

//Laura Mills Nelson
//Final Project
//Web Programming, CSCI 210, Sect. 01
//11/14/2020  


//edit_product.php

	require 'dbconnect.php';
	
	//update data for the record
	if(!empty($_POST['pname']))
	{
		//try & catch is around execute (below)
		
		//------------------------------------
		//anything related to updating the image was removed for the purpose
		//of this project and was commented out
		//--------------------------------------
		
		
		//get the file
		//$thefile = $_FILES['photo']['tmp_name'];
		//$size = filesize($thefile);
		//$imagetype = mime_content_type($thefile);
		
		//retrieve the file and encode it as base64
		//$image = base64_encode(file_get_contents($thefile));
		
			
		//setup SQL statement
		$sql_update = "UPDATE tbl_product ".
					  "SET pname = :pname, ".
					  //"photo = :photo, ".
					  //"image_type = :image_type, ".
					  //"image_size = :image_size, ".
					  "price = :price, ".
					  "descrip = :descrip ".
					  "WHERE prod_id = :prod_id";
					  
		//prepare SQL statement
		$sql_update = $pdo->prepare($sql_update);
		
		//sanitize the input
		$pname = filter_var($_POST['pname'], FILTER_SANITIZE_STRING);
		$price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
		$descrip = filter_var($_POST['descrip'], FILTER_SANITIZE_STRING);
		$prod_id = filter_var($_POST['prod_id'],FILTER_SANITIZE_NUMBER_INT);
		
		//bind
		$sql_update->bindparam(":pname", $pname);
		$sql_update->bindparam(":price", $price);
		$sql_update->bindparam(":descrip", $descrip);
		$sql_update->bindparam(":prod_id", $prod_id);
		
		//specify longblob
		//$sql_update->bindparam(":photo", $image, PDO::PARAM_LOB);
		//$sql_update->bindparam(":image_type", $imagetype);
		//$sql_update->bindparam(":image_size", $size);
		
		
		
		try
		{		
			$update_check = $sql_update->execute();			
		}
		catch(PDOException $e)
		{
			echo('Failed: '.$e->getMessage());
		}
		
		//if works, take back to admin_products page or show error
		if($update_check)
		{
			header("Location: admin_products.php");
		}
		else
		{
			echo('<br>********* Info failed to update *********<br>');
			
			header("Location: admin_products.php");
		}
		
	}	
		
		//get data we want to change
		$sql_display_update = "SELECT * "
							 . "FROM tbl_product "
							 . "WHERE prod_id = ".$_SESSION['prodEditID'];
							 
		$result_display_update = $pdo->query($sql_display_update);
		
		$row_edit = $result_display_update->fetch();
			
	
?>

<html>
<head>
<title>Edit Product Info</title>

<!-- links stylesheet and print stylesheet -->
<link rel="stylesheet" href="styles.css" media="screen">

<style>

	img { width: 200px; }

	
</style>

</head>
<body>

<header> <h1>Kalispell Candy Shoppe</h1> </header>
<br>

<h2>Admin Page -- Edit Product Information</h2>

<form method="POST" action="edit_product.php" onsubmit="return confirm('Are you sure?')" enctype="multipart/form-data">
			
			<table>			
			<tr>
			<td><strong>Product Name:&nbsp;&nbsp;</strong></td>
			<td><input type="text" name="pname" 
						value="<?php echo($row_edit['pname']); ?>" 
						size="25"></td>
			</tr>

			<!-- 
			<tr>
			<td><strong>Photo:</strong></td>
			
			<td><input type="file" name="photo" accept=".jpg,.jpeg,.png" value="<?php 
			//echo($row_edit['photo']); ?>">
			</td>
			</tr>
			-->


			<tr>
			<td><strong>Price:</strong></td>
			<td><input type="text" name="price" 
						value="<?php echo($row_edit['price']); ?>" 
						size="25"></td>
			</tr>						


			<tr>
			<td><strong>Description:</strong></td>
			<td><input type="text" name="descrip" 
						value="<?php echo($row_edit['descrip']); ?>" size="75"></td>
			</tr>
						
			<tr>
			<input type="hidden" name="prod_id" 
						value="<?php echo($row_edit['prod_id']); ?>">
			<td colspan="2" class="accountbtn1"><input class="accountbtn2" type="submit" value="Update"></td>
			</tr>

			</table>
		</form>

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
