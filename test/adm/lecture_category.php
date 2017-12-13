<?php
	include('../header.php');
	include ('../config/database.php');

	$sql = "SELECT * FROM hac_board";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$total[] = $row;
		}

	} else {

    	echo "0 results";
    	
	}

	// print_r($total);
	// print_r($total[0]['lthumbnail']);
	// print_r($total['lthumnail']);

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
	<!-- <form action="#" method="post" enctype='multipart/form-data'> -->
		<div id="content" class="content">
			<div class="tit-box-h3">
				<h3 class="tit-h3">분류 등록</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<span>관리자</span>
					<strong>분류 등록</strong>
				</div>
			</div>

			<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
				<caption class="hidden">강의정보</caption>
				<colgroup>
					<col style="width:15%"/>
					<col style="*"/>
				</colgroup>
	
				<tbody>
				<?php foreach ($total as $key => $value) { ?>
					<tr>
						<th scope="col"><span class="icons">*</span><?=$value['botable']?></th>
						<td><button value="<?=$value['botable'];?>" class="del_cat">삭제하기</button></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>

			<div class="box-btn t-r">
				<a href="./lecture_cat_add.php" class="btn-m">분류 추가</a>
			</div>
		</div>
	<!-- </form> -->
</div>

<script type="text/javascript">
	
	$(document).ready(function(){
		$('.del_cat').click('on', function(){
			// alert(this.value);
			var agree = confirm('저말 삭제하시 겠습니까');
			if(agree){
				$.ajax({
	                url: "./lecture_cat_update.php",
	                type: "POST",
	                data: { name : this.value },
	                // dataType: "json",
	                cache: false
	            }).done(function(response){
	            	alert(response);
	            	if (response) {
	            		alert('삭제가 완료되었습니다.');
	            		window.reload();
	            	} else {
	            		alert('해당 분류가 등록되어 있지 않습니다.');
	            	}
	            });
			}
		});
	});

</script>

<?php
	include('../footer.php');
?>