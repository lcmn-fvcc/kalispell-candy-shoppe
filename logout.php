<?php

//Laura Mills Nelson
//Final Project
//Web Programming, CSCI 210, Sect. 01
//11/14/2020


//logout.php

	SESSION_START();
	
	unset($_SESSION['LoginStatus']);
	
	header("Location: logout_confirm.php");

?>