<?php
	include('../header.php');
	include ('../config/database.php');

	$bo_no = $_POST['no'];

	$sql = "SELECT lthumnail FROM lecture_board WHERE lid = '$bo_no'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {

			$thumb_location = $row['lthumnail'];

			unlink($_SERVER['DOCUMENT_ROOT'] . '/adm/data/' . $thumb_location);
		
		}
		
		$sql = "DELETE FROM lecture_board WHERE lid = '$bo_no' LIMIT 1";

		$result = $conn->query($sql);

	}

?>