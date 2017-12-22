<?php
	$mb_name = trim($_POST['fp_mb_name']);
	$mb_hp = trim($_POST['mb_hp']);
	$mb_email = trim($_POST['find_email']);

	$sql = "SELECT mb_id FROM member WHERE mb_name = '$mb_name'";

	if ( $mb_hp ) {
		$sql .= " AND mb_hp = '$mb_hp'";
	} else {
		$sql .= " AND mb_email = '$mb_email'";
	}

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
    		$mb_id = $row["mb_id"];
    	}
	}

	$conn->close();
?>
</div>
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">아이디/비밀번호 찾기</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>아이디/비밀번호 찾기</strong>
				</div>
			</div>

			<ul class="tab-list">
				<li class="on"><a href="./?mode=find_id">아이디 찾기</a></li>
				<li><a href="./?mode=find_pass">비밀번호 찾기</a></li>
			</ul>

			<div class="tit-box-h4">
				<h3 class="tit-h4">아이디 조회결과</h3>
			</div>

			<div class="guide-box">
				<p class="fs16 mb5"><?php echo $mb_name;?> 회원님의 아이디는 아래와 같습니다.</p>
				<strong class="big-title tc-brand"><?php echo $mb_id;?></strong>
			</div>

			<div class="box-btn mt30">
				<a href="/member" class="btn-l">로그인하러 가기</a>
				<a href="./?mode=find_pass" class="btn-l-line ml5">비밀번호 찾기</a>
			</div>

		</div>
	</div>
</div>	