<?php

//Laura Mills Nelson
//Final Project
//Web Programming, CSCI 210, Sect. 01
//11/14/2020


//create_account.php


require 'dbconnect.php';



if(isset($_POST['username']))
{
	$pwd = $_POST['password'];
	
	
	//username check
	//run sql to see if there are duplicate usernames
	
	//create the sql statement
	$sql_check = "SELECT username "
				  . "FROM tbl_user "
				  . "WHERE username LIKE :checkUserName";
	
	//prepare
	$sql_check = $pdo->prepare($sql_check);
	
	//sanitize
	$checkUserName = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	
	//bind
	$sql_check->bindparam(":checkUserName",$checkUserName);
	
	//execute
	$sql_check->execute();
	
	//if username already exists
	if($sql_check->rowCount() > 0)
	{
		unset($_POST);
		$_SESSION['ErrorMessage'] = "*** That username is already in use ***";
		header("Location: errorMessage.php");
		exit();
	}

	//if it does not already exist, insert it
	//create the sql statement
	$sql_stmt = "INSERT INTO tbl_user("
				. "firstname, lastname, address, city, state, zip, email, username, password, info )"
				. "VALUES "
				. "(:firstname, :lastname, :address, :city, :state, :zip, :email, :username, :password, :info)";
	
	//prepare
	$sql_stmt = $pdo->prepare($sql_stmt);
	
	//sanitize
	$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
	$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
	$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
	$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
	$state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
	$zip = filter_var($_POST['zip'], FILTER_SANITIZE_NUMBER_INT);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$info = filter_var($_POST['info'], FILTER_SANITIZE_NUMBER_INT);
	//$info = $_POST['info'];
	
	//password
	$password = password_hash($pwd, PASSWORD_DEFAULT);
	
	//BIND
	$sql_stmt->bindparam(":firstname",$firstname);
	$sql_stmt->bindparam(":lastname",$lastname);
	$sql_stmt->bindparam(":address",$address);
	$sql_stmt->bindparam(":city",$city);
	$sql_stmt->bindparam(":state",$state);
	$sql_stmt->bindparam(":zip",$zip);
	$sql_stmt->bindparam(":email",$email);
	$sql_stmt->bindparam(":username",$username);
	$sql_stmt->bindparam(":password",$password);
	$sql_stmt->bindparam(":info",$info);
	
	//check for duplicate username using the database
	//where username is set to unique and we trap for the error
	try
	{
	//execute
	$sql_stmt->execute();
	
	header("Location: confirmation.php");
	
	}
	catch(PDOException $e)
	{
		
		if($e->getCode() == 23000)
		{
			$_SESSION['ErrorMessage'] = "*** That username is a duplicate ***";
			
		}
		else
		{
			$_SESSION['ErrorMessage'] = "There was an error";
		}
		
		header("Location: errorMessage.php");
		
	}
	catch(Exception $e)
	{
		$_SESSION['ErrorMessage'] = "Error -- There was an error";
		header("Location: errorMessage.php");
	}
	
	
	
}

?>

<html>

<head>
<title>Create Account</title>

<!-- links stylesheet and print stylesheet -->
<link rel="stylesheet" href="styles.css" media="screen">

</head>

<body>

<header> <h1>Kalispell Candy Shoppe</h1> </header>
<br>
<h2>Create an Account</h2>

<div id="create_account">
<form method="POST" action="create_account.php">
	<table class="atable">
		<tr>
			<td>First Name:&nbsp;&nbsp;</td>
			<td><input type="text" name="firstname" value="Sally" size="25" required></td>
		</tr>
		<tr>
			<td>Last Name:&nbsp;&nbsp;</td>
			<td><input type="text" name="lastname" value="Sweet" size="25" required></td>
		</tr>
		<tr>
			<td>Address:&nbsp;&nbsp;</td>
			<td><input type="text" name="address" value="1111 1st Ave" size="25" required></td>
		</tr>
		<tr>
			<td>City:&nbsp;&nbsp;</td>
			<td><input type="text" name="city" value="Candyland" size="25" required></td>
		</tr>
		<tr>
			<td>State:&nbsp;&nbsp;</td>
			<td><input type="text" name="state" value="MT" size="25" required></td>
		</tr>
		<tr>
			<td>Zip:&nbsp;&nbsp;</td>
			<td><input type="text" name="zip" value="77777" size="25" required></td>
		</tr>
		<tr>
			<td>Email:&nbsp;&nbsp;</td>
			<td><input type="text" name="email" value="ssweet@candymail.com" size="25" required></td>
		</tr>
		<tr>
			<td>Username:&nbsp;&nbsp;</td>
			<td><input type="text" name="username" value="ssweet" size="25" required></td>
		</tr>
		<tr>
			<td>Password:&nbsp;&nbsp;</td>
			<td><input type="password" name="password" value="jello" size="25" required></td>
		</tr>
		<tr>
			<td colspan="2"><br>
			<input type="checkbox" id="info" name="info" value="1" checked="checked">
			<label for="info"> I would like to request more information</label>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="accountbtn1"><br><input class="accountbtn2" type="submit" value="Create Account"></td>
		</tr>
	
	</table>

</form>
</div>

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