<?php
	include_once('../header.php');
	include_once('../config/database.php');
	include_once('../common.php');

	$mode = $_GET['mode'];

	if ( $mode ) {

		include('./review_' . $mode . '.php');

	} else {

		include('./review_list.php');
		
	}

	include_once('../footer.php');
?>