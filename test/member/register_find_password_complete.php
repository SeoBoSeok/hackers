<?php
	$_SESSION['re_mb_id'] = $_POST['fp_mb_id'];	
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
				<li><a href="./?mode=find_id">아이디 찾기</a></li>
				<li class="on"><a href="./?mode=find_pass">비밀번호 찾기</a></li>
			</ul>

			<div class="tit-box-h4">
				<h3 class="tit-h4">비밀번호 재설정</h3>
			</div>

			<div class="section-content mt30">
				<form action="./password_reset.php" method="post">
					<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
						<caption class="hidden">비밀번호 재설정</caption>
						<colgroup>
							<col style="width:17%"/>
							<col style="*"/>
						</colgroup>

						<tbody>
							<tr>
								<th scope="col">신규 비밀번호 입력</th>
								<td><input type="password" class="input-text" name="re_mb_password" placeholder="영문자로 시작하는 4~15자의 영문소문자,숫자" style="width:302px" /></td>
							</tr>
							<tr>
								<th scope="col">신규 비밀번호 재확인</th>
								<td><input type="password" class="input-text" name="re_mb_password_re" style="width:302px" /></td>
							</tr>
						</tbody>
					</table>
					<input type="hidden" name="re_mb_id" value="<?php echo $re_mb_id ?>">
					<div class="box-btn">
						<input type="submit" href="#" class="btn-l" value="확인">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
