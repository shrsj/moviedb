<?php

///////// Database Details , add  here  ////
$servername = "localhost";
$username = "root";                     //  Login user id 
$password = "";                         //   Login password
$dbname = "movies";                   // Your database name


    /////////// End of Database Details //////


try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
		print 'Error: ' . $e->getMessage() . '<br />';
    	die();
}
