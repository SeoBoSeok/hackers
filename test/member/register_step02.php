<?php
	session_start();

	$_SESSION["mobile_auth_code"] = 123456;

	$auth_hp = '';

	if ( (($_POST['agree1'] == 'y') + ($_POST['agree2'] == 'y')) <= 1 ) {
		echo "<script>alert(\"먼저 이용약관과 개인정보 취급방침에 동의를 하셔야 합니다.\");</script>";
		echo "<meta http-equiv='refresh' content='0; url=./register_step01.php'>";
	}
?>	
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

			<form action="./?mode=step03" name="fhauth_form" id="fhauth_form" method="post" autocomplete="off">

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
<script type="text/javascript">
	$(document).ready(function(){
		$('#check_mo_auth').click('on', function(e){
			if ( $('input[name="mo_check"]').val() == 123456 ) {
				$('#auth_hp').val('y');
				alert('성공!! 다음 단계로 이동합니다!!');
			} else {
				alert('인증번호를 다시 확인해주세요!!');
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

	});
</script>