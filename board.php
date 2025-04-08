<?php
$mode = $_GET['mode'] ?? 'list';
$bid = $_GET['bid'] ?? 1;

function isAdmin() {
  return ($_SESSION['level'] ?? 0) == 9;
}

function isWriter($writerId) {
  return ($_SESSION['id'] ?? '') === $writerId;
}

switch ($mode) {
  case 'list':
    $sql = "SELECT * FROM board WHERE bid=$bid ORDER BY notice DESC, idx DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);
    echo '<h4>게시판 목록</h4>';
    echo '<div class="d-none d-md-block">';
    echo '<table class="table">';
    echo '<thead><tr><th style="width:10%">#</th><th style="width:50%">제목</th><th style="width:20%">작성자</th><th style="width:20%">작성일</th></tr></thead><tbody>';
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
      $date = substr($row['time'], 0, 10);
      echo "<tr><td>$no</td><td><a href='index.php?cmd=board&mode=show&bid=$bid&idx={$row['idx']}'>{$row['title']}</a></td><td>{$row['name']}</td><td>$date</td></tr>";
      $no++;
    }
    echo '</tbody></table></div>';

    // 모바일 화면
    mysqli_data_seek($result, 0);
    echo '<div class="d-block d-md-none">';
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='d-flex border-bottom py-2'><div class='flex-grow-1'><a href='index.php?cmd=board&mode=show&bid=$bid&idx={$row['idx']}'>{$row['title']}</a></div><div class='text-muted small ms-2'>{$row['name']}</div></div>";
    }
    echo '</div>';

    echo "<div class='mt-3'><a href='index.php?cmd=board&mode=write&bid=$bid' class='btn btn-primary'>글쓰기</a></div>";
    break;

  case 'write':
    echo "<h4>글쓰기</h4>";
    echo "<form method='post' action='index.php?cmd=board&mode=dbWrite&bid=$bid'>";
    if (isAdmin()) echo "<div class='form-check mb-2'><input class='form-check-input' type='checkbox' name='notice' value='1' id='notice'><label class='form-check-label' for='notice'>공지사항</label></div>";
    echo "<input class='form-control mb-2' name='title' placeholder='제목을 입력하세요' required>";
    echo "<input class='form-control mb-2' value='" . htmlspecialchars($_SESSION['user']) . "' readonly>";
    echo "<textarea class='form-control mb-3' name='html' rows='10' required></textarea>";
    echo "<button class='btn btn-primary' type='submit'>글등록</button> ";
    echo "<a href='index.php?cmd=board&mode=list&bid=$bid' class='btn btn-secondary'>목록보기</a>";
    echo "</form>";
    break;

  case 'dbWrite':
    $title = $_POST['title'] ?? '';
    $html = $_POST['html'] ?? '';
    $notice = $_POST['notice'] ?? 0;
    $id = $_SESSION['id'];
    $name = $_SESSION['user'];
    $sql = "INSERT INTO board (bid, title, id, name, html, notice, time) VALUES ($bid, '$title', '$id', '$name', '$html', $notice, NOW())";
    mysqli_query($conn, $sql);
    echo "<script>alert('글이 등록되었습니다.'); location.href='index.php?cmd=board&mode=list&bid=$bid';</script>";
    break;

  case 'show':
    $idx = $_GET['idx'];
    $sql = "SELECT * FROM board WHERE idx=$idx";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo "<h4>{$row['title']}</h4>";
    echo "<div class='mb-2'><strong>{$row['name']}</strong> | <span class='text-muted'>{$row['time']}</span></div>";
    echo "<div style='min-height:300px;' class='border p-3'>{$row['html']}</div>";

    // 이전글 / 다음글
    $prev = mysqli_query($conn, "SELECT idx FROM board WHERE bid=$bid AND idx < $idx ORDER BY idx DESC LIMIT 1");
    $next = mysqli_query($conn, "SELECT idx FROM board WHERE bid=$bid AND idx > $idx ORDER BY idx ASC LIMIT 1");
    $prevRow = mysqli_fetch_assoc($prev);
    $nextRow = mysqli_fetch_assoc($next);
    echo "<div class='mt-3'>";
    echo $prevRow ? "<a href='index.php?cmd=board&mode=show&bid=$bid&idx={$prevRow['idx']}' class='btn btn-outline-primary me-2'>이전글</a>" : "<button class='btn btn-outline-secondary me-2' disabled>이전글</button>";
    echo $nextRow ? "<a href='index.php?cmd=board&mode=show&bid=$bid&idx={$nextRow['idx']}' class='btn btn-outline-primary me-2'>다음글</a>" : "<button class='btn btn-outline-secondary me-2' disabled>다음글</button>";
    echo "<a href='index.php?cmd=board&mode=list&bid=$bid' class='btn btn-secondary'>목록보기</a> ";
    if (isWriter($row['id']) || isAdmin()) {
      echo "<a href='index.php?cmd=board&mode=delete&bid=$bid&idx=$idx' class='btn btn-danger'>삭제</a>";
    }
    echo "</div>";
    break;

  case 'delete':
    $idx = $_GET['idx'];
    $sql = "SELECT id FROM board WHERE idx=$idx";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (isWriter($row['id']) || isAdmin()) {
      mysqli_query($conn, "DELETE FROM board WHERE idx=$idx");
      echo "<script>alert('글이 삭제되었습니다.'); location.href='index.php?cmd=board&mode=list&bid=$bid';</script>";
    } else {
      echo "<script>alert('삭제 권한이 없습니다.'); location.href='index.php';</script>";
    }
    break;
}
?>