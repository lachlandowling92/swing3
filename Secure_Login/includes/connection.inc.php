<?php

/*
 * File Name    : connection.php
* Author       : Jim Maguire
* Date Created : 18 April 2013
* Version      : 1.0
* Last Modified: 18 April 2013
* Description  : The database connection file for Tabletop Games R Us.
*/

// attempt to connect to the MySQL server
try
{
	// create object from PHP Data Object (pdo) class to establish connection to MySQL server
	$pdo = new PDO('mysql:host=localhost;dbname=people', 'root', 'TheReal5');

	// set pdo object's attribute that controls the error mode to throw exceptions
	// default mode is silent failure after establishing a successful connection
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// set character coding of database connection to UTF-8 (default is ISO-8859-1)
	// execute the SQL statement by using the pdo object's exec() method and the arrow notation
	$pdo->exec('SET NAMES "utf8"');
}

// what to do if connection fails
catch (PDOException $e) // catch pdo exception object and store as $e
{
	// create error message with exception details
	echo 'Unable to connect to the database server: ' .$e->getMessage();

	// stop php script and controller from continuing
	exit();
}
?>