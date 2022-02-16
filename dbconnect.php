

<?php

//Laura Mills Nelson
//Final Project
//Web Programming, CSCI 210, Sect. 01
//11/14/2020 


//dbconnect.php


//Admin login info:
//Username: admin
//Password: AdminPassword123!


/*

The database creation SQL code is not included here because it is way too long with all of the images embedded. The SQL file is included in the assignment zip file.


*/



    try{
        
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=wp_finalproject",'lmillsnelson','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $dbstatus = "Good db connection";

}catch(PDOException  $e)
{
    $dbstatus = "DB connection failed<br>".
              $e->getMessage();
}
catch(Exception $e)
{
        $dbstatus = "DB connection failed<br>".
              $e->getMessage();
}

    SESSION_START();
	



?>
