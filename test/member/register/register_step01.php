<?php
	include('../../header.php');
	if ($mb_id){
		header('Location: ' . $home_url);
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
		
		<?php include_once('../../gnu.php'); ?>

		<?php include_once('../../top_section.php'); ?>

	</div>
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">회원가입</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>회원가입</strong>
				</div>
			</div>

			<div class="join-step-bar">
				<ul>
					<li class="on"><i class="icon-join-agree"></i> 약관동의</li>
					<li><i class="icon-join-chk"></i> 본인확인</li>
					<li class="last"><i class="icon-join-inp"></i> 정보입력</li>
				</ul>
			</div>
		<form action="./?mode=step02" id="fagree" name="fagree" method="post">
			<div class="section-content">
				<div class="tit-box-h4">
					<h3 class="tit-h4">이용약관 <span class="tc-brand">(필수)</span></h3>
				</div>
				
				<div class="agree-box">
					<div class="agree-box-txt">
						<?php include_once('agree1.md'); ?>
					</div>
					<button type="button" class="js_agree_open"><em>펼치기 ▼</em></button>
					<div class="mt10">
						<label class="input-sp">
							<input type="checkbox"  name="agree1" value="y"/>
							<span class="input-txt">약관에 동의합니다.</span>
						</label>
					</div>
				</div>
			</div>

			<div class="section-content">
				<div class="tit-box-h4">
					<h3 class="tit-h4">개인정보 취급방침 <span class="tc-brand">(필수)</span></h3>
				</div>
				
				<div class="agree-box">
					<div class="agree-box-txt">
						<?php include_once('agree2.md'); ?>
					</div>
					<button type="button" class="js_agree_open"><em>펼치기 ▼</em></button>
					<div class="mt10">
						<label class="input-sp">
							<input type="checkbox" name="agree2" value="y"/>
							<span class="input-txt">약관에 동의합니다.</span>
						</label>
					</div>
				</div>
			</div>

			<div class="all-agree-box">
				<label class="input-sp">
					<input type="checkbox" name="agreeAll" id="agreeAll" />
					<span class="input-txt">상위 이용약관 및 개인정보 취급방침에 모두 동의합니다.</span>
				</label>
			</div>

			<div class="box-btn">
				<button type="submit" class="btn-l" id="ccbx">다음단계 (휴대폰인증)</button>
			</div>
		</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('#fagree').submit(function(){
			if(!is_Checked()) {
				return false;
			}
			return;
		});

		$('#agreeAll').click('on', function(){
			// .attr는 두번째 부터 체크가 안되는 문제가 있음
			// .prop으로 수정
			if ($('#agreeAll').prop("checked")){
				$('input:checkbox[name*="agree"]').prop("checked", true);
			} else {
				$('input:checkbox[name*="agree"]').prop("checked", false);
			}
		});

		$('input:checkbox').click('on', function(){
			if ( is_Checked() ){
				$('#agreeAll').prop("checked", true);
			} else {
				$('#agreeAll').prop("checked", false);
			}
		});

		function is_Checked(){
			return $('input:checkbox[name="agree1"]').is(':checked') && $('input:checkbox[name="agree2"]').is(':checked');
		}
	});
</script>
<?php
	include('../../footer.php');
?>