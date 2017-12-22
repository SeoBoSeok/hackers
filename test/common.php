<?php

	include('./config.php');
    include('../config/database.php');

	// member global 변수 선언

	error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING );

	// // 보안설정이나 프레임이 달라도 쿠키가 통하도록 설정
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
	} else {
	    $is_guest = true;
	    $member['mb_id'] = '';
	}

	if (!function_exists('json_encode'))
    {
        function json_encode($a=false)
        {
            if (is_null($a)) return 'null';
            if ($a === false) return 'false';
            if ($a === true) return 'true';
            if (is_scalar($a))
            {
                if (is_float($a))
                {
                    // Always use "." for floats.
                    return floatval(str_replace(",", ".", strval($a)));
                }

                if (is_string($a))
                {
                    static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
                    return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
                }
                else
                return $a;
            }
            $isList = true;
            for ($i = 0, reset($a); $i < count($a); $i++, next($a))
            {
                if (key($a) !== $i)
                {
                    $isList = false;
                    break;
                }
            }
            $result = array();
            if ($isList)
            {
                foreach ($a as $v) $result[] = json_encode($v);
                return '[' . join(',', $result) . ']';
            }
            else
            {
                foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
                return '{' . join(',', $result) . '}';
            }
        }
    }
    function br2nl($string)
    {
        return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $string);
    } 
    function show_title($string)
    {
        $string = str_replace('</p>', '', $string);
        return $array = explode('<p>', $string);
    }

?>