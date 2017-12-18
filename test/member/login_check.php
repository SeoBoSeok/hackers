<?php

	// if(!isset($_POST['user_id']) || !isset($_POST['user_pw'])) exit;
	
	include('../config/database.php');
	session_start();

	$r_url = $_POST['url'];

	$user_id = trim($_POST['user_id']);
	$hashed_pw = trim($_POST['user_pw']) . $salt;
	$user_pw = hash('sha256', $hashed_pw);

	$sql = "SELECT mb_id, mb_name, mb_level FROM member WHERE mb_id = '$user_id' and mb_password = '$user_pw'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {

			// echo 'success';

			$_SESSION['mb_id'] = $row['mb_id'];
			$_SESSION['mb_name'] = $row['mb_name'];
			$_SESSION['mb_level'] = $row['mb_level'];
		}

		header("Location: ".$r_url, true, 301);

	} else {

		echo '비밀번호 오류';
    	echo false;
    	
	}

	$conn->close();

?>