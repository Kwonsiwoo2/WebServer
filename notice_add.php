<?php
  
  session_start();
  function alertAndBack($msg)
  {
    echo "
      <script>
        alert(\"" . $msg . "\");
        history.back();
      </script>";
  }
  if(!isset($_SESSION['userid'])) {
    alertAndBack("로그인 후 이용해 주세요.");
    return;
  }
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
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
        <h1 class="h2">공지사항 등록</h1>        
      </div>

      <!-- <h2>Section title</h2> -->
      <form id="add_form" method="POST" action="notice_add_ok.php" enctype="multipart/form-data">
        <div class="row g-3">
          <div class="col-12">
            <label for="title" class="form-label">제목</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="제목을 입력해 주세요.">
          </div>

          <div class="col-12">
            <label for="content" class="form-label">내용</label>
            <textarea  rows="10" class="form-control" id="content" name="content" placeholder="내용을 입력해 주세요."></textarea>
          </div>


          <div class="col-12">
            <label for="file" class="form-label">첨부파일 <span class="text-body-secondary">(Optional)</span></label>
            <input type="file" class="form-control" id="file" name="file" placeholder="파일을 선택하세요.">
          </div>     
          <div class="col-12 text-end">  
            <button class="btn btn-primary" type="submit">등록</button>
            <a class="btn btn-secondary" href="/board/notice.php">취소</a>
          </div>
        </div>

      </form>
    </main>
  </div>
</div>
<?php include ('footer.php'); ?>
<script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function(){
    $("#add_form").on("submit", function() {
      if($("#title").val() == '') {
        alert("제목을 입력해 주세요.");
        $("#title").focus();
        return false;
      }
      if($("#content").val() == '') {
        alert("내용을 입력해 주세요.");
        $("#content").focus();
        return false;
      }
    });
  });
</script>
</html>
