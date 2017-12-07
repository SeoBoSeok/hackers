<?php
	include_once('../../header.php');
	session_start();

	// echo $_POST['agree1'];

	$_SESSION["mobile_auth_code"] = 123456;
	// echo "Session variables are set.";

	$auth_hp = '';

	// print_r($_SERVER);
	// echo $_SERVER['HTTP_REFERER'];

	// echo (!($_POST['agree1']=='y'));

	if ( (($_POST['agree1'] == 'y') + ($_POST['agree2'] == 'y')) <= 1 ) {
		echo "<script>alert(\"먼저 이용약관과 개인정보 취급방침에 동의를 하셔야 합니다.\");</script>";
		echo "<meta http-equiv='refresh' content='0; url=./register_step01.php'>";
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
		
		<div class="nav-section">
			<div class="inner p-r">
				<h1><a href="/"><img src="http://img.hackershrd.com/common/logo.png" alt="해커스 HRD LOGO" width="165" height="37"/></a></h1>
				<div class="nav-box">
					<h2 class="hidden">주메뉴 시작</h2>
					
					<ul class="nav-main-lst">
						<li class="mnu">
							<a href="#">일반직무</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
						<li class="mnu2">
							<a href="#">산업직무</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
						<li class="mnu3">
							<a href="#">공통역량</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
						<li class="mnu4">
							<a href="#">어학 및 자격증</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
						<li class="mnu5">
							<a href="#">직무교육 안내</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
						<li class="mnu6">
							<a href="#">내 강의실</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>

			<div class="nav-sub-box">
				<div class="inner"><!-- <a href="#"><img src="/" alt="배너이미지" width="171" height="196"></a> --></div>
			</div>

		</div>

		<div class="top-section">
			<div class="inner">
				<div class="link-box">
					<!-- 로그인전 -->
					<a href="#">로그인</a>
					<a href="#">회원가입</a>
					<a href="#">상담/고객센터</a>
					<!-- 로그인후 -->
					<!-- <a href="#">로그아웃</a>
					<a href="#">내정보</a>
					<a href="#">상담/고객센터</a> -->
				</div>
			</div>
		</div>
	</div>
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">회원가입</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>회원가입 완료</strong>
				</div>
			</div>

			<div class="join-step-bar">
				<ul>
					<li><i class="icon-join-agree"></i> 약관동의</li>
					<li class="on"><i class="icon-join-chk"></i> 본인확인</li>
					<li class="last"><i class="icon-join-inp"></i> 정보입력</li>
				</ul>
			</div>

			<div class="tit-box-h4">
				<h3 class="tit-h4">본인인증</h3>
			</div>

			<form action="./register_step03.php" name="fhauth_form" id="fhauth_form" method="post" onsubmit="return checkAuthCode(e)" autocomplete="off">

				<div class="section-content after">
					<div class="identify-box" style="width:100%;height:190px;">
						<div class="identify-inner">
							<strong>휴대폰 인증</strong>
							<p>주민번호 없이 메시지 수신가능한 휴대폰으로 1개 아이디만 회원가입이 가능합니다. </p>

							<br />

							<input type="text" name="hp_01" id="mb_hp_01" class="input-text" maxlength="3" style="width:50px"/> - 
							<input type="text" name="hp_01" id="mb_hp_02" class="input-text" maxlength="4" style="width:50px"/> - 
							<input type="text" name="hp_01" id="mb_hp_03" class="input-text" maxlength="4" style="width:50px"/>
							<input type="hidden" name="mb_hp" id="mb_hp" value="<?php echo $mb_hp; ?>" />
							<a href="#" id="getAuthCode" class="btn-s-line">인증번호 받기</a>

							<br /><br />
							<input type="text" class="input-text" name="mo_check" style="width:200px"/>
							<button type="submit" class="btn-s-line" id="check_mo_auth">인증번호 확인</button>
						</div>
						<input type="hidden" class="input-text" name="mo_auth" value="<?php echo $_SESSION["mobile_auth_code"]; ?>"/>
						<input type="hidden" name="agree1" value="<?php echo $_POST['agree1']; ?>" />
						<input type="hidden" name="agree2" value="<?php echo $_POST['agree2']; ?>" />
						<input type="hidden" name="auth_hp" id="auth_hp" value="<?php echo $auth_hp; ?>" />
						<i class="graphic-phon"><span>휴대폰 인증</span></i>
					</div>
				</div>
			</form>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#check_mo_auth').click('on', function(e){
			// alert($('input[name="mo_auth"]').val());
			if ( $('input[name="mo_check"]').val() == 123456 ) {
				$('#auth_hp').val('y');
				alert('Succees!! Authentification!!');
				// location.href = './register_step03.php';
			} else {
				alert('Fail to get Authentification!!');
				e.preventDefault();
			}
		});

		$('#getAuthCode').click('on', function(e){
			e.preventDefault();
			alert('인증코드는 123456입니다.');
		});

		$('input[type="text"][name="hp_01"]').on("change", function(){
			var hp_complete = [];
			hp_complete[0] = $('#mb_hp_01').val();
			hp_complete[1] = $('#mb_hp_02').val();
			hp_complete[2] = $('#mb_hp_03').val();
			$('#mb_hp').val(hp_complete[0]+'-'+hp_complete[1]+'-'+hp_complete[2]);
		});

		function validation_hp() {
			return true;
		}
	});
</script>
</body>
</html>
