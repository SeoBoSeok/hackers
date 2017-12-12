<?php

	include_once('../config/database.php');

	$bo_table = $_POST['cat'];

	// echo $bo_table;
	// print_r($bo_table);

	$sql = "SELECT lname FROM lecture_board WHERE lcat = '$bo_table'";

	// print_r($sql);

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
		// $_SESSION['mb_id'] = $row['name'];
		while($row = $result->fetch_assoc()) {
			// echo "id: " . $row['mb_id'] . "<br>";
			// $bo_table[] = $row['botable'];
			$bo_category[] = $row['lname'];
			// $bo_info[] = $row;
			// print_r($row['bocategorylist']);
			echo implode("|", $bo_category);
		}
		// return $bo_category[];

	} else {

    	echo "등록된 강좌가 없습니다.";
    	
	}

	$conn->close();

?>