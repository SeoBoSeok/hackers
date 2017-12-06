<?php

	include('./config.php');

	// member global 변수 선언

	error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING );

	// 보안설정이나 프레임이 달라도 쿠키가 통하도록 설정
	header('P3P: CP="ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC"');


	// SQL Injection 관련 처리 필요
	// SQL Injection 대응 문자열 필터링
	function sql_escape_string($str)
	{
	    if(defined('G5_ESCAPE_PATTERN') && defined('G5_ESCAPE_REPLACE')) {
	        $pattern = G5_ESCAPE_PATTERN;
	        $replace = G5_ESCAPE_REPLACE;

	        if($pattern)
	            $str = preg_replace($pattern, $replace, $str);
	    }

	    $str = call_user_func('addslashes', $str);

	    return $str;
	}

	// 회원, 비회원, 관리자 구분
	$is_member = $is_guest = false;
	$is_admin = '';
	if ($member['mb_id']) {
	    $is_member = true;
	    $is_admin = is_admin($member['mb_id']);
	    //$member['mb_dir'] = substr($member['mb_id'],0,2);
	} else {
	    $is_guest = true;
	    $member['mb_id'] = '';
	    //$member['mb_level'] = 1; // 비회원의 경우 회원레벨을 가장 낮게 설정
	}

?>