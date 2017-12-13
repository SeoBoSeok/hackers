<?php
	include('../header.php');
	include ('../config/database.php');

	$lecture_no = $_GET['no'];

	$sql = "SELECT * FROM lecture_board WHERE lid = '$lecture_no'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$total[] = $row;
		}

	} else {

    	echo "0 results";
    	
	}

	// print_r($total);

?>

<body>
<!-- skip nav -->
<div id="skip-nav">
<a href="#content">본문 바로가기</a>
</div>
<!-- //skip nav -->

<div id="wrap">
	<div id="header" class="header">
		
		<?php include_once('../gnu.php'); ?>
		<!-- gnu.php -->
		<?php include_once('../top_section.php'); ?>

	</div>
<div id="container" class="container">
	<?php include_once('../lecture_board/lecture_board_sidemenu_adm.php');?>

	<?php foreach ($total as $key => $value) { ?>
		<p>나의 번호 : <?=$value['lid']?></p>
		<p><?=$value['lname']?></p>
		<p><?=$value['lcat']?></p>
		<p><?=$value['ltitle']?></p>
		<p><?=$value['lauthor']?></p>
		<p><?=$value['lhard']?></p>
		<p><?=$value['ldescription']?></p>
		<p>thumnail : <img src="<?=$value['lthumnail']?>"/></p>
	<?php } ?>

</div>
<?php
	include('../footer.php');
?>