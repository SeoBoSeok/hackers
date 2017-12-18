<?php

	include_once('../header.php');
	include_once('../config/database.php');

	$bo_no = $_POST['no'];

	$sql = "DELETE FROM hac_board_write WHERE writeid = '$bo_no' LIMIT 1";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		header('Location: ' . $home_url);

	} else {

    	// echo "0 results";
    	
	}

?>