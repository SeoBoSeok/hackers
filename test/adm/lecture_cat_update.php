<?php
	include ('../config/database.php');

	$category = $_POST['name'];

	$sql = "DELETE FROM hac_board WHERE botable = '$category'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		echo true;

	} else {

    	echo false;
    	
	}

?>