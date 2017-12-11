<?php

	include ('../config/database.php');

	// print_r($_FILES);
	// $lid = $_POST['lid'];
	// print_r($_POST);
	$lname = $_POST['lname'];
	$lcat = $_POST['lcat'];
	$ltitle = $_POST['ltitle'];
	$lauthor = $_POST['lauthor'];
	$lhard = $_POST['lhard'];
	$ltime = $_POST['ltime'];
	$ldescription = $_POST['ldescription'];
	$thiumnail = '';

	$uploaddir = $_SERVER['DOCUMENT_ROOT'] . "/data";
	// $target_file = $uploaddir . basename($_FILES["lthumbnail"]["name"]);

 	if(isset($_FILES['lthumbnail'])){
      $errors= array();
      $file_name = $_FILES['lthumbnail']['name'];
      $file_size = $_FILES['lthumbnail']['size'];
      $file_tmp = $_FILES['lthumbnail']['tmp_name'];
      $tmp_name = basename($file_tmp);
      $target_file = $uploaddir . basename($_FILES["lthumbnail"]["name"]);

      print_r($file_tmp);
      print_r($tmp_name);
      // print_r($tmp_name);
      $file_type = $_FILES['lthumbnail']['type'];
      $file_ext = strtolower(end(explode('.',$_FILES['lthumbnail']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      // $dir = $uploaddir.'/'.$tmp_name.'/'.$file_ext;
      // $upload = $uploaddir . $file_tmp;
      if(empty($errors)==true){
        move_uploaded_file($file_tmp, $target_file);

        $lthumnail = "$uploaddir" . "/" . "$file_name";
        // print_r($file_ext);
        // print_r($lthumnail);

        $sql = "INSERT INTO lecture_board (lname, lcat, ltitle, lauthor, lhard, ltime, ldescription, lthumnail ) VALUES ('$lname', '$lcat', '$ltitle', '$lauthor', '$lhard', 'ltime', '$ldescription', '$lthumnail')";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			while($row = $result->fetch_assoc()) {
				// $bo_list[] = $row;
			}

		} else {

	    	echo "0 results";
	    	
		}

		// print_r($bo_list);

		$conn->close();


         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>