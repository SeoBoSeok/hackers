<?php
	$subject = $_POST['subject'];
	$tmpfilename = $_FILES['upload_file']['tmp_name'];
	$filename = $_FILES['upload_file']['filename'];
	$filetype = $_FILES['upload_file']['type'];
	$filesize= $_FILES['upload_file']['size']
	$destination = "/data/" . $filename;
	$fileurl = "http://test.hackers.com/data/" . $filename;
	move_uploaded_file ( $tmpfilename, $destination );
	write_into_db_filemeta($filename, $desination, $filesize, $filetype, $fileurl); //업로드한 이름과 파일의 사이즈나 mime/type들을 읽어서 DB에 저장하는 사용자 함수 
?>
<script type="text/javascript">
// <![CDATA[
	initUploader();

	function done() {
		if (typeof(execAttach) == 'undefined') { //Virtual Function
	        return;
	    }
		
		var _mockdata = {
			'attachurl': '<?=$fileurl?>',
		    'filemime': '<?=$filetype?>',
		    'filename': '<?=$filename?>',
		    'filesize': '<?=$filesize?>'
		};
		execAttach(_mockdata);
		closeWindow();
	}

	function initUploader(){
	    var _opener = PopupUtil.getOpener();
	    if (!_opener) {
	        alert('잘못된 경로로 접근하셨습니다.');
	        return;
	    }
	    
	    var _attacher = getAttacher('file', _opener);
	    registerAction(_attacher);
	}
	
</script>