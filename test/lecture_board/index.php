<?php
	switch ($_GET['mode']) {
		// case 'list':
		// 	include('./review_list.php');
		// 	break;

		case 'write':
			include('./review_update.php');
			break;

		case 'view':
			include('./review_detail.php');
			break;

		case 'modify':
			include('./review_modify.php');
			break;							
		
		default:
			include('./review_list.php');
			break;
	}
?>