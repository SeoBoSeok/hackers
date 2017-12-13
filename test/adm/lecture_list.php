<?php
	include('../header.php');
	include ('../config/database.php');

	if($_SESSION['mb_level'] < 10) {
		echo '<script>window.location.href="'. $home_url . '"</script>';
		header('Location: ' . $home_url);
	}
	
	$sql = "SELECT * FROM lecture_board";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$total[] = $row;
		}

	} else {

    	// echo "0 results";
    	
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
	<div id="content" class="content">
			<div class="tit-box-h3">
				<h3 class="tit-h3">강의 목록</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<span>관리자</span>
					<strong>강의 목록</strong>
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
					<th scope="col">번호</th>
					<th scope="col">분류</th>
					<th scope="col">제목</th>
					<th scope="col">강좌난이도</th>
					<th scope="col">강사명</th>
					<th scope="col">thumnail</th>
				</tr>
			</thead>

				<tbody>
				<!-- set -->
					<?php foreach ($total as $key => $value) { ?>
					<tr class="bbs-sbj">
						<td><?=$key?></td>
						<td><?=$value['lcat']?></td>
						<td>
							<a href="lecture_detail.php?no=<?=$value['lid']?>">
								<span class="tc-gray ellipsis_line">수강 강의명 : <?=$value['ltitle']?></span>
								<strong class="ellipsis_line"><?=$value['ldescription']?></strong>
							</a>
						</td>
						<td>
							<?=$value['lhard']?>
						</td>
						<td>
							<?=$value['lauthor']?>
						</td>
						<td class="last"><?=$value['lthumnail']?></td>
					</tr>
					<?php } ?>
					<!-- //set -->
				</tbody>
			</table>
			<div class="box-btn t-r">
				<!-- <input type="submit" class="btn-m" value="강의 등록"> -->
				<a href="./lecture_register.php" class="btn-m">강의 등록</a>
			</div>
		</div>
	</form>
</div>

<?php
	include('../footer.php');
?>