<?php

	include('../config/database.php');

	$cat_name = trim($_POST['cat_name']);
	$cat_detail = trim($_POST['cat_detail']);
	$cat_level = 1;
	$cat_time = date('Y-m-d');

	$sql = "INSERT INTO hac_board (botable, bosubject, bolevel, botime) VALUES ('$cat_name', '$cat_detail', '$cat_level', '$cat_time')";

	// $result = $conn->query($sql);
	// print_r($sql);

	if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
			header("Location: http://test.hackers.com/adm/lecture_category.php", true, 301);
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	$conn->close();
?>