<?php
	if($_POST['logout_key']=='true'){
		// echo $_POST['logout_key'];
		session_start();
		session_destroy();
		session_unset();
		echo true;
		// $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SESSION['PHP_SELF']) . '/index.php';
		header('Location: ' . $home_url);
	} else {
		echo false;
	}
?>