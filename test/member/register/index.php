<?php
	include_once('../../header.php');
	include_once('../../config/database.php');

	$mode = $_GET['mode'];
	
	if ( $mode ) {
		include_once('./register_' . $mode . ".php");
		if ( $mode == 'modify' ) include_once ('./register_step03.php');
	} else {
		$mode = 'step01';
		include_once('./register_' . $mode . ".php");
	}

	include_once('../../footer.php');
?>