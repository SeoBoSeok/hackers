<div class="top-section">
			<div class="inner">
				<div class="link-box">
					<!-- 로그인전 -->
					<?php
						if($mb_id)
							echo "<a href='#' id='hackers_logout'>로그아웃</a><a href='/member/register?mode=modify'>회원정보 수정</a>";
						else
							echo "<a href='/member'>로그인</a><a href='#'>회원가입</a>"
					?>
					<!-- <a href="/member">로그인</a> -->
					<!-- <a href="#">회원가입</a> -->
					<a href="#">상담/고객센터</a>
					<!-- 로그인후 -->
					<!-- <a href="#">로그아웃</a>
					<a href="#">내정보</a>
					<a href="#">상담/고객센터</a> -->
				</div>
			</div>
		</div>