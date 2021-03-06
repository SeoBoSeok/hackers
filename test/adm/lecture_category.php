<?php
	$sql = "SELECT * FROM hac_board";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$total[] = $row;
		}

	}
?>
</div>
<div id="container" class="container">
	<?php include_once('./lecture_board_sidemenu_adm.php');?>
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
				<a href="./?mode=cat_add" class="btn-m">분류 추가</a>
			</div>
		</div>
	<!-- </form> -->
</div>

<script type="text/javascript">
	
	$(document).ready(function(){
		$('.del_cat').click('on', function(){
			// alert(this.value);
			var agree = confirm('정말 삭제하시겠습니까');
			if(agree){
				$.ajax({
	                url: "./lecture_cat_update.php",
	                type: "POST",
	                data: { name : this.value },
	                // dataType: "json",
	                cache: false
	            }).done(function(response, data){
	            	if (data == 'success') {
	            		alert('삭제가 완료되었습니다.');
	            		location.reload();
	            	} else {
	            		alert('해당 분류가 등록되어 있지 않습니다.');
	            	}
	            });
			}
		});
	});

</script>