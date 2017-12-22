<?php

	include_once('../config/database.php');
	include_once('./common.php');

	$bo_table = $_POST['cat'];

	$sql = "SELECT lname FROM lecture_board WHERE lcat = '$bo_table'";

	$result = $conn->query($sql);

	$returnArray = array();

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
		
			$r_category[] = $row;
		
		}

		foreach ($r_category as $key => $value) {
			array_push($returnArray, $value['lname']);
		}

		echo json_encode($returnArray);

	}

	$conn->close();

?>