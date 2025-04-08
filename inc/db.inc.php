<?php
function connectDB() {
    $host = "localhost";
    $user = "cju";
    $pass = "1111";
    $dbname = "cju";
    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("DB 연결 실패: " . $conn->connect_error);
    }
    return $conn;
}
?>
