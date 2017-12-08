<?php
	include_once('../header.php');
	include_once('../config/database.php');

	$sql = "SELECT * FROM hac_board_write";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$bo_list[] = $row;
		}

	} else {

    	echo "0 results";
    	
	}

	print_r($bo_list);

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
		
		<div class="nav-section">
			<div class="inner p-r">
				<h1><a href="/"><img src="http://img.hackershrd.com/common/logo.png" alt="해커스 HRD LOGO" width="165" height="37"/></a></h1>
			</div>
			<?php include_once('../gnu.php'); ?>
			<div class="nav-sub-box">
				<div class="inner"><!-- <a href="#"><img src="/" alt="배너이미지" width="171" height="196"></a> --></div>
			</div>
		</div>
		<?php include_once('../top_section.php'); ?>
	</div>
<div id="container" class="container">
	<div id="nav-left" class="nav-left">
		<div class="nav-left-tit"> 
			<span>직무교육 안내</span>
		</div>
		<ul class="nav-left-lst">
			<li><a href="#">해커스 HRD 소개</a></li>
			<li><a href="#">사업주훈련</a></li>
			<li><a href="#">근로자카드</a></li>
			<li><a href="#">학습안내</a></li>
			<li class="on"><a href="#">수강후기</a></li>
		</ul>
	</div>

	<div id="content" class="content">
		<?php include_once('./lecture_board_sidemenu.php');?>
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
				<!-- set -->

				<tr class="bbs-sbj">
					<td><span class="txt-icon-line"><em>BEST</em></span></td>
					<td>CS</td>
					<td>
						<a href="#">
							<span class="tc-gray ellipsis_line">수강 강의명 : Beyond Trouble, 조직을 감동시키는 관계의 기술</span>
							<strong class="ellipsis_line">절대 후회 없는 강의 예요!</strong>
						</a>
					</td>
					<td>
						<span class="star-rating">
							<span class="star-inner" style="width:60%"></span>
						</span>
					</td>
					<td class="last">이름</td>
				</tr>
					
				<?php foreach ($bo_list as $key => $value) { ?>
				<tr class="bbs-sbj">
					<td>
						<?=$key+1;?>
					</td>
					<td>
						<?=$value['bocategory'];?>
					</td>
					<td>
						<a href="#">
							<span class="tc-gray ellipsis_line">수강 강의명 : <?=$value['writesubject'];?></span>
							<strong class="ellipsis_line"><?=$value['writecontents']?></strong>
						</a>	
					</td>
					<td>
						<span class="star-rating">
							<span class="star-inner" style='width:<?=$value['lecturestar']*20?>%'></span>
						</span>
					</td>
					<td><?=$value['writename'];?></td>
				</tr>
				<?php } ?>
				<!-- //set -->
			</tbody>
		</table>

		<div class="box-paging">
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
		</div>

		<div class="box-btn t-r">
			<a href="#" class="btn-m">후기 작성</a>
		</div>
	</div>
</div>
<?php
	include_once('../footer.php');
?>