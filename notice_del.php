<?php
  include ('db_connect.php');

  if(!isset($_SESSION['userid'])) {
    alertAndBack("로그인 후 이용해 주세요.");
    return;
  }
  
  
  $idx = $_GET['idx'];
  $bbs = selectOne("select * from bbs where idx = ".$idx);
  if(!$bbs) { 
    alertAndBack("게시글 정보를 찾을 수 없습니다.");
    return;
  }

  if($bbs['user_id'] !== $_SESSION['userid']) {
    alertAndBack("권한이 없습니다.");
    return;
  }


  
  if(deleteOne("delete from bbs where idx=?", $idx)) {
    alertAndGo("공지사항이 삭제 되었습니다.", "notice.php");
  } else {
    alertAndBack("공지사항 삭제에 실패하였습니다.");
  }
  
  dbClose();
?>
