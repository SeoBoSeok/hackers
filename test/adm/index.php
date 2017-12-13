<?php

	session_start();

	switch ($_GET['mode']) {
		// case 'list':
		// 	include('./review_list.php');
		// 	break;

		// case 'register':
		// 	include('./lecture_register.php');
		// 	break;

		// case 'view':
		// 	include('./review_view.php');
		// 	break;

		// case 'modify':
		// 	include('./review_modify.php');
		// 	break;							
		
		default:
			include('./lecture_list.php');
			break;
	}

?>