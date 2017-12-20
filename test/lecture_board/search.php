<?php

	include_once('../header.php');
	include_once('../config/database.php');

	$cat1 = trim($_POST['str_cat1']);
	$cat2 = trim($_POST['str_cat2']);
	$cat3 = trim($_POST['str_word']);

	$sql = "SELECT * FROM hac_board_write WHERE";

	if($cat1)
		$sql .= " botable = '$cat1'";

	if ($cat2 == '강의명') {
		$sql .= " AND writesubject LIKE '%$cat3%'";
	} else {
		$sql .= " AND writername = '$cat3'";
	}

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$bo_list[] = $row;
		}

	} else {
    	
	}

	$sql = "SELECT * FROM hac_board";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$bo_detail_category[] = $row;
		}

	} else {
    	
	}

	$conn->close();

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
	<?php include_once('./lecture_board_sidemenu.php');?>
	<div id="content" class="content">
		<div class="tit-box-h3">
			<h3 class="tit-h3">검색결과</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>직무교육 안내</span>
				<strong>검색결과</strong>
			</div>
		</div>

		<div class="search-info">
			<form action="./search.php" method="post">
				<div class="search-form f-r">
					<select class="input-sel" name="str_cat1" style="width:158px">
						<?php foreach ($bo_detail_category as $key => $value) { ?>
							<option value="<?=$value['botable'];?>"><?=$value['botable'];?></option>
						<?php } ?>
					</select>
					<select class="input-sel" name="str_cat2" style="width:158px">
						<option value="강의명">강의명</option>
						<option value="작성자">작성자</option>
					</select>
					<input type="text" class="input-text" name="str_word" placeholder="강의명을 입력하세요." style="width:158px"/>
					<input type="submit" class="btn-s-dark" value="검색">
				</div>
			</form>
		</div>

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
			<caption class="hidden">수강후기</caption>
			<colgroup>
				<col style="width:8%"/>
				<col style="width:8%"/>
				<col style="*"/>
				<col style="width:15%"/>
				<col style="width:12%"/>
			</colgroup>

			<thead>
				<tr>
					<th scope="col">번호</th>
					<th scope="col">분류</th>
					<th scope="col">제목</th>
					<th scope="col">강좌만족도</th>
					<th scope="col">작성자</th>
				</tr>
			</thead>
	 
			<tbody>
				<?php foreach ($bo_list as $key => $value) { ?>
				<tr class="bbs-sbj">
					<td>
						<!-- <?=$value['writeid'];?> -->
						<?=$key+$offset+1?>
					</td>
					<td>
						<?=$value['botable'];?>
					</td>
					<td>
						<a href="/lecture_board/?mode=view&no=<?=$value['writeid']?>">
							<span class="tc-gray ellipsis_line">수강 강의명 : <?=$value['writesubject'];?></span>
							<strong class="ellipsis_line"><?=$value['writecontents']?></strong>
						</a>	
					</td>
					<td>
						<span class="star-rating">
							<span class="star-inner" style='width:<?=$value['lecturestar']*20?>%'></span>
						</span>
					</td>
					<td><?=$value['writername'];?></td>
				</tr>
				<?php } ?>
				<!-- //set -->
			</tbody>

		</table>

		<?php
			if(empty($bo_list))
				echo "<div style='width:800px;height:300px;line-height:300px;text-align:center;font-size: 2rem;'>검색 결과가 없습니다.</div>"
		?>

<!-- 		<div class="box-paging">
			<a href="#"><i class="icon-first"><span class="hidden">첫페이지</span></i></a>
			<a href="#"><i class="icon-prev"><span class="hidden">이전페이지</span></i></a>
			<a href="#" class="active">1</a>
			<a href="#">2</a>
			<a href="#">3</a>
			<a href="#">4</a>
			<a href="#">5</a>
			<a href="#">6</a>
			<a href="#"><i class="icon-next"><span class="hidden">다음페이지</span></i></a>
			<a href="#"><i class="icon-last"><span class="hidden">마지막페이지</span></i></a>
		</div> -->
	</div>
</div>
<?php
	include_once('../footer.php');
?>
