<?php
	include('../../config/database.php');

	$re_mb_id = $_POST['re_mb_id'];
	$hashed_pw = trim($_POST['re_mb_password_re']) . $salt;

?>