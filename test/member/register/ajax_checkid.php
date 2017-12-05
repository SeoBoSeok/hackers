<?php

	$servername = "localhost";
	$username = "root";
	$password = "localhost";
	$dbname = "test";

	$mb_id = trim($_POST['name']);

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT name FROM members WHERE name LIKE 'ggybbo'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
    	while($row = $result->fetch_assoc()) {
        // echo "id: " . $row["name"]. "<br>";
    		echo true;
    	}
	} else {
    	// echo "0 results";
    	echo false;
	}
	$conn->close();

	// $mb_id = trim($_POST['name']);

	// $id_list = array(
	// 	array("id"=>'1111', "tel"=>'1111'),
	// 	array("id"=>'2222', "tel"=>'2222'),
	// 	array("id"=>'3333', "tel"=>'3333'),
	// 	array("id"=>'4444', "tel"=>'4444'),
	// 	array("id"=>'5555', "tel"=>'5555'),
	// );

	$id_list = array(1111, 2222, "3333", "4444", "5555");

	if (isset($_POST['name'])) {

		echo in_array($mb_id, $id_list);

    }