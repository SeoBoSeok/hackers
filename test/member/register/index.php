<?php
	
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

		case 'modify':
			include('./register_step03.php');
			break;

		case 'find_id':
			include('./find_userid.php');
			break;

		case 'find_pass':
			include('./find_password.php');
			break;

		case 'complete':
			include('./register_complete.php');
			break;								
		
		default:
			include('./register_step01.php');
			break;
	}

?>