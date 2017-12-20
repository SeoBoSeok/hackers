<?php

	$category = $_GET['category'];

	$sql = "SELECT COUNT(*) as count FROM hac_board_write";

	if($_GET['category'])
	$sql .= " WHERE bocategory = '$category'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$total = $row['count'];
		}

	} else {
    	
	}

	$page = 1;

	$sql = "SELECT * FROM hac_board_write";

	if($_GET['category'])
		$sql .= " WHERE botable = '$category'";

	$sql .= " ORDER BY writeid DESC ";

	$offset = 0;
	$page_result = 5;

	if ($_GET['page']) {

		$page = $_GET['page'];
		if ($page > 1) {
			$offset = ($page - 1) * $page_result;
		}

		$sql .= " LIMIT $offset, $page_result";
	} else {
		$sql .= " LIMIT 0, $page_result";
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
			$bo_category[] = $row;
		}

	} else {
    	
	}

	if(!isset($_GET['category']))
		$_cat = 'on';
	else
		$_cat = '';

	$sql = "SELECT * FROM hac_board_write";

	if($_GET['category'])
		$sql .= " WHERE botable = '$category'";

	$sql .= " ORDER BY writehit DESC LIMIT 3";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$hottest_list[] = $row;
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
			<h3 class="tit-h3">수강후기</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>직무교육 안내</span>
				<strong>수강후기</strong>
			</div>
		</div>

		<ul class="<?php echo "tab-list tab". (count($bo_category) + 1); ?>">
			<li class=<?php echo $_cat;?>><a href="./?mode=list&page=1">전체</a></li>
			<?php foreach ($bo_category as $key => $value) { ?>
				<li class="<?php echo ($value['botable'] == $_GET['category'])?"on":""; ?>"><a href="./?mode=list&page=1&category=<?=stripcslashes($value['botable'])?>"><?=$value['botable']?></a></li>
			<?php } ?>
		</ul>

		<div class="search-info">
			<form action="./search.php" method="post">
				<div class="search-form f-r">
					<select class="input-sel" name="str_cat1" style="width:158px">
						<?php foreach ($bo_category as $key => $value) { ?>
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
					<th width="35px">조회</th>
				</tr>
			</thead>
	 
			<tbody>

				<?php foreach ($hottest_list as $key => $value) { ?>
					<tr class="bbs-sbj">
						<td><span class="txt-icon-line"><em>BEST</em></span></td>
						<td><?=$value['botable'];?></td>
						<td>
							<a href="?mode=view&no=<?=$value['writeid']?>">
								<span class="tc-gray ellipsis_line">수강 강의명 : <?=$value['writesubject'];?></span>
								<strong class="ellipsis_line">
									<?php
										echo strip_tags($value['writecontents']);
									?>
								</strong>
							</a>
						</td>
						<td>
							<span class="star-rating">
								<span class="star-inner" style='width:<?=$value['lecturestar']*20?>%'></span>
							</span>
						</td>
						<td><?=$value['writername'];?></td>
						<td><?=$value['writehit'];?></td>
					</tr>
				<?php } ?>

				<?php
					if(empty($bo_list))
						echo "<p>검색 결과가 없습니다.</p>"
				?>
					
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
						<a href="?mode=view&no=<?=$value['writeid']?>">
							<span class="tc-gray ellipsis_line">수강 강의명 : <?=$value['writesubject'];?></span>
							<strong class="ellipsis_line">
								<?php
									echo strip_tags($value['writecontents']);
								?>
							</strong>
						</a>	
					</td>
					<td>
						<span class="star-rating">
							<span class="star-inner" style='width:<?=$value['lecturestar']*20?>%'></span>
						</span>
					</td>
					<td><?=$value['writername'];?></td>
					<td><?=$value['writehit'];?></td>
				</tr>
				<?php } ?>
				<!-- //set -->
			</tbody>
		</table>

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

		<div class="box-paging">
			<a href="?mode=list&page=1"><i class="icon-first"><span class="hidden">첫페이지</span></i></a>
			<!-- <a href="#"><i class="icon-prev"><span class="hidden">이전페이지</span></i></a> -->
			<?php

				// print_r(count($bo_list));
				$num_of_rows = count($bo_list);
				// print_r($total);
				$num = $total / $page_result;
				$numoflimit = ceil($num);
				// print_r($numoflimit);
				$prev = $_GET['page'] - 1;
				$next = $_GET['page'] + 1;

				if(($_GET['page'] == 1) || ($_GET['page']=='')){
					echo '';
				} else {
					echo "<a href='?mode=list&category=$category&page=$prev'><i class='icon-prev'><span class='hidden'>이전페이지</span></i></a>";
				}

				for ($i=1; $i<=$numoflimit; $i++){
					if ($i==$page) {
						echo "<a href='?mode=list&category=$category&page=$i' class='active'>" . $i . "</a>";
					} else {
						echo "<a href='?mode=list&category=$category&page=$i'>" . $i . "</a>";
					}
					// echo "<a href='mode=list&page='". $i ."'>" . $i . "</a>";
				}

				if(($numoflimit != 1) && ($numoflimit != $_GET['page'])) {
					echo "<a href='?mode=list&category=$category&page=$next'><i class='icon-next'><span class='hidden'>다음페이지</span></i></a>";
				} else {
					echo "";
				}

				echo "<a href='?mode=list&category=$category&page=$numoflimit'><i class='icon-last'><span class='hidden'>마지막페이지</span></i></a>";
			?>
			<!-- <a href="#"><i class="icon-next"><span class="hidden">다음페이지</span></i></a> -->
			<!-- <a href="#"><i class="icon-last"><span class="hidden">마지막페이지</span></i></a> -->
		</div>

		<div class="box-btn t-r">
			<a href="./?mode=write" class="btn-m">후기 작성</a>
		</div>
	</div>
</div>