<?php

	include('../../config/database.php');

	$hashed_pw = trim($_POST['mb_password_re']) . $salt;

	$db_mb_name = $_POST['mb_name'];
	$db_mb_id = $_POST['mb_id'];
	$db_mb_password = hash('sha256', $hashed_pw);
	$db_mb_hp = $_POST['mb_hp'];
	$db_mb_tel = $_POST['mb_tel'];
	$db_mb_email = $_POST['mb_email'];
	$db_mb_postcode = $_POST['postcode'];
	$db_mb_address = $_POST['addr_basic'];
	$db_mb_sms = $_POST['sms'];
	$db_mb_mail = $_POST['mail'];
	$db_mb_datetime = date("Y-m-d H:i:s");

	$sql = "INSERT INTO member (mb_id, mb_name, mb_email, mb_password, mb_hp, mb_tel, mb_add_jibun, mb_sms, mb_mailing, mb_datetime )
	VALUES ('$db_mb_id', '$db_mb_name', '$db_mb_email', '$db_mb_password','$db_mb_hp', '$db_mb_tel', '$db_mb_address', '$db_mb_sms', '$db_mb_mail', '$db_mb_datetime')";

	if ($conn->query($sql) === TRUE) {
	    // echo "New record created successfully";
		header("Location: http://test.hackers.com/member/register/?mode=complete", true, 301);
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();



?>