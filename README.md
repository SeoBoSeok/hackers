# Hackers Project

## 시작일 : 2017-12-04

- 회원정보 수정에서 이전 페이지가 회원정보 수정이었을 경우
    - 회원정보 수정 주소 입력이 안되는 문제


- PHP 보안
    - php.ini
        - safe_mode = On
        - expose_php = Off
        - display_errors = Off
        - log_error = On
        - error_log = filename

    - 크로스 사이트 스크립팅(XSS)
        - 유효성 검사하기
        - PHP function ( strip_tags() )
    
    - error 처리
        - echo mysqli_error($dbc)

- Login / Logout 처리
    - SESSION 과 COOKIE를 활용
    - SESSION의 유지시간
    - SESSION destroy만 하는게 아니고 임시로 저장된 SESSION COOKIE와 SESSION값 차체를 array()를 활용해서 비워줘야 한다
- session_unset(); // 모든 세션변수를 언레지스터 시켜줌