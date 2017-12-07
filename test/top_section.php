<div class="top-section">
			<div class="inner">
				<div class="link-box">
					<?php
						if ($mb_id) // 로그인한 상태($mb_id로 구별)
							echo "<a href='#' id='hackers_logout'>로그아웃</a><a href='/member/register?mode=modify'>회원정보 수정</a>";
						else // 로그아웃 상태
							echo "<a href='/member'>로그인</a><a href='/member/register?mode=step_01'>회원가입</a>"
					?>
					<a href="#">상담/고객센터</a>
				</div>
			</div>
		</div>