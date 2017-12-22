<?php
	include_once('../header.php');
	include_once('../config/database.php');
	include_once('../common.php');

	if ( $_GET['mode'] ) {

		include('./review_' . $_GET['mode'] . '.php');

	} else {

		include('./review_list.php');
		
	}

	include_once('../footer.php');
?>