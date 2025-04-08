<?php
// 세션 저장 경로 설정 및 시작
session_save_path(__DIR__ . '/sess');
session_start();

// DB 연결 파일 포함
include_once("inc/db.inc.php");
$conn = connectDB();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>스마트 홈페이지</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
    }
    .wrapper {
      min-height: 100%;
      display: flex;
      flex-direction: column;
    }
    main {
      flex: 1;
    }
    footer {
      background-color: #f8f9fa;
      padding: 1rem;
      text-align: center;
      font-size: 0.9rem;
      color: #555;
    }
  </style>
</head>
<body>
<div class="wrapper">
  <!-- 네비게이션 바 -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">홈페이지</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">홈</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">메뉴1</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?cmd=menu1_1">메뉴 1-1</a></li>
              <li><a class="dropdown-item" href="index.php?cmd=menu1_2">메뉴 1-2</a></li>
              <li><a class="dropdown-item" href="index.php?cmd=menu1_3">메뉴 1-3</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">메뉴2</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?cmd=menu2_1">메뉴 2-1</a></li>
              <li><a class="dropdown-item" href="index.php?cmd=menu2_2">메뉴 2-2</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">메뉴3</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?cmd=menu3_1">메뉴 3-1</a></li>
              <li><a class="dropdown-item" href="index.php?cmd=menu3_2">메뉴 3-2</a></li>
              <li><a class="dropdown-item" href="index.php?cmd=menu3_3">메뉴 3-3</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- 본문 영역 -->
  <main class="container py-4">
    <?php
      if (!isset($_GET['cmd'])) {
        include("init.php");
      } else {
        $cmd = basename($_GET['cmd']);
        $file = "$cmd.php";
        if (file_exists($file)) include($file);
        else echo "<p>해당 페이지가 없습니다.</p>";
      }
    ?>
  </main>

  <!-- 푸터 -->
  <footer>
    청주대학교 대학일자리플러스센터<br>
    ChatGPT를 활용한 스마트 홈페이지 개발<br>
    정보보호책임자 : 청주대 (<a href="mailto:help@cju.ac.kr">help@cju.ac.kr</a>)
  </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>