<?php

	$servername = "localhost";
	$username = "root";
	$password = "localhost";
	$dbname = "test";
	$salt = 'hackers';

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn,"utf8");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// $connect = mysql_connect($servername, $username, $password); 
	mysql_query("set names utf8");
	// mysql_select_db('test' ,$connect);

?>