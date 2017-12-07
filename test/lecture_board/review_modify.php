<?php
	include_once('../header.php');
	include_once('../config/database.php');

	$sql = "SELECT * FROM hac_board";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
		// $_SESSION['mb_id'] = $row['name'];
		while($row = $result->fetch_assoc()) {
			// echo "id: " . $row['mb_id'] . "<br>";
			$bo_title = $row['botable'];
			$bo_category = $row['bocategorylist'];
			// echo $_SESSION['mb_id'];
		}

	} else {

    	echo false;
    	
	}

	print_r($bo_title);
	// print_r($bo_category);

	$categories = explode('|', $bo_category);

	print_r($categories);
	echo $categories[0];

	$conn->close();

	// if($mb_id)


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
							<a href="#"><?php echo $bo_title;?></a>
							<ul class="nav-sub-lst">
								<li><a href="#"><?php echo $categories[0];?></a></li>
								<li><a href="#">일반직무_02</a></li>
								<li><a href="#">일반직무_03</a></li>
								<li><a href="#">일반직무_04</a></li>
								<li><a href="#">일반직무_05</a></li>
								<li><a href="#">일반직무_06</a></li>
								<li><a href="#">일반직무_07</a></li>
								<li><a href="#">일반직무_08</a></li>
								<li><a href="#">일반직무_09</a></li>
							</ul>
						</li>
						<li class="mnu2">
							<a href="#">산업직무</a>
							<ul class="nav-sub-lst">
								<li><a href="#">산업직무_01</a></li>
								<li><a href="#">산업직무_02</a></li>
								<li><a href="#">산업직무_03</a></li>
								<li><a href="#">산업직무_04</a></li>
								<li><a href="#">산업직무_05</a></li>
								<li><a href="#">산업직무_06</a></li>
								<li><a href="#">산업직무_07</a></li>
								<li><a href="#">산업직무_08</a></li>
								<li><a href="#">산업직무_09</a></li>
							</ul>
						</li>
						<li class="mnu3">
							<a href="#">공통역량</a>
							<ul class="nav-sub-lst">
								<li><a href="#">공통역량_01</a></li>
								<li><a href="#">공통역량_02</a></li>
								<li><a href="#">공통역량_03</a></li>
								<li><a href="#">공통역량_04</a></li>
								<li><a href="#">공통역량_05</a></li>
								<li><a href="#">공통역량_06</a></li>
								<li><a href="#">공통역량_07</a></li>
								<li><a href="#">공통역량_08</a></li>
								<li><a href="#">공통역량_09</a></li>
							</ul>
						</li>
						<li class="mnu4">
							<a href="#">어학 및 자격증</a>
							<ul class="nav-sub-lst">
								<li><a href="#">어학및자격증_01</a></li>
								<li><a href="#">어학및자격증_02</a></li>
								<li><a href="#">어학및자격증_03</a></li>
								<li><a href="#">어학및자격증_04</a></li>
								<li><a href="#">어학및자격증_05</a></li>
								<li><a href="#">어학및자격증_06</a></li>
								<li><a href="#">어학및자격증_07</a></li>
								<li><a href="#">어학및자격증_08</a></li>
								<li><a href="#">어학및자격증_09</a></li>
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
<div id="container" class="container">
	<div id="nav-left" class="nav-left">
		<div class="nav-left-tit"> 
			<span>직무교육 안내</span>
		</div>
		<ul class="nav-left-lst">
			<li><a href="#">해커스 HRD 소개</a></li>
			<li><a href="#">사업주훈련</a></li>
			<li><a href="#">근로자카드</a></li>
			<li><a href="#">학습안내</a></li>
			<li class="on"><a href="#">수강후기</a></li>
		</ul>
	</div>

	<div id="content" class="content">
		<div class="tit-box-h3">
			<h3 class="tit-h3">수강후기</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>직무교육 안내</span>
				<strong>수강후기</strong>
			</div>
		</div>

		<div class="user-notice">
			<strong class="fs16">유의사항 안내</strong>
			<ul class="list-guide mt15">
				<li class="tc-brand">수강후기는 신청하신 강의의 학습진도율 25%이상 달성시 작성가능합니다. </li>
				<li>욕설(욕설을 표현하는 자음어/기호표현 포함) 및 명예훼손, 비방,도배글, 상업적 목적의 홍보성 게시글 등 사회상규에 반하는 게시글 및 강의내용과 상관없는 서비스에 대해 작성한 글들은 삭제 될 수 있으며, 법적 책임을 질 수 있습니다.</li>
			</ul>
		</div>

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-col">
			<caption class="hidden">강의정보</caption>
			<colgroup>
				<col style="width:15%"/>
				<col style="*"/>
			</colgroup>

			<tbody>
				<tr>
					<th scope="col">강의</th>
					<td>
						<select class="input-sel" style="width:160px">
							<option value=""><?php echo $bo_title;?></option>
						</select>
						<select class="input-sel ml5" style="width:454px">
			
							<? foreach ($categories as $key => $value) { ?>
								<option value=""><?=$value;?></option>
							<? } ?>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="col">제목</th>
					<td><input type="text" class="input-text" style="width:611px"/></td>
				</tr>
				<tr>
					<th scope="col">강의만족도</th>
					<td>
						<ul class="list-rating-choice">
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="" checked="checked"/>
									<span class="input-txt">만점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:100%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id=""/>
									<span class="input-txt">만점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:80%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id=""/>
									<span class="input-txt">만점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:60%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id=""/>
									<span class="input-txt">만점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:40%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id=""/>
									<span class="input-txt">만점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:20%"></span>
								</span>
							</li>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>

		<div class="editor-wrap">
			<?php include_once('../daumeditor/editor.html'); ?>
		</div>
	
		<div class="box-btn t-r">
			<a href="#" class="btn-m-gray">목록</a>
			<a href="#" class="btn-m ml5">수정 </a>
		</div>


		
	</div>
</div>
<script type="text/javascript">
	var config = {
		txHost: '', /* 런타임 시 리소스들을 로딩할 때 필요한 부분으로, 경로가 변경되면 이 부분 수정이 필요. ex) http://xxx.xxx.com */
		txPath: '', /* 런타임 시 리소스들을 로딩할 때 필요한 부분으로, 경로가 변경되면 이 부분 수정이 필요. ex) /xxx/xxx/ */
		txService: 'sample', /* 수정필요없음. */
		txProject: 'sample', /* 수정필요없음. 프로젝트가 여러개일 경우만 수정한다. */
		initializedId: "", /* 대부분의 경우에 빈문자열 */
		wrapper: "tx_trex_container", /* 에디터를 둘러싸고 있는 레이어 이름(에디터 컨테이너) */
		form: 'tx_editor_form'+"", /* 등록하기 위한 Form 이름 */
		txIconPath: "images/icon/editor/", /*에디터에 사용되는 이미지 디렉터리, 필요에 따라 수정한다. */
		txDecoPath: "images/deco/contents/", /*본문에 사용되는 이미지 디렉터리, 서비스에서 사용할 때는 완성된 컨텐츠로 배포되기 위해 절대경로로 수정한다. */
		canvas: {
            exitEditor:{
                /*
                desc:'빠져 나오시려면 shift+b를 누르세요.',
                hotKey: {
                    shiftKey:true,
                    keyCode:66
                },
                nextElement: document.getElementsByTagName('button')[0]
                */
            },
			styles: {
				color: "#123456", /* 기본 글자색 */
				fontFamily: "굴림", /* 기본 글자체 */
				fontSize: "10pt", /* 기본 글자크기 */
				backgroundColor: "#fff", /*기본 배경색 */
				lineHeight: "1.5", /*기본 줄간격 */
				padding: "8px" /* 위지윅 영역의 여백 */
			},
			showGuideArea: false
		},
		events: {
			preventUnload: false
		},
		sidebar: {
			attachbox: {
				show: true,
				confirmForDeleteAll: true
			}
		},
		size: {
			contentWidth: 700 /* 지정된 본문영역의 넓이가 있을 경우에 설정 */
		}
	};

	EditorJSLoader.ready(function(Editor) {
		var editor = new Editor(config);
	});
	
</script>

<!-- Sample: Saving Contents -->
<script type="text/javascript">
	/* 예제용 함수 */
	function saveContent() {
		Editor.save(); // 이 함수를 호출하여 글을 등록하면 된다.
	}

	/**
	 * Editor.save()를 호출한 경우 데이터가 유효한지 검사하기 위해 부르는 콜백함수로
	 * 상황에 맞게 수정하여 사용한다.
	 * 모든 데이터가 유효할 경우에 true를 리턴한다.
	 * @function
	 * @param {Object} editor - 에디터에서 넘겨주는 editor 객체
	 * @returns {Boolean} 모든 데이터가 유효할 경우에 true
	 */
	function validForm(editor) {
		// Place your validation logic here

		// sample : validate that content exists
		var validator = new Trex.Validator();
		var content = editor.getContent();
		if (!validator.exists(content)) {
			alert('내용을 입력하세요');
			return false;
		}

		return true;
	}

	/**
	 * Editor.save()를 호출한 경우 validForm callback 이 수행된 이후
	 * 실제 form submit을 위해 form 필드를 생성, 변경하기 위해 부르는 콜백함수로
	 * 각자 상황에 맞게 적절히 응용하여 사용한다.
	 * @function
	 * @param {Object} editor - 에디터에서 넘겨주는 editor 객체
	 * @returns {Boolean} 정상적인 경우에 true
	 */
	function setForm(editor) {
        var i, input;
        var form = editor.getForm();
        var content = editor.getContent();

        // 본문 내용을 필드를 생성하여 값을 할당하는 부분
        var textarea = document.createElement('textarea');
        textarea.name = 'content';
        textarea.value = content;
        form.createField(textarea);

        /* 아래의 코드는 첨부된 데이터를 필드를 생성하여 값을 할당하는 부분으로 상황에 맞게 수정하여 사용한다.
         첨부된 데이터 중에 주어진 종류(image,file..)에 해당하는 것만 배열로 넘겨준다. */
        var images = editor.getAttachments('image');
        for (i = 0; i < images.length; i++) {
            // existStage는 현재 본문에 존재하는지 여부
            if (images[i].existStage) {
                // data는 팝업에서 execAttach 등을 통해 넘긴 데이터
                alert('attachment information - image[' + i + '] \r\n' + JSON.stringify(images[i].data));
                input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'attach_image';
                input.value = images[i].data.imageurl;  // 예에서는 이미지경로만 받아서 사용
                form.createField(input);
            }
        }

        var files = editor.getAttachments('file');
        for (i = 0; i < files.length; i++) {
            input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'attach_file';
            input.value = files[i].data.attachurl;
            form.createField(input);
        }
        return true;
	}
</script>
<?php
	include_once('../footer.php');
?>