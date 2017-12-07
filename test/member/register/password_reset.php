<?php
	include('../../config/database.php');

	$re_mb_id = $_POST['re_mb_id'];
	$hashed_pw = trim($_POST['re_mb_password_re']) . $salt;

	$sql = "UPDATE member SET mb_password = '$hashed_pw' WHERE mb_id = '$re_mb_id'";
	
	if ($conn->query($sql) === TRUE) {
	    // echo "New record updated successfully";
		header("Location: http://test.hackers.com" , true, 301);
		// die();
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>