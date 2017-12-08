<?php

	// if(!isset($_POST['user_id']) || !isset($_POST['user_pw'])) exit;
	
	include('../config/database.php');
	session_start();

	// echo hash('sha256', $_POST['user_pw']);
	// echo $salt;

	$r_url = $_POST['url'];

	$user_id = trim($_POST['user_id']);
	$hashed_pw = trim($_POST['user_pw']) . $salt;
	$user_pw = hash('sha256', $hashed_pw);

	// echo $user_pw;

	$sql = "SELECT mb_id FROM member WHERE mb_id = '$user_id' and mb_password = '$user_pw'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
		// $_SESSION['mb_id'] = $row['name'];
		while($row = $result->fetch_assoc()) {
			// echo "id: " . $row['mb_id'] . "<br>";
			$_SESSION['mb_id'] = $row['mb_id'];
		}
		header("Location: ".$r_url, true, 301);

	} else {

    	echo false;
    	
	}

	$conn->close();

?>