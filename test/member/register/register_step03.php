<?php
	include('../../header.php');
?>

<?php
	session_start();

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

	$write = 'W'; // write mode 가입모드

	if ($mb_id) {
		$write = 'M';
		include('../../config/database.php');

		$sql = "SELECT * FROM member where mb_id = '$mb_id'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$agree1 = $row['mb_agree1'];
				$agree2 = $row['mb_agree2'];
				$auth_hp = $row['mb_hp_certify'];
				$mb_name = $row['mb_name'];
				$mb_email = $row['mb_email'];
				$mb_hp = $row['mb_hp'];
				$mb_tel = $row['mb_tel'];
				$mb_postcode = $row['mb_postcode'];
				$mb_add1 = $row['mb_add1'];
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
			<form id="fregisterform" name="fregisterform" action="./register_update.php" onsubmit="return fregisterform_submit(this);" method="post"> <!--  enctype="multipart/form-data" autocomplete="off" -->
		    <input type="hidden" name="w" value="<?php echo $write ?>">
		    <input type="hidden" name="url" value="<?php echo $r_url ?>">
		    <input type="hidden" name="agree1" value="<?php echo $agree1 ?>">
		    <input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
		    <input type="hidden" name="auth_hp" value="<?php echo $auth_hp ?>">
		    <input type="hidden" name="auth_id" value="<?php echo $auth_id ?>">
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">강의정보</caption>
					<colgroup>
						<col style="width:15%"/>
						<col style="*"/>
					</colgroup>

					<tbody>
						<tr>
							<th scope="col"><span class="icons">*</span>이름</th>
							<td><input type="text" class="input-text" style="width:302px" name="mb_name" value="<?php echo $mb_name; ?>" required/><p class="tip name_error"></p></td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>아이디</th>
							<td>
								<input type="text" class="input-text" name="mb_id" style="width:302px" required placeholder="영문자로 시작하는 4~15자의 영문소문자, 숫자" <?php if($mb_id) echo 'readonly' ?> value="<?php echo $mb_id ?>"/>
								<?php echo ($mb_id)?'' : '<a href="#" class="btn-s-tin ml10" id="check_duplicated_id">중복확인</a>';
								?>
								<p class="tip id_alert"></p>
							</td>
						</tr>
						<?php if(!$mb_id): ?>
						<tr>
							<th scope="col"><span class="icons">*</span><?php echo ($write=='M')?"새로운 비밀번호":"비밀번호"; ?></th>
							<td><input type="password" class="input-text" style="width:302px" name="mb_password" placeholder="8-15자의 영문자/숫자/특수문자 혼합"/><p class="tip pass_alert"></p></td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span><?php echo ($write=='M')?"새로운 비밀번호 확인":"비밀번호 확인"; ?></th>
							<td><input type="password" class="input-text" style="width:302px" name="mb_password_re"/><p class="tip re_pass_alertare"></p></td>
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
								<p class="tip email_alert"></p>
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
									<label>우편번호 <input type="text" id="mb_postcode" class="input-text ml5" value="<?php echo $mb_postcode; ?>" name="mb_postcode" style="width:242px" readonly /></label><a href="#" class="btn-s-tin ml10" id="search_Address" type="button">주소찾기</a>
								</p>
								<p class="mt10">
									<label>기본주소 <input type="text" id="sample6_address" name="mb_add1" class="input-text ml5" value="<?php echo $mb_add1;?>" style="width:719px"/></label>
								</p>
								<p class="mt10">
									<label>상세주소 <input type="text" id="sample6_address2" name="mb_add2" class="input-text ml5" value="<?php echo $mb_add2;?>" style="width:719px"/></label>
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
    	if (!c_id) {
    		alert('아이디를 입력해주세요');
    		return;
    	}
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
                document.getElementById('mb_postcode').value = data.zonecode; //5자리 새우편번호 사용
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
                name_validate(f.mb_name, name_error);
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

	$('input[type=text][name=mb_name]').focusout(function(){
		name_validate($('input[type=text][name=mb_name]'));
	});

	$('input[type=text][name=mb_id]').focusout(function(){
		userid_validate($('input[type=text][name=mb_id]'), $('.id_alert'));
	});

	$('input[type=password][name=mb_password]').focusout(function(){
		pass_validate($('input[type=password][name=mb_password]'), $('.pass_alert'));
	});

	$('input[type=password][name=mb_password_re]').focusout(function(){
		if($('input[type=password][name=mb_password]').val() != $('input[type=password][name=mb_password_re]').val()){
			$('.re_pass_alertare').html('<span style="color:red">비밀번호를 동일하게 입력해주세요</span>');
			$('input[type=password][name=mb_password_re]').focus();
			return false;
		}
		$('.re_pass_alertare').html('');
	});

	$('input[type=text][name=mb_tel_01]').focusin(function(){
		email_validate($('input[type=hidden][name=mb_email]'), $('.email_alert'));
	});

	/**
	 * 이름 유효성 체크
	 * @param is_this
	 * @param alert_area
	 * @returns {boolean}
	 */
	function name_validate(is_this,alert_area){

		var inter_data = /[~!@\#$%^?&*\()|\-{}\[\]=+,.;:'\/\\]|[0-9]/gi;
		var inter_date_etc = /[^가-힣a-zA-Z-\s/]/gi; //한글,영문,띄어쓰기만 허용
	    var blank_pattern = /^\s+|\s+$/g; //띄어 쓰기

		if($('input[name=is_mobile]').val() == 'Y') { //천지인 자판 허용으로 모바일만 적용 해야됨
	        //var inter_date_kr_str = /[ㄱ-ㅎㅏ-ㅣ가-힣|\u318D\u119E\u11A2\u2022\u2025a\u00B7\uFE55]/gi;
	        //var inter_date_kr = /[^ㄱ-ㅎㅏ-ㅣ가-힣|\u318D\u119E\u11A2\u2022\u2025a\u00B7\uFE55]/gi;
	        var inter_date_kr_str = /[ㄱ-ㅎㅏ-ㅣ가-힣]/gi;
	        var inter_date_kr = /[^ㄱ-ㅎㅏ-ㅣ가-힣]/gi;
	    }else{
	        var inter_date_kr_str = /[ㄱ-ㅎㅏ-ㅣ가-힣]/gi;
	        var inter_date_kr = /[^ㄱ-ㅎㅏ-ㅣ가-힣]/gi;
	    }
	    var inter_date_eng_str = /[a-zA-Z-\s/]/gi;
		var inter_date_eng = /[^a-zA-Z-\s/]/gi;

		if(!alert_area){
	      var  alert_area = 'name_error';
	    }
	    //공백 체크
	    if(is_this.val().replace(blank_pattern, '' ) == "" ){
	        $("."+alert_area).html("<span style='color:red'>이름을 입력 해주세요.</span>");
	        is_this.focus();
	        return false;
	    }
	    //빈값 체크
	    if(is_this.val() == ''){
	        $("."+alert_area).html("<span style='color:red'>이름을 입력 해주세요.</span>");
	        is_this.focus();
	        return false;
	    }
	    //영문,한글,띄어쓰기 허용
	    if(inter_date_etc.test(is_this.val())){
	        $("."+alert_area).html("<span style='color:red'>한글 또는 영문을 사용하세요.</span>");
	        is_this.focus();
	        return false;
	    }
	    //한글 인지 아닌지 체크 후 글자 수 계산
	    if(inter_date_kr_str.test(is_this.val())) {
	        if(is_this.val().length  < 2){
	            $("."+alert_area).html("<span style='color:red'>이름은 2자 이상이어야 합니다.</span>");
	            is_this.focus();
	            return false;
	        }
	        if(is_this.val().length  >  25){
	            $("."+alert_area).html("<span style='color:red'>이름은 25자 이하이어야 합니다.</span>");
	            is_this.focus();
	            return false;
	        }
	    }else{
	        if(is_this.val().length  < 2){
	            $("."+alert_area).html("<span style='color:red'>이름은 2자 이상이어야 합니다.</span>");
	            is_this.focus();
	            return false;
	        }
	        if(is_this.val().length  >  50){
	            $("."+alert_area).html("<span style='color:red'>이름은 50자 이하이어야 합니다.</span>");
	            is_this.focus();
	            return false;
	        }
	    }

		if (inter_data.test(is_this.val())) {
	        if(is_this.attr('name') == 'name'){
	            is_this.siblings( $("."+alert_area).html('<span style="color:red">이름을 한글 또는 영문으로만 입력 하세요.</span>'));
	            is_this.focus();
	        }
			is_this.val(is_this.val().replace(inter_data, ''));
			return false;
		}

	    //영문,한글 혼용 불가
	    if(inter_date_kr_str.test(is_this.val())) {
	        if (inter_date_kr.test(is_this.val())) {
	            is_this.siblings( $("."+alert_area).html('<span style="color:red">이름을 한글 또는 영문으로 혼동이 불가능 합니다.</span>'));
	            is_this.focus();
	            //is_this.val(is_this.val().replace(inter_date_kr, ''));
	            is_this.val('');
	            return false;
	        }
	    }else if(inter_date_eng_str.test(is_this.val())) {
	        if (inter_date_eng.test(is_this.val())) {
	            is_this.siblings( $("."+alert_area).html('<span style="color:red">이름을 한글 또는 영문으로 혼동이 불가능 합니다.</span>'));
	            is_this.focus();
	            //is_this.val(is_this.val().replace(inter_date_eng, ''));
	            is_this.val('');
	            return false;
	        }
	    }

	    // alert(alert_area);

	    is_this.siblings($("."+alert_area).html(''));

		return true;
	}

	/**
	 * 문자열의 바이트수 리턴
	 * @returns {Number}
	 */
	function byteLength(text) {
	    var l= 0;
	    for(var idx=0; idx < text.length; idx++) {
	        var c = encodeURI(text.charAt(idx));
	        if( c.length==1 ) l ++;
	        else if( c.indexOf("%u")!=-1 ) l += 2;
	        else if( c.indexOf("%")!=-1 ) l += c.length/3;
	    }
	    return l;
	};

	/**
	 * ID 유효성 검사
	 * @param is_this
	 * @param alert_area
	 * @returns {boolean}
	 */
	function userid_validate(is_this,alert_area){

	    var inter_date = /[^a-zA-Z0-9-\-_]/gi;

	    // alert(is_this.val());

	    if (is_this.val() == ''){
	        $(alert_area).html("<span style='color:red'>아이디를 입력해주세요.</span>");
	        is_this.focus();
	        return false;
	    }


	    if (inter_date.test(is_this.val())){
	        is_this.val(is_this.val().replace(is_this.val(), ''));
	        $(alert_area).html("<span style='color:red'>아이디를 입력해주세요.</span>");
	        is_this.focus();
	        return false;
	    }

	    if((is_this.val().length < 4) && alert_area == 'id_alert'){
		    $(alert_area).html("<span style='color:red'>아이디는 4자 이상의 영문(소문자), 숫자, 특수문자(-,_)를 입력해주세요.</span>");
		    is_this.focus();
		    return false;
		}

	    if((is_this.val().length > 50) && alert_area == 'id_alert'){
	        $(alert_area).html("<span style='color:red'>아이디는 50자 이하의 영문(소문자), 숫자, 특수문자(-,_)를 입력해주세요.</span>");
	        is_this.focus();
	        return false;
	    }
	    //모든 문자는 소문자로 변환
		is_this.val(is_this.val().toLowerCase());
		$(alert_area).html('');
		return true;
	}

	/**
	 * 숫자만 유효성 검사
	 * @param is_this
	 * @returns {boolean}
	 */
	function number_validate(is_this){
		var inter_data = /[^0-9]/gi;

		if (inter_data.test(is_this.val())) {
			is_this.val(is_this.val().replace(inter_data, ''));
			return false;
		}
	}

	/**
	 * 비밀 번호 유효성
	 * @param is_this
	 * @param alert_area
	 * @returns {boolean}
	 */
	function pass_validate(is_this,alert_area){

		var pw = is_this.val();
		var num = pw.search(/[0-9]/g);
		var eng = pw.search(/[a-z]/ig);
		var spe = pw.search(/[`~!@@#$%^&*|\\\'\";:\/?]/gi);

		if(!pw) {
			$(alert_area).html("비밀번호를 입력 해주세요.");
			is_this.focus();
			return;
		}

		if(pw.length < 10 || pw.length > 32){
		    $(alert_area).html("10~32자로 입력해주세요");
		    is_this.focus();
		    return;
		}

	    if(pw.search(/\s/) != -1){
			$(alert_area).html("비밀번호는 공백없이 입력해주세요.");
			is_this.focus();
		    return;
		}

		if(num < 0 || eng < 0){
			$(alert_area).html("영문,숫자 조합하여 10자리 이상으로 설정해주세요.");
			is_this.focus();
		    return;
		}
		return true;
	}

	/**
	 * 모바일 숫자 유효성 체크
	 * @param mobile_val
	 * @param alert_area
	 * @returns {boolean}
	 */
	function mobile_validate(mobile_val,alert_area){

		if (mobile_val == '' || mobile_val.length < 10) {
	        $("." + alert_area).html("휴대폰 번호를 입력하지 않으셨습니다.");
	        return;
		}
		$("." + alert_area).html('');
		return true;
	}

	/**
	 * email 유효성 체크
	 * @param email_val
	 * @param alert_area
	 * @returns {boolean}
	 */
	function email_validate(email_val,alert_area){
	    //email 규칙 정규식
	    var inter_data = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    // var mail_id = $('input[name=mail_id]');
	    //email 값이 있다면 eam
	    // if(email_val !== '') {
	    //     //@ 이후 도메인을 추출 후 input을 생성
	    //     var start = email_val.indexOf("@");
	    //     var domain_id = email_val.substring(0, start);
	    //     var domain_list = email_val.substring(start + 1);
	    // }

	    if (email_val == '') {
	        $(alert_area).removeClass('success');
	        $(alert_area).addClass('error');
	        $(alert_area).html("E-mail을 입력하지 않으셨습니다.");
	        return false;
	    } else {
	        if (!inter_data.test(email_val)) {
	            $(alert_area).removeClass('success');
	            $(alert_area).addClass('error');
	            $(alert_area).html("<span style='color:red'>잘못된 E-mail 형식 입니다.</span>");
	            return false;
	        } else {
	            $(alert_area).html('');
	            $("input[name=email]").val(email_val);
	            $("input[name=mail_id_f]").val(domain_id);
	            $("input[name=mail_id_s]").val(domain_list);
	            return true;
	        }
	    }
	}

	/**
	 * 생년 월일 유효성 체크
	 * @param param
	 * @returns {boolean}
	 */
	function isValidDate(param) {
	    try{
	        param = param.replace(/-/g,'');

	        // 자리수가 맞지않을때
	        if( isNaN(param) || param.length!=8 ) {
	            return false;
	        }

	        var year = Number(param.substring(0, 4));
	        var month = Number(param.substring(4, 6));
	        var day = Number(param.substring(6, 8));

	        var dd = day / 0;

	        if( month<1 || month>12 ) {
	            return false;
	        }

	        var maxDaysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
	        var maxDay = maxDaysInMonth[month-1];

	        // 윤년 체크
	        if( month==2 && ( year%4==0 && year%100!=0 || year%400==0 ) ) {
	            maxDay = 29;
	        }

	        if( day<=0 || day>maxDay ) {
	            return false;
	        }
	        return true;

	    } catch (err) {
	        return false;
	    }
	}


</script>
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
</body>
</html>