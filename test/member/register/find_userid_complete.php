<?php
	include_once('../../header.php');
	include_once('../../config/database.php');

	session_start();

	$mb_id = $_POST['mb_id_find'];
	$mb_name = $_POST['find_name'];

	$sql = "SELECT mb_id FROM member WHERE mb_id = '$mb_id_find' AND mb_name = '$mb_name'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
    	while($row = $result->fetch_assoc()) {

    		$mb_id = $row["mb_id"];

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
		
		<?php include_once('../../gnu.php'); ?>

		<?php include_once('../../top_section.php'); ?>
		
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

	<div id="footer" class="footer">
		<div class="inner p-r">
			<img src="http://img.hackershrd.com/common/logo_footer.png" class="logo-footer" alt="해커스 HRD LOGO" width="165" height="37"/>
			<div class="site-info">
				<div class="link-box">
					<a href="#">해커스 소개</a>
					<a href="#">이용약관</a>
					<a href="#"><strong class="tc-brand">개인정보취급방침</strong></a>
					<a href="#">CONTACT US</a>
					<a href="#">상담/고객센터</a>
				</div>
				<div class="address">
					㈜챔프스터디 | 사업자등록번호 [120-87-09984] | TEL : 02)537-5000<br />
					서울특별시 서초구 강남대로61길 23(서초동 1316-15) 현대성우빌딩 203호<br />
					대표이사 : 전재윤 | 개인정보관리책임자 : 김병철<br />
					통신판매업신고(제 2008-서울서초-0396호) 정보조회 부가통신사업신고(신고번호 : 013760)<br />
				</div>
			</div>
			<a href="javascript:void(window.open('https://pgweb.uplus.co.kr/pg/wmp/mertadmin/jsp/mertservice/s_escrowYn.jsp?mertid=champescrow','','scrollbars=no,width=340,height=262,top=150,left=550'))" class="lg-info"><img src="http://img.hackershrd.com/common/lg_info.gif" alt="고객님은 안전거래를 위해 교재(유료)가 포함된 상품을 무통장 입금으로 결제하시는 경우 챔프스터디가 가입한 LG U+의 구매안전 서비스를 이용하실 수 있습니다.* LG U+의 결제대금예치업 등록번호 : 02-006-00001" width="163" height="114"/></a>
		</div>
	</div>
</div>
</body>
</html>
