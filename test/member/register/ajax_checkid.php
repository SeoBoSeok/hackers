<?php

	include_once('../../config/database.php');

	$sql = "SELECT name FROM members WHERE name LIKE 'ggybbo'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
    	while($row = $result->fetch_assoc()) {
        	echo "id: " . $row["name"]. "<br>";
    		// echo true;
    		if ($row["name"] == $mb_id)
    			echo false;
    	}
	} else {
    	// echo "0 results";
    	echo true;
	}

	$conn->close();