<?php
	include ('../config/database.php');

	$category = $_POST['name'];
	///print_r($category);

	$sql = "DELETE FROM hac_board WHERE botable = '$category'";

	$result = $conn->query($sql);

	// print_r($result);
	print_r($result->num_rows);

	if ($result->num_rows > 0) {

		echo true;

	} else {

    	echo false;
    	
	}

	print_r($total);
?>