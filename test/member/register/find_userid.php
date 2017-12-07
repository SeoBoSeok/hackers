<?php
	include_once('../../header.php');
	session_start();

	$_SESSION['auth_code_for_email'] = '1123456';
	$_SESSION['auth_code_for_hp'] = '1223456';
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
				<h3 class="tit-h3">아이디/비밀번호 찾기</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>아이디/비밀번호 찾기</strong>
				</div>
			</div>

			<ul class="tab-list">
				<li class="on"><a href="#">아이디 찾기</a></li>
				<li><a href="./?mode=find_pass">비밀번호 찾기</a></li>
			</ul>

			<div class="tit-box-h4">
				<h3 class="tit-h4">아이디 찾기 방법 선택</h3>
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
			<form action='./find_userid_complete.php' id="f_id_confirm" method="post">
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">아이디 찾기 개인정보 입력</caption>
					<colgroup>
						<col style="width:15%"/>
						<col style="*"/>
					</colgroup>

					<tbody>
						<tr>
							<th scope="col">성명</th>
							<td><input type="text" class="input-text" style="width:302px" name="find_name"/></td>
						</tr>
						<!-- <tr>
							<th scope="col">생년월일</th>
							<td>
								<select class="input-sel" style="width:148px">
									<option value="">선택</option>
									<option value="">선택입력</option>
									<option value="">선택입력</option>
									<option value="">선택입력</option>
									<option value="">선택입력</option>
								</select>
								년
								<select class="input-sel" style="width:147px">
									<option value="">선택</option>
									<option value="">선택입력</option>
									<option value="">선택입력</option>
									<option value="">선택입력</option>
									<option value="">선택입력</option>
								</select>
								월
								<select class="input-sel" style="width:147px">
									<option value="">선택</option>
									<option value="">선택입력</option>
									<option value="">선택입력</option>
									<option value="">선택입력</option>
									<option value="">선택입력</option>
								</select>
								일
							</td>
						</tr> -->
						<tr>
							<th scope="col">이메일주소</th>
							<td>
								<input type="text" class="input-text" style="width:138px" name="str_email" id="str_email01"/> @ <input type="text" class="input-text" id="str_email02" name="str_email" style="width:138px"/>
								<select class="input-sel" style="width:160px">
									<option value="">선택입력</option>
									<option value="">선택입력</option>
									<option value="">선택입력</option>
									<option value="">선택입력</option>
									<option value="">선택입력</option>
								</select>
								<a href="#" class="btn-s-tin ml10" id="get_eauth">인증번호 받기</a>
								<input type="hidden" name="find_email" value="" />
							</td>
						</tr>
						<tr>
							<th scope="col">인증번호</th>
							<td><input type="text" class="input-text" style="width:478px" id="auth_code_input"/><a href="#" class="btn-s-tin ml10" id="get_hpauth">인증번호 확인</a></td>
							<input type="hidden" name="hp_auth_confirm" value="">
							<input type="hidden" name="email_auth_confirm" value="">
							<input type="hidden" name="hp_auth_confirm_code" value="">
							<input type="hidden" name="email_auth_confirm_code" value="">
						</tr>
					</tbody>
				</table>
			</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#get_eauth').click('on', function(e){
			// alert("<?php echo $_SESSION['auth_code_for_email']?>");
			var c_id = $('input[type=text][name="find_name"]').val();
			var c_email = $('input[type=hidden][name=find_email]').val();
	        e.preventDefault();
	            $.ajax({
	                url: "./ajax_checkid.php",
	                type: "POST",
	                data: { name : c_id, email : c_email },
	                // dataType: "json",
	                cache: false
	            }).done(function(response){
	            	// alert(response);
	            	if (response == 1) {
	            		alert("<?php echo $_SESSION['auth_code_for_hp']?>");
	            		$('input[type=hidden][name=email_auth_confirm]').val('y');
	            		$('input[type=hidden][name=email_auth_confirm_code]').val("<?php echo $_SESSION['auth_code_for_hp']?>");
	            	} else {
	            		alert('해당 회원 정보를 찾을 수 없습니다.');
	            	}
	            });
		});
		$('#get_hpauth').click('on', function(){
			if($('#auth_code_input').val()){
				if($('#auth_code_input').val() == $('input[type=hidden][name=email_auth_confirm_code]').val()){
					alert('인증되었습니다');
					$('#f_id_confirm').submit();
				} else {
					alert('코드를 확인 해주세요');
				}
			} else {
				alert('코드를 입력해주세요');
			}
		});

		$('input[name="str_email"]').on("change", function(){
			makeEmail();
		});

		function makeEmail() {
		$('input[type=hidden][name=find_email]').val(
				$('#str_email01').val() + "@" +
				$('#str_email02').val()
			);
		}
		// $('input[type=radio][name=auth_radio]').click('on', function(e){
		// 	if(this.value == 'hp_auth_mode'){
		// 		alert("인증번호는 " + "<?php echo $_SESSION['auth_code_for_hp']?>" + "입니다");
		// 	}
		// });

	});
</script>
<?php
	include_once('../../footer.php');
?>