<?
 $uploads_dir = '../data';
 $file_name = $_FILES['upload_file']['name'];
 $tmp_file = $_FILES['upload_file']['tmp_name'];
 $tmp_file = $_FILES['upload_file']['tmp_name'];
 $file_url = '../data/'.$file_name;
 $file_size = $_FILES['upload_file']['size'];

if(isset($_FILES['uploaded_file'])) {
	    $errors     = array();
	    $maxsize    = 2097152;
	    $acceptable = array(
	        'application/pdf',
	        'image/jpeg',
	        'image/jpg',
	        'image/gif',
	        'image/png'
	    );

	    if(($_FILES['uploaded_file']['size'] >= $maxsize) || ($_FILES["uploaded_file"]["size"] == 0)) {
	        $errors[] = 'File too large. File must be less than 2 megabytes.';
	    }

	    if(!in_array($_FILES['uploaded_file']['type'], $acceptable)) && (!empty($_FILES["uploaded_file"]["type"]))) {
	    $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
	}

	if(count($errors) === 0) {
	    move_uploaded_file($tmp_file, "$uploads_dir/$file_name")
	} else {
	    foreach($errors as $error) {
	        echo '<script>alert("'.$error.'");</script>';
	    }

	    die(); //Ensure no more processing is done
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Daum에디터 - 파일 첨부</title> 
<script src="./js/popup.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="./css/popup.css" type="text/css"  charset="utf-8"/>
<script type="text/javascript">
// <![CDATA[
 
 function initUploader(){
     var _opener = PopupUtil.getOpener();
     if (!_opener) {
         alert('잘못된 경로로 접근하셨습니다.');
         return;
     }
     
     var _attacher = getAttacher('file', _opener);
     registerAction(_attacher);

  if (typeof(execAttach) == 'undefined') { //Virtual Function
         return;
     }
  
  var _mockdata = {
   'attachurl': 'http://test.hackers.com/lecture_board/data/<?php echo $file_name; ?>',
   'filename': '<?php echo $file_name; ?>',
   'filesize': <?php echo $file_size; ?>
  };
  parent.execAttach(_mockdata);
  closeWindow();
 }
// ]]>
</script>
</head>
<body onload="initUploader();">
</body>
</html>