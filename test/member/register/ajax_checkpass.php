<?php

	include_once('../../config/database.php');

	$check_id = $_POST['c_id'];
    $check_name = $_POST['c_name'];

	// echo $check_id;

	$sql = "SELECT mb_id FROM member WHERE mb_id = '$check_id' and mb_name = '$check_name'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
    	while($row = $result->fetch_assoc()) {
        	// echo "id: " . $row["name"]. "<br>";
        	echo true;
    		// echo true;
    		// if ($row["name"] == $mb_id)
    		// 	echo true;
    	}

    	// echo true;

	} else {
    	// echo "0 results";
    	echo false;
	}

	$conn->close();