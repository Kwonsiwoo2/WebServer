<?php
  include ('db_connect.php');
  
  if (!isset($_POST['id']) || $_POST['id'] === '') {
    alertAndBack("아이디를 입력해 주세요.");
    return;
  } 

  if (!isset($_POST['nickname']) || $_POST['nickname'] === '') {
    alertAndBack("닉네임을 입력해 주세요.");
    return;
  } 

  if (!isset($_POST['pwd']) || $_POST['pwd'] === '') {
    alertAndBack("비밀번호를 입력해 주세요.");
    return;
  } 
  
  $id = $_POST['id'];
  $name = $_POST['nickname'];
  $pw = $_POST['pwd'];
  $sql = mq("insert into user (id, nickname, pwd, reg_dt) values ('".$id."','".$name."','".$pw."',NOW())");
  if ($sql) {
    
    session_start();
    
    $_SESSION['userid'] = $id;
    $_SESSION['name'] = $name;
    echo "<script>location.href='notice.php';</script>";
  } else {
    if (strpos($db->error, "PRIMARY") !== false) {
      alertAndBack("이미 사용 중인 아이디 입니다.");
    } else  if (strpos($db->error, "nickname_UNIQUE") !== false) {
      alertAndBack("이미 사용 중인 닉네임 입니다.");
    } else {
      alertAndBack($db->error);
    }
  }
?>