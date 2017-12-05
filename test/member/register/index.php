<?php

	// if (!defined('_HACKERS_')) exit; // 개별 페이지 접근 불가

	// echo $_GET['mode'];
	
	switch ($_GET['mode']) {
		case 'step_01':
			include('./register_step01.php');
			break;

		case 'step_02':
			include('./register_step02.php');
			break;

		case 'step_03':
			include('./register_step03.php');
			break;

		case 'complete':
			include('./register_complete.php');
			break;									
		
		default:
			include('./register_step01.php');
			break;
	}

?>