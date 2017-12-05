<?php
define('_HACKERS_', true); // URL로 직접 개별 페이지 접근 못하도록 설정

if (PHP_VERSION >= '5.1.0') {
	date_default_timezone_set('Asia/Seoul'); // date관련 함수 쓰기전 타임존이 설정되지 않으면 오류를 발생한다
}

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTP']) {
	define('HACKERS_POSTCODE_JS', '<script></script>');
} else {
	define('HACKERS_POSTCODE_JS', '<script></script>');
}
?>