<?php
	$b_no = trim($_GET['no']);
	$b_mode = trim($_GET['wmode']);

	$sql = "SELECT * FROM hac_board";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$bo_table[] = $row['botable'];
			$bo_category[] = $row['bocategorylist'];
			$bo_info[] = $row;
		}

	}

	$sql = "SELECT * FROM hac_board_write WHERE writerid = '$mb_id' AND writeid = '$b_no'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$bo_content = $row;
		}

	}

	$conn->close();

    preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $bo_content['writecontents'], $matches);

    $f_divide = explode("/", $matches[1][0]);
    $f_count = count($f_divide) - 1;

?>
</div>
<div id="container" class="container">
		<?php include_once('./lecture_board_sidemenu.php'); ?>
		<div id="content" class="content">
		<div class="tit-box-h3">
			<h3 class="tit-h3">수강후기 수정</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>직무교육 안내</span>
				<strong>수강후기 수정</strong>
			</div>
		</div>

		<div class="user-notice">
			<strong class="fs16">유의사항 안내</strong>
			<ul class="list-guide mt15">
				<li class="tc-brand">수강후기는 신청하신 강의의 학습진도율 25%이상 달성시 작성가능합니다. </li>
				<li>욕설(욕설을 표현하는 자음어/기호표현 포함) 및 명예훼손, 비방,도배글, 상업적 목적의 홍보성 게시글 등 사회상규에 반하는 게시글 및 강의내용과 상관없는 서비스에 대해 작성한 글들은 삭제 될 수 있으며, 법적 책임을 질 수 있습니다.</li>
			</ul>
		</div>
		<form name="tx_editor_form" id="tx_editor_form" action="./review_update.php" method="post" accept-charset="utf-8">
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
						<select class="input-sel" name="lecture_title" style="width:160px">
<!-- 						<?php foreach ($bo_info as $key => $value) { ?>
							<option value="<?=$value['botable'];?>"><?=$value['botable'];?></option>
						<?php } ?> -->
						<option><?php echo $bo_content['botable'] ?></option>
						</select>
						<select class="input-sel ml5" name="lecture_cat" style="width:454px">
						<option><?php echo $bo_content['bocategory'] ?></option>
						</section>
					</td>
				</tr>
				<tr>
					<th scope="col">제목</th>
					<td><input type="text" class="input-text" name="review_title" style="width:611px" value="<?php echo $bo_content['writesubject'] ?>"/></td>
				</tr>
				<tr>
					<th scope="col">강의만족도</th>
					<td>
						<ul class="list-rating-choice">
							<li>
								<label class="input-sp ico">
									<input type="radio" name="stradio" id="star5" value="5"/>
									<span class="input-txt">만점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:100%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="stradio" id="star4" value="4"/>
									<span class="input-txt">만점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:80%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="stradio" id="star3"  value="3"/>
									<span class="input-txt">만점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:60%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="stradio" id="star2"  value="2"/>
									<span class="input-txt">만점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:40%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="stradio" id="star1"  value="1"/>
									<span class="input-txt">만점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:20%"></span>
								</span>
							</li>
							<input type="hidden" name="review_star" value="5" />
							<input type="hidden" name="mb_id" value="<?=$mb_id?>" />
							<input type="hidden" name="mb_name" value="<?=$mb_name?>" />
							<input type="hidden" name="mode" value="<?=$b_mode?>" />
							<input type="hidden" name="board_no" value="<?=$_GET['no']?>" />
						</ul>
					</td>
				</tr>
			</tbody>
		</table>

		<div class="editor-wrap">
			<?php include_once('./daumeditor/hac_editor.html'); ?>
		</div>

		</form>
	
		<div class="box-btn t-r">
			<a href="/lecture_board/?mode=list&page=1" class="btn-m-gray">목록</a>
			<a href="#" class="btn-m ml5" id="review_modify">수정</a>
		</div>
	</div>
</div>
<?php //echo $bo_content['writecontents']; ?>
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
<script type="text/javascript">
	$(document).ready(function(){

	    $("#star"+<?php echo $bo_content['lecturestar']?>).attr('checked', true);
	    $('input[type=hidden][name="review_star"]').val(<?php echo $bo_content['lecturestar']?>);
	    var attachments = {};
		attachments['image'] = [];
		attachments['image'].push({
			'attacher': 'image',
			'data': {
				'imageurl': '<?=$matches[1]?>',
				'filename': '<?=$f_divide[$f_count]?>',
				'filesize': 59501,
				'originalurl': '<?=$matches[1]?>',
				'thumburl': '<?=$matches[1]?>'
			}
		});
		// attachments['file'] = [];
		// attachments['file'].push({
		// 	'attacher': 'file',
		// 	'data': {
		// 		'attachurl': 'http://cfile297.uf.daum.net/attach/207C8C1B4AA4F5DC01A644',
		// 		'filemime': 'image/gif',
		// 		'filename': 'editor_bi.gif',
		// 		'filesize': 640
		// 	}
		// });
		Editor.modify({
			"attachments": function () { /* 저장된 첨부가 있을 경우 배열로 넘김, 위의 부분을 수정하고 아래 부분은 수정없이 사용 */
				var allattachments = [];
				for (var i in attachments) {
					allattachments = allattachments.concat(attachments[i]);
				}
				return allattachments;
			}(),
			"content": '<?=$bo_content['writecontents'];?>' /* 내용 문자열, 주어진 필드(textarea) 엘리먼트 */
		});
		$('input[type=radio][name=stradio]').change(function(){
	    	$('input[type=hidden][name=review_star]').val(this.value);
	    });
	    $('#review_modify').click(function(){
	    	// alert(editor.getContent());
	    	saveContent();
	    });
	});
    $("select[name=lecture_title]").change((function(e){
    	var c_id = $("select[name=lecture_title]").val();
        e.preventDefault();
            $.ajax({
                url: "./get_board_category.php",
                type: "POST",
                data: { cat : c_id },
                cache: false,
                success : function(data, status, xhr) {
                	if(data == false){
                		$("select[name=lecture_cat]").append( $('<option/>').val('등록된 강의가 없습니다.').text('등록된 강의가 없습니다.') );
                	}
                	else {
                		$("select[name=lecture_cat]").find('option').remove().end();
	                	var category_detail = $.parseJSON(data);
	                	for(i=0; i<category_detail.length;i++){
	                		$("select[name=lecture_cat]").append( $('<option/>').val(category_detail[i]).text(category_detail[i]) );
	                	}
                	}
                },
            }).done(function(response, data){
            	
            });
        }));
</script>
<?php
	include_once('../footer.php');
?>