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
	<form action="./lecture_add_update.php" method="post" enctype='multipart/form-data'>
		<div id="content" class="content">
			<div class="tit-box-h3">
				<h3 class="tit-h3">새 분류 등록</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<span>관리자</span>
					<strong>새 분류 등록</strong>
				</div>
			</div>

			<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
				<caption class="hidden">강의정보</caption>
				<colgroup>
					<col style="width:15%"/>
					<col style="*"/>
				</colgroup>

				<thead>
					<tr>
						<th scope="col"><span class="icons">*</span>카테고리 명</th>
						<!-- <th scope="col"><span class="icons">*</span>카테고리 설명</th> -->
						<td><input type="text" name="cat_name" /></td>
					</tr>
				</thead>
	
				<tbody>
					<tr>
						<th scope="col"><span class="icons">*</span>카테고리 설명</th>
						<td><input type="text" name="cat_detail" /></td>
					</tr>
				</tbody>
			</table>

			<div class="box-btn t-r">
				<input type="submit" class="btn-m" value="분류 추가">
			</div>
		</div>
	</form>
</div>