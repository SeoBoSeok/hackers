<?php

	$w_id = $_GET['no'];

	$sql = "SELECT * FROM hac_board_write WHERE writeid = '$w_id'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$bo_content = $row;
		}

	}

	$bo_content_q_subject = $bo_content['bocategory'];
	$bo_content_q_table =  $bo_content['botable'];

	$sql = "SELECT * FROM lecture_board WHERE lname='$bo_content_q_subject' AND lcat = '$bo_content_q_table'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$bo_detail = $row;
		}

	}

	$sql = "SELECT * FROM hac_board";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$bo_detail_category[] = $row;
		}

	}

	if($w_id)
		$sql = "UPDATE hac_board_write SET writehit = writehit + 1 where writeid = '$w_id'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$bo_detail_category[] = $row;
		}

	}

	$category = $_GET['category'];

	$sql = "SELECT COUNT(*) as count FROM hac_board_write";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$total = $row['count'];
		}

	}

	$page = 1;

	$sql = "SELECT * FROM hac_board_write";

	if($_GET['category'])
		$sql .= " WHERE bocategory = '$category'";

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

	}

	$conn->close();

?>
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

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs-view">
			<caption class="hidden">수강후기</caption>
			<colgroup>
				<col style="*"/>
				<col style="width:20%"/>
			</colgroup>
			<tbody>
				 <tr>
					<th scope="col"><?=$bo_content['writesubject']?></th>
					<th scope="col" class="user-id"><?=$bo_content['writername']?> | <?=$bo_content['writerid']?></th>
				 </tr>
				<tr>
					<td colspan="2">
						<div class="box-rating">
							<span class="tit_rating">강의만족도</span>
							<span class="star-rating">
								<span class="star-inner" style='width:<?=$bo_content["lecturestar"]*20?>%'></span>
							</span>
						</div>
						<?=$bo_content['writecontents']?>
					</td>
				</tr>
			</tbody>
		</table>
		
		
		<p class="mb15"><strong class="tc-brand fs16"><?=$bo_content['writerid']?>님의 수강하신 강의 정보</strong></p>
		
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-lecture-list">
			<caption class="hidden">강의정보</caption>
			<colgroup>
				<col style="width:166px"/>
				<col style="*"/>
				<col style="width:110px"/>
			</colgroup>
			<tbody>
				<tr>
					<td>
						<a href="#" class="sample-lecture">
							<img src="../adm/data/<?=$bo_detail['lthumnail']?>" alt="" width="144" height="101" />
							<span class="tc-brand">샘플강의 ▶</span>
						</a>
					</td>
					<td class="lecture-txt">
						<em class="tit mt10"><?=$bo_detail['ltitle']?></em>
						<p class="tc-gray mt20">강사: <?=$bo_detail['lauthor']?> | 학습난이도 : <?=$bo_detail['lhard']?> | 교육시간: <?=$bo_detail['ltime']?>시간 (<?=$bo_detail['ltime']?>강)</p>
					</td>
					<td class="t-r"><a href="#" class="btn-square-line">강의<br />상세</a></td>
				</tr>
			</tbody>
		</table>

		<div class="box-btn t-r">
			<a href="/lecture_board/?mode=list&page=1" class="btn-m-gray">목록</a>
			
			<?php if ($bo_content['writerid'] == $mb_id): ?>
				<a href="./?mode=modify&wmode=M&no=<?php echo $w_id; ?>" class="btn-m ml5">수정</a>
				<a href="#" class="btn-m-dark" id="btn_review_delete">삭제</a>
			<?php endif; ?>

		</div>

		<div class="search-info">
			<form action="./search.php" method="post">
				<div class="search-form f-r">
					<select class="input-sel" name="str_cat1" style="width:158px">
						<? foreach ($bo_detail_category as $key => $value) { ?>
							<option value="<?=$value['botable']?>"><?=$value['botable']?></option>
						<? } ?>
					</select>
					<select class="input-sel" name="str_cat2" style="width:158px">
						<option value="">강의명</option>
						<option value="">작성자</option>
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
						<?=$key+$offset+1?>
					</td>
					<td>
						<?=$value['botable'];?>
					</td>
					<td>
						<a href="?mode=view&no=<?=$value['writeid']?>">
							<span class="tc-gray ellipsis_line">수강 강의명 : <?=$value['writesubject'];?></span>
							<strong class="ellipsis_line"><?php echo strip_tags($value['writecontents']); ?></strong>
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

		<div class="box-paging">
			<a href="?mode=list&page=1"><i class="icon-first"><span class="hidden">첫페이지</span></i></a>
			<?php

				$num_of_rows = $result->num_rows;
				$num = $total / $page_result;
				$numoflimit = ceil($num);
				// print_r($numoflimit);
				$prev = $_GET['page'] - 1;
				$next = $_GET['page'] + 1;

				if(($_GET['page'] == 1) || ($_GET['page']=='')){
					echo '';
				} else {
					echo "<a href='?mode=list&page=$prev'><i class='icon-prev'><span class='hidden'>이전페이지</span></i></a>";
				}

				for ($i=1; $i<=$numoflimit; $i++){
					if ($i==$page) {
						echo "<a href='?mode=list&page=$i' class='active'>" . $i . "</a>";
					} else {
						echo "<a href='?mode=list&page=$i'>" . $i . "</a>";
					}
				}

				if(($numoflimit != 1) && ($numoflimit != $_GET['page'])) {
					echo "<a href='?mode=list&page=$next'><i class='icon-next'><span class='hidden'>다음페이지</span></i></a>";
				} else {
					echo "";
				}

				echo "<a href='?mode=list&page=$numoflimit'><i class='icon-last'><span class='hidden'>마지막페이지</span></i></a>";
			?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btn_review_delete').click(function(e){
			e.preventDefault();
			var delete_board = confirm('정말 삭제하시겠습니까?');
			if (delete_board) {
				$.ajax({
	                url: "./review_delete.php",
	                type: "POST",
	                data: { no : <?php echo $w_id; ?> },
	                cache: false
	            }).done(function(response){
	            	if (response) {
	            		alert('삭제가 완료되었습니다.');
	            		window.location.href = "http://test.hackers.com/lecture_board/?mode=list";
	            	} else {
	            		alert('해당 분류가 등록되어 있지 않습니다.');
	            	}
	            });
			} else {
				return;
			}
		});
	});
</script>