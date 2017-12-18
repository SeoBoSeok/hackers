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
<!-- 		<p>나의 번호 : <?=$value['lid']?></p>
		<p><?=$value['lname']?></p>
		<p><?=$value['lcat']?></p>
		<p><?=$value['ltitle']?></p>
		<p><?=$value['lauthor']?></p>
		<p><?=$value['lhard']?></p>
		<p><?=$value['ldescription']?></p>
		<p>thumnail : <img src="/adm/data/<?=$value['lthumnail']?>"/></p> -->
	<?php } ?>
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

		<thead>
			
		</thead>

		<tbody>
		<?php foreach ($total as $key => $value) { ?>
			<tr>
				<th scope="col">등록번호</th>
				<td><?=$value['lid']?></td>
			</tr>
			<tr>
				<th scope="col">강의명</th>
				<td><?=$value['lname']?></td>
			</tr>
			<tr>
				<th scope="col">강의 카테고리</th>
				<td><?=$value['lcat']?></td>
			</tr>
			<tr>
				<th scope="col">강의 상세 제목</th>
				<td><?=$value['ltitle']?></td>
			</tr>
			<tr>
				<th scope="col">강사명</th>
				<td><?=$value['lauthor']?></td>
			</tr>
			<tr>
				<th scope="col">강의 난이도</th>
				<td><?=$value['lhard']?></td>
			</tr>
			<tr>
				<th scope="col">강의 설명</th>
				<td><?=$value['ldescription']?></td>
			</tr>
			<tr>
				<th scope="col">강의 이미지</th>
				<td>
					<div style="width:300px; height: 250px; background: url('/adm/data/<?=$value["lthumnail"]?>'); background-position: center center; background-repeat: no-repeat; background-size: contain;"></div>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<div class="box-btn t-r">
		<a href="/adm/lecture_list.php" class="btn-m-gray">목록</a>
		<a href="#" class="btn-m ml5" id="remove_lecture">삭제</a>
	</div>
</div>

</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#remove_lecture').click(function(e){
			e.preventDefault();
			var delete_board = confirm('정말 삭제하시겠습니까?');
			if (delete_board) {
				$.ajax({
	                url: "./lecture_delete.php",
	                type: "POST",
	                data: { no : <?php echo $_GET['no']; ?> },
	                cache: false
	            }).done(function(response, data){
	            	// alert(response);
	            	// alert(data);
	            	if (data == 'success') {
	            		alert('삭제가 완료되었습니다.');
	            		window.location.href = "http://test.hackers.com/adm/lecture_list.php";
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
<?php
	include('../footer.php');
?>