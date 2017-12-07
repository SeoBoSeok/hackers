<?php
	include('../../header.php');
?>

<?php
	session_start();
	// echo $_POST['mb_hp'];
	// echo $_POST['agree1'];
	// echo $_POST['agree2'];
	// echo $_POST['auth_hp'];

	// echo $mb_id;

	$_SESSION['agree1'] = $_POST['agree1'];
	$_SESSION['agree2'] = $_POST['agree2'];
	$_SESSION['auth_hp'] = $_POST['auth_hp'];

	$agree1 = $_POST['agree1'];
	$agree2 = $_POST['agree2'];
	$auth_hp = $_POST['auth_hp'];

	$mb_hp_full = explode('-', $_POST['mb_hp']);
	$mb_hp_1 = $mb_hp_full[0];
	$mb_hp_2 = $mb_hp_full[1];
	$mb_hp_3 = $mb_hp_full[2];

	$r_url = $_SERVER['HTTP_REFERER'];

	// echo $r_url;

	$write = 'W'; // write mode 가입모드

	// $_SESSION['mb_id'] = 'ggybbo';
	// $mb_id = 'ggybbo';

	if ($mb_id) {
		$write = 'M';
		include('../../config/database.php');

		$sql = "SELECT * FROM member where mb_id = '$mb_id'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$mb_name = $row['mb_name'];
				$mb_email = $row['mb_email'];
				$mb_hp = $row['mb_hp'];
				$mb_tel = $row['mb_tel'];
				$mb_postcode = $row['mb_postcode'];
				$mb_add_jibun = $row['mb_add_jibun'];
				$mb_add2 = $row['mb_add2'];
			}
		}

		$mb_email_full = explode('@', $mb_email);
		$mb_email_1 = $mb_email_full[0];
		$mb_email_2 = $mb_email_full[1];

		$mb_hp_full = explode('-', $mb_hp);
		$mb_hp_1 = $mb_hp_full[0];
		$mb_hp_2 = $mb_hp_full[1];
		$mb_hp_3 = $mb_hp_full[2];

		$mb_tel_full = explode('-', $mb_tel);
		$mb_tel_1 = $mb_tel_full[0];
		$mb_tel_2 = $mb_tel_full[1];
		$mb_tel_3 = $mb_tel_full[2];

		// echo $mb_postcode;

	} else {

		if ( (($_POST['agree1'] == 'y') + ($_POST['agree2'] == 'y')) <= 1 ) {
			echo "<script>alert(\"먼저 이용약관과 개인정보 취급방침에 동의를 하셔야 합니다.\");</script>";
			echo "<meta http-equiv='refresh' content='0; url=./register_step01.php'>";
		} else if (($_POST['auth_hp']=='y')==0) {
			echo "<script>alert(\"핸드폰 번호 인증에 실패 했습니다.\");</script>";
			echo "<meta http-equiv='refresh' content='0; url=./register_step02.php'>";
		}

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
				<h3 class="tit-h3"><?php echo ($mb_id)?"회원정보 수정":"회원가입"; ?></h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong><?php echo ($mb_id)?"회원정보 수정":"회원가입";?></strong>
				</div>
			</div>

			<div class="join-step-bar">
				<ul>
					<li><i class="icon-join-agree"></i> 약관동의</li>
					<li><i class="icon-join-chk"></i> 본인확인</li>
					<li class="last on"><i class="icon-join-inp"></i> 정보입력</li>
				</ul>
			</div>

			<div class="section-content">
			<form id="fregisterform" name="fregisterform" action="./register_update.php" onsubmit="return fregisterform_submit(this);" method="post" autocomplete="off"> <!--  enctype="multipart/form-data" autocomplete="off" -->
		    <input type="hidden" name="w" value="<?php echo $write ?>">
		    <input type="hidden" name="url" value="<?php echo $r_url ?>">
		    <input type="hidden" name="agree1" value="<?php echo $agree1 ?>">
		    <input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
		    <input type="hidden" name="auth_hp" value="<?php echo $auth_hp ?>">
		    <!-- <input type="hidden" name="cert_no" value=""> -->
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">강의정보</caption>
					<colgroup>
						<col style="width:15%"/>
						<col style="*"/>
					</colgroup>

					<tbody>
						<tr>
							<th scope="col"><span class="icons">*</span>이름</th>
							<td><input type="text" class="input-text" style="width:302px" name="mb_name" value="<?php echo $mb_name; ?>" required/></td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>아이디</th>
							<td>
								<input type="text" class="input-text" name="mb_id" style="width:302px" required placeholder="영문자로 시작하는 4~15자의 영문소문자, 숫자" <?php if($mb_id) echo 'readonly' ?> value="<?php echo $mb_id ?>"/>
								<?php echo ($mb_id)?'' : '<a href="#" class="btn-s-tin ml10" id="check_duplicated_id">중복확인</a>';
								?>
							</td>
						</tr>
						<?php if(!$mb_id): ?>
						<tr>
							<th scope="col"><span class="icons">*</span><?php echo ($write=='M')?"새로운 비밀번호":"비밀번호"; ?></th>
							<td><input type="password" class="input-text" style="width:302px" name="mb_password" placeholder="8-15자의 영문자/숫자/특수문자 혼합"/></td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span><?php echo ($write=='M')?"새로운 비밀번호 확인":"비밀번호 확인"; ?></th>
							<td><input type="password" class="input-text" style="width:302px" name="mb_password_re"/></td>
						</tr>
						<?php endif; ?>
						<?php if(!$mb_id): ?>
						<tr>
							<th scope="col"><span class="icons">*</span>이메일주소</th>
							<td>
								<input type="text" class="input-text"  id="str_email01" name="str_email" style="width:138px" value="<?php echo $mb_email_1; ?>"/> @ <input type="text" class="input-text" id="str_email02" name="str_email" style="width:138px" value="<?php echo $mb_email_2; ?>"/>
								<select class="input-sel" id="selectEmail" style="width:160px">
									<option value="1" selected>직접입력</option>
									<option value="hackers.com">hackers.com</option>
									<option value="naver.com">naver.com</option>
									<option value="hanmail.net">hanmail.net</option>
									<option value="google.com">google.com</option>
									<option value="nate.com">nate.com</option>
								</select>
								<input type="hidden" name="mb_email" id="mb_email_from_str" />
							</td>
						</tr>
						<?php endif; ?>
						<tr>
							<th scope="col"><span class="icons">*</span>휴대폰 번호</th>
							<td>
								<input type="text" class="input-text" style="width:50px" value="<?php echo $mb_hp_1; ?>" readonly /> - 
								<input type="text" class="input-text" style="width:50px" value="<?php echo $mb_hp_2; ?>" readonly/> - 
								<input type="text" class="input-text" style="width:50px" value="<?php echo $mb_hp_3; ?>" readonly/>
								<input type="hidden" name="mb_hp" value="<?php echo $mb_hp; ?>" />
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons"></span>일반전화 번호</th>
							<td><input type="text" name="mb_tel_01" id="mb_tel_01" class="input-text" style="width:88px" maxlength="3" value="<?php echo $mb_tel_1; ?>" /> - <input type="text" name="mb_tel_01" id="mb_tel_02" class="input-text" style="width:88px" value="<?php echo $mb_tel_2; ?>" maxlength="4" /> - <input type="text" name="mb_tel_01" id="mb_tel_03" class="input-text" value="<?php echo $mb_tel_3; ?>" style="width:88px" maxlength="4" /></td>
							<input type="hidden" id="mb_tel" name="mb_tel" value="<?php echo $mb_tel; ?>" />
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>주소</th>
							<td>
								<p >
									<label>우편번호 <input type="text" id="sample6_postcode" class="input-text ml5" value="<?php echo $mb_postcode; ?>"name="mb_postcode"style="width:242px" disabled /></label><a href="#" class="btn-s-tin ml10" id="search_Address" type="button">주소찾기</a>
								</p>
								<p class="mt10">
									<label>기본주소 <input type="text" id="sample6_address" name="mb_add1" class="input-text ml5" style="width:719px" value="<?php echo $mb_add1;?>" /></label>
								</p>
								<p class="mt10">
									<label>상세주소 <input type="text" id="sample6_address2" name="mb_add2" class="input-text ml5"  value="<?php echo $mb_add2;?>" style="width:719px"/></label>
								</p>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>SMS수신</th>
							<td>
								<div class="box-input">
									<label class="input-sp">
										<input type="radio" name="sms" checked="checked" value="y"/>
										<span class="input-txt">수신함</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="sms" value="n"/>
										<span class="input-txt">미수신</span>
									</label>
								</div>
								<input type="hidden" name="mb_sms" value="<?php echo $mb_sms;?>" />
								<p>SMS수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>메일수신</th>
							<td>
								<div class="box-input">
									<label class="input-sp">
										<input type="radio" name="mailing" value="y" checked="checked"/>
										<span class="input-txt">수신함</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="mailing" value="n" />
										<span class="input-txt">미수신</span>
									</label>
								</div>
								<input type="hidden" name="mb_mailing" value="<?php echo $mb_mailing;?>" />
								<p>메일수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="box-btn">
					<input type="submit" class="btn-l" id="btn_submit" value="<?php echo ($mb_id)?"회원정보 수정":"회원가입"; ?>" />
				</div>

			</form>
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
<script type="text/javascript">
$(document).ready(function(e){

	// alert($('input[type=radio][name=mb_sms]').is(':checked').val());

    $("#check_duplicated_id").on('click',(function(e){

    	var c_id = $('input[name="mb_id"]').val();
        e.preventDefault();
            $.ajax({
                url: "./ajax_checkid.php",
                type: "POST",
                data: { name : c_id },
                // dataType: "json",
                cache: false
            }).done(function(response){
            	// alert(response);
            	if (response == 1) {
            		alert('해당 아이디가 이미 존재합니다. 다른 아이디를 선택해주세요.');
            	} else {
            		alert('가입가능한 아이디 입니다.');
            	}
            });
        }));
    });
	function sample6_execDaumPostcode(e) {
		e.preventDefault();
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var fullAddr = ''; // 최종 주소 변수
                var extraAddr = ''; // 조합형 주소 변수

                // 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    fullAddr = data.roadAddress;

                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    fullAddr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 조합한다.
                if(data.userSelectedType === 'R'){
                    //법정동명이 있을 경우 추가한다.
                    if(data.bname !== ''){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있을 경우 추가한다.
                    if(data.buildingName !== ''){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                    fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('sample6_postcode').value = data.zonecode; //5자리 새우편번호 사용
                // $('input[type=text][name=mb_add1]').val(data.zonecode);
                document.getElementById('sample6_address').value = fullAddr;

                // 커서를 상세주소 필드로 이동한다.
                document.getElementById('sample6_address2').focus();
            }
        }).open();
    }
    $('#search_Address').click('on', sample6_execDaumPostcode);

    // submit 최종 폼체크
    function fregisterform_submit(f)
    {
        if (f.w.value == "") {
            if (f.mb_password.value.length < 3) {
                alert("비밀번호를 8글자 이상 입력하십시오.");
                f.mb_password.focus();
                return false;
            }
        }

        if (f.mb_password) {
        	var passwordRules = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,15}/;;
        	
        	if(!passwordRules.test(f.mb_password.value)){
        		alert("8-15자의 영문자/숫자/툭수문자 혼합해서 만들어주세요");
				f.mb_password.focus();
				return false;
        	}
        }

        if (f.mb_password.value != f.mb_password_re.value) {
            alert("비밀번호가 같지 않습니다.");
            f.mb_password_re.focus();
            return false;
        }

        // 이름 검사
        if (!f.w.value) {
            if (f.mb_name.value.length < 1) {
                alert("이름을 입력하십시오.");
                f.mb_name.focus();
                return false;
            }

            /*
            var pattern = /([^가-힣\x20])/i;
            if (pattern.test(f.mb_name.value)) {
                alert("이름은 한글로 입력하십시오.");
                f.mb_name.select();
                return false;
            }
            */
        }

        // E-mail 검사
        // if ((f.w.value == "") || (f.w.value == "u" && f.mb_email.defaultValue != f.mb_email.value)) {
        //     var msg = reg_mb_email_check();
        //     if (msg) {
        //         alert(msg);
        //         f.reg_mb_email.select();
        //         return false;
        //     }
        // }

        if(f.mb_email.value) {
        	if(!emailValidation(f.mb_email.value)) {
        		alert('email 주소를 형식에 맞게 다시 작성해주세요');
        		f.str_email02.focus();
        		return false;
        	}
        }
        return true;
    }

 //    function checkPassword(id,password){
	// if(!/^[a-zA-Z0-9]{10,15}$/.test(password)){
	// 	alert('숫자와 영문자 조합으로 10~15자리를 사용해야 합니다.');
	// 	return false;
	// }

	// var checkNumber = password.search(/[0-9]/g);
	// var checkEnglish = password.search(/[a-z]/ig);

	// if(checkNumber <0 || checkEnglish <0){
	// 	alert("숫자와 영문자를 혼용하여야 합니다.");
	// return false;
	// }
	// if(/(\w)\1\1\1/.test(password)){
	// 	alert('444같은 문자를 4번 이상 사용하실 수 없습니다.');
	// return false;
	// }
	// if(password.search(id) > -1){
	// 	alert("비밀번호에 아이디가 포함되었습니다.");
	// return false;
	// }
	// return true;
	// }

	$('input[type="text"][name="mb_tel_01"]').on("change", function(){
		var tel_complete = [];
		tel_complete[0] = $('#mb_tel_01').val();
		tel_complete[1] = $('#mb_tel_02').val();
		tel_complete[2] = $('#mb_tel_03').val();
		$('#mb_tel').val(tel_complete[0]+'-'+tel_complete[1]+'-'+tel_complete[2]);
	});

	$('#selectEmail').change(function(){ 
		$("#selectEmail option:selected").each(function () {
			if($(this).val()== '1'){ //직접입력일 경우
				$("#str_email02").val(''); //값 초기화 
				$("#str_email02").attr("disabled",false); //활성화
			} else { //직접입력이 아닐경우
				$("#str_email02").val($(this).text()); //선택값 입력
				$("#str_email02").attr("disabled",true); //비활성화
			} 
		});
		makeEmail();
	});

	$('input[name="str_email"]').on("change", function(){
		makeEmail();
	});

	function makeEmail() {
		$('#mb_email_from_str').val(
			$('#str_email01').val() + "@" +
			$('#str_email02').val()
		);
	}

	function emailValidation(email) {
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		return re.test(email);
	}

	// sms, mailing 수신 동의
	$('input[type="radio"][name="sms"]').click('on', function(){
		$('input[type="hidden"][name="mb_sms"]').val(this.value);
	});

	$('input[type="radio"][name="mailing"]').click('on', function(){
		$('input[type="hidden"][name="mb_mailing"]').val(this.value);
	});	

</script>
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
</body>
</html>