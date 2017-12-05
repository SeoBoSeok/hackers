<?php

	// error_reporting(E_ALL^ E_NOTICE); 
	// ini_set("display_errors", 1); 
	// @session_start(); 
	// $connect = mysql_connect('localhost', 'root', 'localhost'); 
	// mysql_query("set names 'euckr'"); 
	// mysql_select_db('test' ,$connect);


	// echo $_POST['mb_name'];
	// echo $_POST['mb_id'];
	// echo $_POST['mb_password'];
	// echo $_POST['mb_password_re'];
	// $hashresult = hash('sha256', $data)
	// echo hash('sha256', $_POST['mb_password']);
	// echo hash('sha256', $_POST['mb_password_re']);
	// echo $_POST['mb_hp'];
	// echo $_POST['mb_tel'];
	// echo $_POST['mb_email'];
	// echo $_POST['postcode'];
	// echo $_POST['addr_basic'];
	// echo $_POST['addr_detail'];
	// echo $_POST['sms'];
	// echo $_POST['mail'];

	$servername = "localhost";
	$username = "root";
	$password = "localhost";
	$dbname = "test";

	$db_mb_name = $_POST['mb_name'];
	$db_mb_id = $_POST['mb_id'];
	$db_mb_password = hash('sha256', $_POST['mb_password_re']);
	$db_mb_hp = $_POST['mb_hp'];
	$db_mb_tel = $_POST['mb_tel'];
	$db_mb_email = $_POST['mb_email'];
	$db_mb_postcode = $_POST['postcode'];
	$db_mb_address = $_POST['addr_basic'];
	$db_mb_sms = $_POST['sms'];
	$db_mb_mail = $_POST['mail'];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// $mysqli->set_charset("utf8");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO members (name, email, password, phone, tell, address, smscheck, mailcheck )
	VALUES ('$db_mb_name', '$db_mb_email', '$db_mb_password','$db_mb_hp', '$db_mb_tel', '$db_mb_address', '$db_mb_sms', '$db_mb_mail')";

	if ($conn->query($sql) === TRUE) {
	    // echo "New record created successfully";
		header("Location: http://test.hackers.com/member/register/?mode=complete", true, 301);
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>