<?php
  include ('db_connect.php');

  if(!isset($_SESSION['userid'])) {
    alertAndBack("로그인 후 이용해 주세요.");
    return;
  }
  $user_id = $_SESSION['userid'];
  $user_nickname = $_SESSION['name'];
  
  $title = $_POST['title'];
  $content = $_POST['content'];

  $target_dir = "/home/www/uploads/"; // 파일을 저장할 디렉토리
  $file_name = ($_FILES["file"]["name"]);
  $target_file = $target_dir . $file_name;
  $uploadOk = 1;
  $uuid = generateUUID();
  $new_target_file = $target_dir . $uuid;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
  // 실제 파일 업로드가 있는지 확인
  if(isset($file_name) && $file_name !== '') {
      // 파일을 서버에 저장
      if (move_uploaded_file($_FILES["file"]["tmp_name"], $new_target_file)) {
          //echo "파일 ". htmlspecialchars( basename( $_FILES["file"]["name"])). " 이 업로드되었습니다.";
        $file_path = $uuid;
      } else {
          //echo "파일 ". $_FILES["file"]["tmp_name"]. "<br/>";
          //echo "파일 업로드에 실패했습니다.".$_FILES["file"]["error"]."<br/>";
      }
  }

  if(insertBbs($user_id, $user_nickname, $title, $content, $file_name, $file_path, 'notice')) {
    alertAndGo("공지사항이 등록 되었습니다.", "notice.php");
  } else {
    alertAndBack("공지사항 등록에 실패하였습니다.");
  }
  
  dbClose();
?>
