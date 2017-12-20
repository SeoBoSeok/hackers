<?php

	include_once('../../config/database.php');

	$check_id = trim($_POST['c_id']);
    $check_name = trim($_POST['c_name']);
    $check_hp = trim($_POST['c_hp']);

 	// if (password_verify($passwordFromPost, $hashedPasswordFromDB)) {
	//     echo 'Password is valid!';
	// } else {
	//     echo 'Invalid password.';
	// }

	$sql = "SELECT mb_id FROM member WHERE mb_id = '$check_id' and mb_name = '$check_name'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
    	while($row = $result->fetch_assoc()) {
        	echo true;
    	}
	} else {
    	echo false;
	}

	$conn->close();