1. 설치 파일의 다운로드
    a. xampp
        download xampp
    b. visual code
        download visual code

    두 파일을 설치할 때, 기본값으로 계속 Next를 클릭하면 설치 끝

    c:/xampp/xampp-control.exe 를 실행
        Apache, Mysql을 실행

    설치 확인
        http://localhost

2. 데이터베이스의 실행
    DB를 설치하고, 이용하기 위해서는 DB, 사용자, 비번이 설정되어야 함.
    각 정보를 다음과 같이 설정합니다.

    DB 이름 : cju
    사용자 이름 : cju
    비밀 번호 : 1111

    http://localhost/phpmyadmin 에 접속

    create table first(
        id  char(20),
        name char(20)
    );

    insert into first(id, name) values('cju', '청주대학교');
    

