<?php

	include_once('../../config/database.php');

	// $check_id = $_POST['name'];
    $mb_name = $_POST['mb_name'];
    $mb_birth = $_POST['mb_birth'];
    $mb_email = $_POST['mb_email'];

	// echo $check_id;

	$sql = "SELECT mb_name, mb_email FROM member WHERE mb_name = '$mb_name' and mb_email = '$mb_email'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
    	while($row = $result->fetch_assoc()) {
        	// echo "id: " . $row["name"]. "<br>";
        	echo true;
    	}

    	// echo true;

	} else {
    	// echo "0 results";
    	echo false;
	}

	$conn->close();