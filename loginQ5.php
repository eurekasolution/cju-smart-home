<?php
$id = $_POST['id'] ?? '';
$pw = $_POST['pw'] ?? '';

if (!$id || !$pw) {
  echo "<script>alert('아이디와 비밀번호를 입력하세요.'); location.href='index.php';</script>";
  exit;
}

// 비밀번호는 PASSWORD() 함수로 비교
$sql = "SELECT name, level FROM users WHERE id = '$id' AND pass = PASSWORD('$pw')";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
  $_SESSION['user'] = $row['name'];
  $_SESSION['level'] = $row['level'];
  echo "<script>location.href='index.php';</script>";
} else {
  echo "<script>alert('아이디와 비밀번호를 확인하세요.'); location.href='index.php';</script>";
}
?>
