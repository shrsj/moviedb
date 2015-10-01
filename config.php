<?php

/* Database Configuration file*/

$servername = "localhost";				
$username = "root";                     //  Login user id 
$password = "";                         //   Login password
$dbname = "movies";                   // Your database name


/*****End of Database Details****************/
            
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
	if (!$conn) {
       	die("Connection failed: " . mysqli_connect_error());
   }
   else {
   	echo '';
   }

$conn1 = mysql_connect($servername, $username, $password) or die("Connection failed..!!!");
mysql_select_db($dbname, $conn1) or die("Error on database connection");