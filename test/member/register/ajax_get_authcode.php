<?php

	include_once('../../config/database.php');

    $mb_name = $_POST['mb_name'];
    $mb_birth = $_POST['mb_birth'];
    $mb_email = $_POST['mb_email'];

	$sql = "SELECT mb_name, mb_email FROM member WHERE mb_name = '$mb_name' and mb_email = '$mb_email'";
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