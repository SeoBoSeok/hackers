<?php
	
	include('../config/database.php');

	$writeid = $_POST['mb_id'];
	$writername = $_POST['mb_name'];
	$writesubject = $_POST['review_title'];
	$writecontents = stripslashes($_POST['content']);
	// echo $writecontents;
	$botable = $_POST['lecture_title'];
	$bocategory = $_POST['lecture_cat'];
	$lecturestar = $_POST['review_star'];

	$url = $_POST['url'];

	// print_r($_POST);

	// echo $_POST['lecture_cat'];
	// echo $_POST['review_title'];
	// echo $_POST['review_star'];
	// echo $_POST['content'];
	// echo $_POST['lecture_content'];
	// print_r($_POST['content']);
	// echo $_POST['mb_id'];

	$sql = "INSERT INTO hac_board_write (writerid, writername, writesubject, writecontents, botable, bocategory, lecturestar )
	VALUES ('$writeid', '$writername', '$writesubject', '$writecontents','$botable', '$bocategory', '$lecturestar')";
		if ($conn->query($sql) === TRUE) {
		    // echo "New record created successfully";
			header("Location: http://test.hackers.com/lecture_board/?mode=list", true, 301);
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	$conn->close();


?>