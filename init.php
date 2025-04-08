<!-- Carousel -->
<div id="mainCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/la.jpg" class="d-block w-100" alt="LA">
    </div>
    <div class="carousel-item">
      <img src="img/chicago.jpg" class="d-block w-100" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="img/ny.jpg" class="d-block w-100" alt="NY">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- 게시판 -->
<div class="row">
  <!-- 공지사항 (PC) -->
  <div class="col-md-6 col-12 mb-3">
    <h5 class="border-bottom pb-2">공지사항</h5>
    <ul class="list-unstyled d-none d-md-block">
      <?php for ($i = 1; $i <= 5; $i++): ?>
        <li style="border-bottom: 1px dashed #AAAAAA; padding: 6px 0; display: flex; justify-content: space-between;">
          <span>청주대 공지사항 <?= $i ?></span>
          <span style="color: #888;">플러스센터</span>
        </li>
      <?php endfor; ?>
    </ul>

    <!-- 모바일용 -->
    <ul class="list-unstyled d-block d-md-none">
      <?php for ($i = 1; $i <= 5; $i++): ?>
        <li style="border-bottom: 1px dashed #AAAAAA; padding: 6px 0;">
          청주대 공지사항 <?= $i ?>
        </li>
      <?php endfor; ?>
    </ul>
  </div>

  <!-- 자유게시판 (PC) -->
  <div class="col-md-6 col-12 mb-3" style="margin-top: 0px;">
    <h5 class="border-bottom pb-2">자유게시판</h5>
    <ul class="list-unstyled d-none d-md-block">
      <?php 
        $writers = ['정약용', '이이', '신사임당', '김정희', '허준'];
        for ($i = 1; $i <= 5; $i++): 
      ?>
        <li style="border-bottom: 1px dashed #AAAAAA; padding: 6px 0; display: flex; justify-content: space-between;">
          <span>청주대 자유글 <?= $i ?></span>
          <span style="color: #888;"><?= $writers[$i-1] ?></span>
        </li>
      <?php endfor; ?>
    </ul>

    <!-- 모바일용 -->
    <div class="d-block d-md-none" style="margin-top: 30px;">
      <ul class="list-unstyled">
        <?php for ($i = 1; $i <= 5; $i++): ?>
          <li style="border-bottom: 1px dashed #AAAAAA; padding: 6px 0;">
            청주대 자유글 <?= $i ?>
          </li>
        <?php endfor; ?>
      </ul>
    </div>
  </div>
</div>