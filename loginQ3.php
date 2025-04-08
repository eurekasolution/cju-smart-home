<?php
session_start();

$id = $_POST['id'] ?? '';
$pw = $_POST['pw'] ?? '';

if ($id === 'admin' && $pw === '1111') {
    $_SESSION['user'] = '관리자';
} elseif ($id === 'cju' && $pw === '1111') {
    $_SESSION['user'] = '청주대';
} else {
    echo "<script>alert('아이디와 비밀번호를 확인하세요.'); location.href='index.php';</script>";
    exit;
}

echo "<script>location.href='index.php';</script>";
?>