<?php

	include('../header.php');
	include('../config/database.php');
	include_once('../common.php');

	if ( $_GET['mode'] ) {

		include('./lecture_' . $_GET['mode'] . '.php');

	} else {

		include('./lecture_list.php');
		
	}

	include('../footer.php');

?>