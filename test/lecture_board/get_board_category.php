<?php

	include_once('../config/database.php');

	$bo_table = $_POST['cat'];

	// echo $bo_table;

	$sql = "SELECT bocategorylist FROM hac_board WHERE botable = '$bo_table'";

	// print_r($sql);

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
		// $_SESSION['mb_id'] = $row['name'];
		while($row = $result->fetch_assoc()) {
			// echo "id: " . $row['mb_id'] . "<br>";
			// $bo_table[] = $row['botable'];
			// $bo_category[] = $row['bocategorylist'];
			// $bo_info[] = $row;
			print_r($row['bocategorylist']);
			return $row['bocategorylist'];
		}

	} else {

    	echo "0 results";
    	
	}

	$conn->close();

?>