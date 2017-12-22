<?php
	session_start();

	$_SESSION['auth_code_for_email'] = '1123456';
	$_SESSION['auth_code_for_hp'] = '1223456';
?>
<style type="text/css">
	.remove {display: none;}
</style>
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
				<li><a href="./?mode=find_id">아이디 찾기</a></li>
				<li class="on"><a href="#">비밀번호 찾기</a></li>
			</ul>

			<div class="tit-box-h4">
				<h3 class="tit-h4">비밀번호 찾기 방법 선택</h3>
			</div>

			<dl class="find-box">
				<dt>휴대폰 인증</dt>
				<dd>
					고객님이 회원 가입 시 등록한 휴대폰 번호와 입력하신 휴대폰 번호가 동일해야 합니다.
					<label class="input-sp big">
						<input type="radio" name="auth_radio" value="hp_auth_mode" checked="checked"/>
						<span class="input-txt"></span>
					</label>
				</dd>
			</dl>

			<dl class="find-box">
				<dt>이메일 인증</dt>
				<dd>
					고객님이 회원 가입 시 등록한 이메일 주소와 입력하신 이메일 주소가 동일해야 합니다.
					<label class="input-sp big">
						<input type="radio" name="auth_radio" value="email_auth_mode"/>
						<span class="input-txt"></span>
					</label>
				</dd>
			</dl>

			<div class="section-content mt30">
			<form action="./find_password_complete.php" id="f_pw_confirm" method="post">
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">아이디/비밀번호 찾기 개인정보입력</caption>
					<colgroup>
						<col style="width:15%"/>
						<col style="*"/>
					</colgroup>

					<tbody>
						<tr>
							<th scope="col">성명</th>
							<td><input type="text" class="input-text" name="fp_mb_name" style="width:302px" /></td>
						</tr>
						<tr>
							<th scope="col">아이디</th>
							<td>
								<input type="text" class="input-text" name="fp_mb_id" style="width:302px" />
							</td>
						</tr>
						<tr class="option_select_hp">
							<th scope="col">휴대폰 번호</th>
							<td>
								<input type="text" name="hp_01" id="mb_hp_01" class="input-text" maxlength="3" style="width:50px"/> - 
								<input type="text" name="hp_01" id="mb_hp_02" class="input-text" maxlength="4" style="width:50px"/> - 
								<input type="text" name="hp_01" id="mb_hp_03" class="input-text" maxlength="4" style="width:50px"/>
								<input type="hidden" name="mb_hp" id="mb_hp" value="<?php echo $mb_hp; ?>" />
							<a href="#" class="btn-s-tin ml10" id="get_eauth">인증번호 받기</a>
							</td>
						</tr>
						<tr class="option_select_email remove">
							<th scope="col">이메일주소</th>
							<td>
								<input type="text" class="input-text" style="width:138px"/> @ <input type="text" class="input-text" style="width:138px"/>
								<select class="input-sel" style="width:160px">
									<option value="">선택입력</option>
									<option value="">선택입력</option>
									<option value="">선택입력</option>
									<option value="">선택입력</option>
									<option value="">선택입력</option>
								</select>
								<a href="#" class="btn-s-tin ml10" id="get_auth_for_pw">인증번호 받기</a>
							</td>
						</tr>
						<tr>
							<th scope="col">인증번호</th>
							<td><input type="text" class="input-text" style="width:478px" id="confirm_auth_text"/><a href="#" class="btn-s-tin ml10" id="confirm_auth">인증번호 확인</a></td>
						</tr>
						<input type="hidden" name="auth_confirm_for_pass" value="" />
						<input type="hidden" name="auth_code_for_pass" value="" />
					</tbody>
				</table>
			</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('')
		$('#confirm_auth').click('on', function(){
			if($('#confirm_auth_text').val() == $('input[type=hidden][name=auth_code_for_pass]').val()){
				alert('인증되었습니다');
				$('#f_pw_confirm').submit();
			} else {
				alert('코드를 확인 해주세요');
			}
		});
		$('#get_auth_for_pw').click('on', function(e){
			e.preventDefault();
			var c_id = $('input[type=text][name=fp_mb_id]').val();
			var c_name = $('input[type=text][name=fp_mb_name]').val();
			$.ajax({
	                url: "./ajax_checkpass.php",
	                type: "POST",
	                data: { c_id : c_id, c_name : c_name },
	                // dataType: "json",
	                cache: false
	            }).done(function(response){
	            	// alert(response);
	            	if (response == 1) {
	            		alert("<?php echo $_SESSION['auth_code_for_hp']?>");
	            		$('input[type=text][name=fp_mb_id]').attr('readonly', true);
	            		$('input[type=hidden][name=auth_confirm_for_pass]').val('y');
	            		$('input[type=hidden][name=auth_code_for_pass]').val('<?php echo $_SESSION['auth_code_for_hp']?>');
	            	} else {
	            		alert('해당 회원 정보를 찾을 수 없습니다.');
	            	}
	            });
		});
		$('#get_eauth').click('on', function(e){
			e.preventDefault();
			var c_id = $('input[type=text][name=fp_mb_id]').val();
			var c_name = $('input[type=text][name=fp_mb_name]').val();
			var c_hp = $('input[type=hidden][name=mb_hp]').val();
			$.ajax({
	                url: "./ajax_checkpass.php",
	                type: "POST",
	                data: { c_id : c_id, c_name : c_name, c_hp : c_hp },
	                // dataType: "json",
	                cache: false
	            }).done(function(response){
	            	// alert(response);
	            	if (response == 1) {
	            		alert("<?php echo $_SESSION['auth_code_for_hp']?>");
	            		$('input[type=text][name=fp_mb_id]').attr('readonly', true);
	            		$('input[type=hidden][name=auth_confirm_for_pass]').val('y');
	            		$('input[type=hidden][name=auth_code_for_pass]').val('<?php echo $_SESSION['auth_code_for_hp']?>');
	            	} else {
	            		alert('해당 회원 정보를 찾을 수 없습니다.');
	            	}
	            });
		});
		$('input[type=radio][name=auth_radio]').click(function(){
			// alert(this.value);
			if (this.value == 'hp_auth_mode') {
				$('.option_select_email').addClass('remove');
				$('.option_select_hp').removeClass('remove');
				
			} else {
				$('.option_select_hp').addClass('remove');
				$('.option_select_email').removeClass('remove');
			}
		});
	});
</script>