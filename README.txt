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

2. 모든 코드는 github에서 다운로드 가능

    https://github.com/eurekasolution/cju-smart-home

3. 데이터베이스의 실행
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
    
Q1. 다음과 같은 형태의 홈페이지를 작성하려고 해.
- HTML5와 Bootstrap5를 이용한 홈페이지의 제작.
- XAMPP 환경에서 PHP를 이용한 프로그래밍
- sess 폴더에는 세션 정보를 저장
- img 폴더는 이미지를 저장
- inc 폴더는 db.inc.php 와 config.inc.php와 같은 include 파일 저장
- db.inc.php 파일
  db name : cju
  db user : cju
  db pass : 1111
  connectDB() 함수의 정의
  이 함수는 데이터베이스에 접속후 접속한 $conn을 리턴

모든 홈페이지의 구조는 index.php를 통과하도록 설정
- GET방식으로 넘어온 $cmd 값이 없으면, init.php 파일을 include하도록 구성해 줘.
- 만약 $cmd 값이 있는 경우는 $cmd.php 파일을 include하도록 Body를 설정해 줘.
- index.php의 시작에는 inc/db.inc.php 파일을 include해 항상 데이터베이스 사용이 가능하도록 해줘.
- sess 폴더에 세션정보를 저장하고, 세션을 사용할 수 있도록 추가해 줘.

화면 상단은 네비게이션 바와 드랍다운 메뉴를 이용해 메뉴를 구성해 줘.
메뉴는 홈, 메뉴1, 메뉴2, 메뉴3 으로 구성
메뉴1에는 메뉴 1-1, 메뉴 1-2, 메뉴 1-3으로 구성
메뉴2에는 메뉴 2-1, 메뉴 2-2로 구성
메뉴3에는 메뉴 3-1, 메뉴 3-2, 메뉴 3-3으로 구성

화면의 하단에는 사이트 정보를 넣어줘.
사이트 정보에는 다음의 내용을 넣어줘.
청주대학교 대학일자리플러스센터<br>
ChatGPT를 활용한 스마트 홈페이지 개발<br>
정보보호책임자 : 청주대 (help@cju.ac.kr)

그런데 화면의 내용이 너무 적을 때는 사이트 정보가 화면의 맨 아래에 배치되도록 해 줘.

Q2. 초기화면을 위해  init.php 파일을 만들려고 해.
초기화면은 Carousel을 이용해 이미지의 Slideshow를 하고 싶어.
사용하는 이미지는 img/la.jpg, img/chicago.jpg, img/ny.jpg 파일을 이용해 슬라이드쇼하는
형태로 구성해 줘. 슬라이드 쇼화면의 하단에는 게시판의 글을 출력하는 형태를 출력하고 싶어.

PC 화면일 때의 게시판
왼쪽에는 공지사항, 오른쪽에는 자유게시판을 배치
공지사항에는 글이 다섯개가 있다고 가정해 줘.
제목은 청주대 공지사항 1 ~ 청주대 공지사항 5까지 있고, 작성자는 플러스센터야.
자유게시판에는 글이 다섯개가 있다고 가정해 줘.
제목은 청주대 자유글 1 ~ 청주대 자유글 5까지 있고, 작성자는 
조선시대 역사 인물이름 다섯개를 무작위로 작성해줘.
게시판이 나중에 완성되면 연동할 목적이야.
각 라인에는 점선으로 #AAAAAA로 언더라인을 표시해 줄을 구분하고 싶어.
제목과 작성자이름만 있으면 되는데, 제목은 왼쪽 정렬, 작성자는 오른쪽 정렬을 해, 한 라인에 표시하고 싶어

모바일 화면일때의 게시판은
공지사항과 자유게시판을 위에서부터 순차적으로 출력하고 싶어.
공간이 좁기 때문에 제목만 적어주면 돼.
공지사항과 자유게시판 사이에는 30픽셀 정도의 공간이 있으면 좋겠어.

Q3. index.php 파일에 로그인/로그아웃 기능을 추가하려고 해.
메뉴와 내용이 들어가는 사이에 한 줄로 표시하려고 하는데,
할 줄의 오른쪽에 배치할거야.
1. 로그인이 안된 경우
   ID, PW를 입력하고, 로그인버튼, 회원가입 버튼을 배치해 줘.
   로그인 버튼을 클릭하는 경우에는 login.php에서 수행하기 위해 cmd=login을 수행하도록 하면 돼.
   회원가입 버튼을 클릭하면 cmd=join으로 이동하면 돼.
2. 로그인이 된 경우
   홍길동 님 + 로그아웃 버튼을 배치
   로그아웃 버튼을 클릭하면 cmd=logout을 수행

3. login.php 파일의 동작
   테스트를 위해 id=admin, pw = 1111인 경우는 관리자야
   id = cju, pw = 1111인 경우에는 청주대야
   그 외에는 아이디와 비밀번호를 확인하라고 알려주고 첫화면으로 이동하면 돼.

4. logout.php 파일의 동작
    로그아웃 후, 첫화면으로 이동하면 돼.

Q4. 로그인/로그아웃을 위해 데이터베이스 테이블을 만들려고 해.
테이블 이름 : users
테이블 내용 : idx, id, name, pass, level
idx : 테이블의 primary key, 자동 증가
id : 회원 아이디
name : 회원 이름
pass : 비밀번호의 password()한 결과 저장
level : 회원 등급. 1(회원), 2(우수회원), 3(특별회원), 9(관리자)와 같이 숫자로 저장

위와 같은 조건에 맞는 데이터베이스 테이블을 위한 SQL을 만들어줘.
이름, 아이디, 비번, level이 다음과 같을 때 insert하는 SQL도 같이 만들어 줘.

홍길동, kdhong, 1111, 1
청주대, cju, 1111, 2
테스트, test, 1111, 1
관리자, admin, 1111, 9

모든 비밀번호는 암호화해야 해. password()함수를 이용해 줘.

ChatGPT의 답:
CREATE TABLE users (
  idx INT AUTO_INCREMENT PRIMARY KEY,
  id VARCHAR(50) NOT NULL UNIQUE,
  name VARCHAR(100) NOT NULL,
  pass VARCHAR(255) NOT NULL,
  level INT NOT NULL
);

INSERT INTO users (id, name, pass, level) VALUES
('kdhong', '홍길동', PASSWORD('1111'), 1),
('cju', '청주대', PASSWORD('1111'), 2),
('test', '테스트', PASSWORD('1111'), 1),
('admin', '관리자', PASSWORD('1111'), 9);


Q5. 만들어진 users 테이블과 데이터를 이용해 login.php 파일을 수정하려고 해.
사용자가 입력한 아이디와 비밀번호가 users 테이블의 정보와 같은지 비교해 로그인 성공, 실패를
결정하도록 login.php 파일을 변경해 줘.
login.php 파일은 index.php 파일에서 include하기 때문에 
DB 접속은 이미 $conn에 들어있기 때문에 바로 질의만 하면 돼.
또, 이미 session도 시작한 상태라 세션관련된 값만 채우면돼. level정보도 함께 세션에 넣어줘
질의를 할 때는 mysqli_query()를 이용해 줘.

Q6. 공지사항과 자유게시판을 위해 index.php의 메뉴를 바꾸고 싶어.
첫번째 메뉴는 메뉴 1을 게시판으로 변경해 줘.
소메뉴는 공지사항과 자유게시판으로 바꿔줘.
이때 cmd값은 모두 board인데, 두 게시판을 구분하기 위해 
공지사항은 bid=1, 자유게시판은 bid=2를 추가적으로 파라미터에 주도록 메뉴를 바꿔줘.

또 이전의 메뉴 1앞에 "홈"은 불필요하고, "홈페이지"로 된 부분을 
material-icons를 이용해 home 아이콘을 사용하고 싶어.
이 아이콘을 클릭했을 때, 첫 화면으로 이동하도록 변경해 줘.

Q7. 공지사항, 자유게시판을 위해 데이터베이스 테이블을 만들고 싶어.
테이블 이름 : board
테이블의 구성
  idx : 게시글의 키 값, 자동 증가
  bid : 게시판 종류 구분, 1 (공지사항) , 2(자유게시판), 3(QnA 게시판) 
  title : 게시글 제목
  id : 사용자 아이디
  name : 작성자 이름
  html : 게시글 내용
  notice : 공지사항 여부
  time : 작성일 및 시간 , datetime

  테이블을 만든 후, 게시글 두 개를 다음과 같이 넣는 스크립트를 작성해 줘.

  게시글 1 :
  bid : 1
  title : 공지사항 게시글 1
  id : admin
  name : 관리자
  html : 공지사항 게시글1 테스트입니다.
  notice : 1
  time : now()

  게시글 2:
  bid : 2
  title : 자유게시판 게시글 1
  id : cju
  name : 청주대
  html : 자유게시판 게시글 1 테스트입니다.
  notice : 0
  time : now()


ChatGPT의 답 :

CREATE TABLE board (
  idx INT AUTO_INCREMENT PRIMARY KEY,
  bid INT NOT NULL,                -- 게시판 구분 (1:공지, 2:자유, 3:QnA 등)
  title VARCHAR(255) NOT NULL,     -- 제목
  id VARCHAR(50) NOT NULL,         -- 작성자 ID
  name VARCHAR(100) NOT NULL,      -- 작성자 이름
  html TEXT NOT NULL,              -- 글 내용
  notice TINYINT(1) DEFAULT 0,     -- 공지 여부 (0: 일반글, 1: 공지)
  time DATETIME DEFAULT CURRENT_TIMESTAMP  -- 작성 시간
);

INSERT INTO board (bid, title, id, name, html, notice, time) VALUES
(1, '공지사항 게시글 1', 'admin', '관리자', '공지사항 게시글1 테스트입니다.', 1, NOW()),
(2, '자유게시판 게시글 1', 'cju', '청주대', '자유게시판 게시글 1 테스트입니다.', 0, NOW());


Q8. 게시판(board.php)파일을 작성하려고 해.
index.php의 메뉴에서 board.php를 include할거야.
cmd=board이고, bid로 게시판을 구분해.
게시판의 기능은 다음과 같은 종류가 있어.
목록보기(mode = list)
보기(mode = show)
글쓰기(mode = write)
글저장(mode = dbWrite)
글삭제(mode = delete)
만약 mode가 없는 경우에는 기본값으로 list로 설정해 줘.

1. 목록보기(mode = list)
bid에 해당하는 글의 10개를 찾아 출력해.
출력하는 순서는 notice의 내림차순, idx의 내림차순
a. PC인 경우
순서, 제목, 작성자, 작성일을 한 줄에 출력하고, 제목이 절반을 차지하고 싶어.
작성일은 YYYY-MM-DD 형식으로 출력해
b. 모바일인 경우
제목과 작성자만 출력하고 한줄에 표시하는데 제목이 8/12를 차지하고 싶어

목록 아래에는 글쓰기 버튼, 전체 페이지별 보기를 배치하고 싶어.
제목을 클릭하는 경우, 글 내용보기(mode = show)로 이동하고 싶어.
모두 index.php 파일을 거쳐서 이동한다는 원칙을 지켜줘.
글쓰기 버튼을 클릭하면 글쓰기(mode = write)로 이동해 줘.

2. 글쓰기(mode = write)
글쓰기는 관리자인 경우에는 공지여부를 체크박스로 처리해 줘.
제목을 표시하고 placeholder로 "제목을 입력하세요"라고 표시해 줘.
작성자이름은 로그인 정보를 이용해 로그인한 사용자 이름을 자동으로 넣어줘.
글 내용 입력부분은 textarea로 처리해 줘.
하단에는 글등록(mode=dbWrite)와 목록보기(mode=list)가 있어.

3. 글저장(mdoe = dbWrite)
데이터베이스의 board에 값을 넣어주고, id는 로그인 아이디를 그대로 사용해 줘.
성공하면 alert()로 성공했다고 알려주고, 목록보기로 이동해 줘.

4. 글보기(mode= show)
제목을 첫 줄에 출력하고, 작성자와 작성일을 두번째 줄에 출력해.
세번째 줄에는 내용을 출력하는데, 글 내용이 적어도 최소한 300픽셀의 공간을
차지하도록 해 줘.
하단에는 이전글, 다음글 보기 버튼을 넣어주고,
이전글, 다음글이 없는 경우에는 비활성화 시켜줘.
맨 마지막 줄에는 목록보기 버튼을 추가하고,
작성자이거나, 관리자인 경우에는 삭제버튼을 추가해 줘.
삭제 버튼을 클릭하는 경우, 글삭제(mode = delete)로 이동해 줘.

5. 글삭제(mode=delete)
글 삭제인 경우에는 작성자이거나, 관리자인지 꼭 확인해야 해.
성공하면 삭제되었다고 alert()해 주고 목록으로 이동해 줘.