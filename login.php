<?php

//Laura Mills Nelson
//Final Project
//Web Programming, CSCI 210, Sect. 01
//11/14/2020


//login.php


require 'dbconnect.php';


//warnings are not errors
//the following turns off warnings
//https://www.php.net/manual/en/function.error-reporting.php

 error_reporting(0);


if(isset($_POST['user']))
{
	
	try
	{
	$sql_login = "SELECT username, password ".
			  "FROM tbl_user ".
			  "WHERE username = :username ";
			  
	//prepare
	$sql_login = $pdo->prepare($sql_login);
			  
	//sanitize		  
	$username = filter_var($_POST['user'], FILTER_SANITIZE_STRING);

	//bind
	$sql_login->bindparam(":username", $username);
	
	//execute
	$sql_login->execute();
	
	$row = $sql_login->fetch();
	
	$hash = $row['password'];
	

	
		if(password_verify($_POST['pwd'],$hash))
		{
			$_SESSION['LoginStatus'] = true;
			
			//assign current user to session
			$_SESSION['CurrentUser'] = $_POST['user'];
			
			header("Location: memberPage1.php");
		}	
		else
		{
			
			$_SESSION['ErrorMessage'] = "*** Login is invalid ***";
			header("Location: errorMessage.php");
		}	
	}
	catch(Exception $e)
	{
		$_SESSION['ErrorMessage'] = "Login incorrect";
		header("Location: errorMessage.php");
	}
}

?>

<html>
<head>
<title>Login</title>

<!-- links stylesheet and print stylesheet -->
<link rel="stylesheet" href="styles.css" media="screen">

</head>
<body>

	<header> <h1>Kalispell Candy Shoppe</h1> </header>
	<br>
	<h2>Login to Your Account</h2>
	<form method="POST" action="login.php">
		<table class="atable">
			<tr>
				<td>Username:</td>
				<td><input type="text" value="" name="user" size="25"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" value="" name="pwd" size="25"></td>
			</tr>
			<tr>
				<td colspan="2" class="accountbtn1"><input class="accountbtn2" type="submit" value="Login"></td>
			</tr>
			
		</table>	
	</form>
	
	<p class="signin">Don't have an account? <strong><a href="create_account.php">Create an Account</a></strong> to view our products.</p>
	
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