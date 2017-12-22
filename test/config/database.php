<?php

	$servername = "localhost";
	$username = "root";
	$password = "localhost";
	$dbname = "test";
	$salt = 'hackers';

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn,"utf8");
	
	if ($conn->connect_errno) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	// mysqli_query("set names utf8");
?>