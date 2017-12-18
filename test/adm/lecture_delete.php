<?php
	include('../header.php');
	include ('../config/database.php');

	$bo_no = $_POST['no'];

	$sql = "DELETE FROM lecture_board WHERE lid = '$bo_no' LIMIT 1";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		// header('Location: ' . $home_url);
		echo true;

	} else {

    	// echo "0 results";
    	echo false;
    	
	}
?>