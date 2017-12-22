<div class="top-section">
			<div class="inner">
				<div class="link-box">
					<?php
						if ($_SESSION['mb_id']) // 로그인한 상태($mb_id로 구별)
							echo "<a href='#' id='hackers_logout'>로그아웃</a><a href='/member?mode=modify'>회원정보 수정</a>";
						else // 로그아웃 상태
							echo "<a href='/member'>로그인</a><a href='/member?mode=step01'>회원가입</a>"
					?>
					<a href="#">상담/고객센터</a>
				</div>
			</div>
		</div>

		<script type="text/javascript">

			$(document).ready(function(){
				$('#hackers_logout').click('on', function(){
				// alert('1111');
				var logout_key = confirm("정말 로그아웃 하시겠습니까");
				if (logout_key) {
					$.ajax({
		                url: "/logout.php",
		                type: "POST",
		                data: { logout_key : true },
		                // dataType: "json",
		                cache: false
		            }).done(function(response, data){
		            	// alert(response);
		            	if (data == 'success') {
		            		alert('로그아웃 되었습니다.');
		            		window.location.href = '/';
		            	} else {
		            		alert('로그아웃에 실패했습니다.');
		            	}
		            });
				}
			});
			});
			
		</script>