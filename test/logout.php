<?php
	if($_POST['logout_key']=='true'){
		session_start();
		session_destroy();
		session_unset();
		header('Location: ' . $home_url);
	} else {
		// echo false;
	}
?>