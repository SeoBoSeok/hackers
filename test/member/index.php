<?php
	// include_once('../config/database.php');
	if ($_GET['mode']) {
		include_once('../header.php');
		if ( $_GET['mode'] == 'modify' ) {
			include_once ('./register_step03.php');
		} else {
			include_once('./register_' . $_GET['mode'] . '.php');
		}
		include_once('../footer.php');
	} else {
		include_once('login.php');
	}
?>