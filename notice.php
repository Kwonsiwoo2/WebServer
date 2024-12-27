<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php include ('db_connect.php'); ?>
<?php include ('head.php'); ?>
  <body>
    <?php include ('darkmode.php'); ?>
    <?php include ('svg.php'); ?>
    <?php include ('header.php'); ?>
    

<div class="container-fluid">
  <div class="row">
    <?php include ('sidebar.php'); ?>
    

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">공지사항</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <!-- <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi"><use xlink:href="#calendar3"/></svg>
            This week
          </button> -->
        </div>
      </div>

      <!-- <h2>Section title</h2> -->
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col" width="80px" class="text-center">번호</th>
              <th scope="col" class="text-center">제목</th>
              <th scope="col" width="100px" class="text-center">조회수</th>
              <th scope="col" width="200px" class="text-center">작성자</th>
              <th scope="col" width="200px" class="text-center">등록일</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              
              if(isset($_GET['page'])){
                $page = $_GET['page'];
              }
              else{
                $page = 1;
              }
              // 테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
              $bbsCount = selectOne("select count(*) cnt from bbs where type='notice'");
              $row_num = $bbsCount['cnt']; //게시판 총 레코드 수
              $list = 5; //한 페이지에 보여줄 개수
              $block_ct = 5; //블록당 보여줄 페이지 개수

              $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
              $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
              $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

              $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
              if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
              $total_block = ceil($total_page/$block_ct); //블럭 총 개수
              $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

              $bbsList = mq("select * from bbs where type='notice' order by idx desc limit $start_num, $list");
              $i=0;
              while ($row = $bbsList->fetch_array()) { 
            ?>
            <tr style="cursor: pointer;" onclick="location.href='notice_view.php?idx=<?= $row['idx'] ?>'">
              <td class="text-center"><?= $row_num - (($page - 1) * $list) - ($i++) ?></td>
              <td><?= $row['title'] ?></td>
              <td class="text-center"><?= $row['hit'] ?></td>
              <td class="text-center"><?= $row['user_nickname'] ?></td>
              <td class="text-center"><?= $row['date'] ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <div class="row" style="margin:0px;">
          <div class="col">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item <?= $page <= 1 ?'disabled':'' ?>"><a class="page-link" href="notice.php?page=<?=$page-1?>">이전</a></li>                
                <?php for($i=$block_start; $i<=$block_end; $i++) { ?>
                <li class="page-item <?= $page == $i ?'active':'' ?>"><a class="page-link" href="notice.php?page=<?=$i?>"><?=$i?></a></li>
                <?php } ?>                
                <li class="page-item <?= $page >= $total_page ?'disabled':'' ?>"><a class="page-link" href="notice.php?page=<?=$page+1?>">다음</a></li>
              </ul>
            </nav>
          </div>
          <?php if(isset($_SESSION['userid'])) {?>
          <div class="col text-end">
            <a class="btn btn-primary mb-3" href="notice_add.php">등록</a>
          </div>
          <?php } ?>
        </div>
      </div>
    </main>
  </div>
</div>
<?php include ('footer.php'); dbClose(); ?>
<script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
