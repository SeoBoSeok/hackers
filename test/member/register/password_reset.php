<?php
	include('../../config/database.php');

	$re_mb_id = $_POST['re_mb_id'];

	$hashed_pw = trim($_POST['re_mb_password_re']) . $salt;
	$url = "http://test.hackers.com/member";

	$update_pass = hash('sha256', $hashed_pw);

	$sql = "UPDATE member SET mb_password = '$update_pass' WHERE mb_id = '$re_mb_id'";
	
	if ($conn->query($sql) === TRUE) {
	    // echo "New record updated successfully";
		echo "<script>alert('비밀번호가 성공적으로 변경되었습니다.');</script><meta http-equiv='refresh' content='1; url=http://test.hackers.com/member'>";
		
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>