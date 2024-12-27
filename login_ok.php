<?php
  include ('db_connect.php');
  
  if (!isset($_POST['id']) || $_POST['id'] === '') {
    alertAndBack("아이디를 입력해 주세요.");
    return;
  } 

  if (!isset($_POST['pwd']) || $_POST['pwd'] === '') {
    alertAndBack("비밀번호를 입력해 주세요.");
    return;
  } 
  
  $id = $_POST['id'];
  $pw = $_POST['pwd'];
  $user = selectOne("select * from user where id='".$id."' and pwd='".$pw."'");
  dbClose();
  if ($user) {
    
    session_start();
    
    $_SESSION['userid'] = $user['id'];
    $_SESSION['name'] = $user['nickname'];
    echo "<script>location.href='notice.php';</script>";
  } else {
    alertAndBack("아이디/비밀번호를 확인해 주세요.");
  }
?>