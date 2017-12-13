<?php

	include ('../config/database.php');

	$lname = $_POST['lname'];
	$lcat = $_POST['lcat'];
	$ltitle = $_POST['ltitle'];
	$lauthor = $_POST['lauthor'];
	$lhard = $_POST['lhard'];
	$ltime = $_POST['ltime'];
	$ldescription = $_POST['ldescription'];
	$thiumnail = '';

	$uploaddir = $_SERVER['DOCUMENT_ROOT'] . "/data";

  define('_UPLOADPATH', 'data/');

 	if(isset($_FILES['lthumbnail'])){
      $errors= array();
      $file_name = $_FILES['lthumbnail']['name'];
      $file_size = $_FILES['lthumbnail']['size'];
      $file_tmp = $_FILES['lthumbnail']['tmp_name'];
      $tmp_name = basename($file_tmp);
      $target = time() . $file_name;

      $file_type = $_FILES['lthumbnail']['type'];
      $file_ext = strtolower(end(explode('.',$_FILES['lthumbnail']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true){
          move_uploaded_file($file_tmp, _UPLOADPATH . $target);

          $sql = "INSERT INTO lecture_board (lname, lcat, ltitle, lauthor, lhard, ltime, ldescription, lthumnail ) VALUES ('$lname', '$lcat', '$ltitle', '$lauthor', '$lhard', 'ltime', '$ldescription', '$target')";

    		$result = $conn->query($sql);

    		if ($result->num_rows > 0) {

    			while($row = $result->fetch_assoc()) {
    			
          }

    		} else {

    	    	// echo "0 results";
    	    	
    		}

  		  $conn->close();

        header('Location: ' . $home_url);

      } else {

      }
   }
?>