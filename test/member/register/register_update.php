<?php

	include('../../config/database.php');

	$hashed_pw = trim($_POST['mb_password_re']) . $salt;

	print_r($_POST);

	$db_mb_name = $_POST['mb_name'];
	$db_mb_id = $_POST['mb_id'];
	$db_mb_password = hash('sha256', $hashed_pw);
	$db_mb_hp = $_POST['mb_hp'];
	$db_mb_tel = $_POST['mb_tel'];
	$db_mb_email = $_POST['mb_email'];
	$db_mb_postcode = $_POST['mb_postcode'];
	$db_mb_add1 = $_POST['mb_add1'];
	$db_mb_add2 = $_POST['mb_add2'];
	$db_mb_agree1 = $_POST['agree1'];
	$db_mb_agree2 = $_POST['agree2'];
	$db_mb_auth_hp = $_POST['auth_hp'];
	$db_mb_address = $_POST['mb_add1'] . $_POST['mb_add2'];
	$db_mb_sms = $_POST['sms'];
	$db_mb_mailing = $_POST['mailing'];
	$db_mb_datetime = date("Y-m-d H:i:s");

	// echo $db_mb_postcode;

	$r_url = $_POST['url'];
	// echo $r_url;

	if($_POST['w'] == 'W'){
		$sql = "INSERT INTO member (mb_id, mb_name, mb_email, mb_password, mb_hp, mb_tel, mb_postcode, mb_add1, mb_add2, mb_add_jibun, mb_sms, mb_mailing, mb_hp_certify, mb_datetime, mb_agree1, mb_agree2 )
	VALUES ('$db_mb_id', '$db_mb_name', '$db_mb_email', '$db_mb_password','$db_mb_hp', '$db_mb_tel', '$db_mb_postcode', '$db_mb_add1', '$db_mb_add2', '$db_mb_address', '$db_mb_sms', '$db_mb_mailing', '$db_mb_auth_hp', '$db_mb_datetime', '$db_mb_agree1', '$db_mb_agree2')";
		if ($conn->query($sql) === TRUE) {
		    // echo "New record created successfully";
			header("Location: http://test.hackers.com/member/register/?mode=complete", true, 301);
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
		$sql = "UPDATE member SET mb_name = '$db_mb_name', mb_tel = '$db_mb_tel', mb_postcode = '$db_mb_postcode', mb_add1 = '$db_mb_add1', mb_add2 = '$db_mb_add2', mb_hp_certify = '$db_mb_auth_hp', mb_sms = '$db_mb_sms', mb_mailing = '$db_mb_mailing' WHERE mb_id = '$db_mb_id'";
		if ($conn->query($sql) === TRUE) {
		    // echo "New record updated successfully";
			header("Location: ".$r_url , true, 301);
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	$conn->close();

?>