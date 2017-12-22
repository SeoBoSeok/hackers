<?php
	
	include('../config/database.php');

	$review_mode = trim($_POST['mode']);
	$bo_name = trim($_POST['board_no']);

	$writerid = $_POST['mb_id'];
	$writername = $_POST['mb_name'];
	$writesubject = $_POST['review_title'];
	$writecontents = stripslashes($_POST['content']);
	$botable = $_POST['lecture_title'];
	$bocategory = $_POST['lecture_cat'];
	$lecturestar = $_POST['review_star'];

	$url = $_POST['url'];

	if ( $review_mode ){
		$sql = "UPDATE hac_board_write SET writername = '$writername', writesubject = '$writesubject', writecontents = '$writecontents', botable = '$botable', bocategory = '$bocategory', lecturestar = '$lecturestar' WHERE writeid = '$bo_name'";
	} else {
		$sql = "INSERT INTO hac_board_write (writerid, writername, writesubject, writecontents, botable, bocategory, lecturestar )
	VALUES ('$writerid', '$writername', '$writesubject', '$writecontents','$botable', '$bocategory', '$lecturestar')";
	}

	if ($conn->query($sql) === TRUE) {
	    // echo "New record created successfully";
		header("Location: http://test.hackers.com/lecture_board/?mode=list", true, 301);
	}
	
	$conn->close();

?>