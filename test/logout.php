<?php
	if($_POST['logout_key']=='true'){
		// echo $_POST['logout_key'];
		session_start();
		session_destroy();
		session_unset();
		echo true;
	} else {
		echo false;
	}