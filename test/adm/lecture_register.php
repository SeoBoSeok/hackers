<?php
	include('../header.php');

	if ($is_adm) {

	} else {
		echo "<script>관리자 전용 페이지 입니다.</script>";
	}
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
	<form action="./lecture_update.php" method="post" enctype='multipart/form-data'>
		<div id="content" class="content">
			<div class="tit-box-h3">
				<h3 class="tit-h3">강의 등록</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<span>관리자</span>
					<strong>강의 등록</strong>
				</div>
			</div>

			<!-- <div class="search-info">
				<div class="search-form f-r">
					<select class="input-sel" style="width:158px">
						<option value="">분류</option>
					</select>
					<select class="input-sel" style="width:158px">
						<option value="">강의명</option>
						<option value="">작성자</option>
					</select>
					<input type="text" class="input-text" placeholder="강의명을 입력하세요." style="width:158px"/>
					<button type="button" class="btn-s-dark">검색</button>
				</div>
			</div> -->

			<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
				<caption class="hidden">강의정보</caption>
				<colgroup>
					<col style="width:15%"/>
					<col style="*"/>
				</colgroup>

				<tbody>
					<tr>
						<th scope="col"><span class="icons">*</span>강의명</th>
						<td><input type="text" class="input-text" name="lname" style="width:302px"/></td>
					</tr>
					<tr>
						<th scope="col"><span class="icons">*</span>분류</th>
						<td><input type="text" class="input-text" name="lcat" style="width:302px" placeholder="영문자로 시작하는 4~15자의 영문소문자, 숫자"/></td>
					</tr>
					<tr>
						<th scope="col"><span class="icons">*</span>강의 제목</th>
						<td><input type="text" class="input-text" name="ltitle" style="width:302px" placeholder="8-15자의 영문자/숫자 혼합"/></td>
					</tr>
					<tr>
						<th scope="col"><span class="icons">*</span>강사</th>
						<td><input type="text" class="input-text" name="lauthor" style="width:302px"/></td>
					</tr>
					<tr>
						<th scope="col"><span class="icons">*</span>난이도</th>
						<td><input type="text" class="input-text" name="lhard" style="width:302px"/></td>
					</tr>
					<tr>
						<th scope="col"><span class="icons">*</span>시간</th>
						<td><input type="number" class="input-text" name="titme" style="width:302px"/></td>
					</tr>
					<tr>
						<th scope="col"><span class="icons">*</span>강의 상세설명</th>
						<td><input type="text" class="input-text" name="ldescription" style="width:302px"/></td>
					</tr>
					<tr>
						<th scope="col"><span class="icons">*</span>썸네일 이미지</th>
						<td><input type="file" class="input-text" name="lthumbnail" style="width:302px"/></td>
					</tr>
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

			<div class="box-btn t-r">
				<input type="submit" class="btn-m" value="강의 등록">
			</div>
		</div>
	</form>
</div>

<?php
	include('../footer.php');
?>