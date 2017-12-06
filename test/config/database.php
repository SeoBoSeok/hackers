<?php

	$servername = "localhost";
	$username = "root";
	$password = "localhost";
	$dbname = "test";
	$salt = 'hackers';

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($con,"utf8");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

?>