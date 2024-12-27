<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);


session_start();
header('Content-Type: text/html; charset=utf-8');

$db = new mysqli("localhost", "root", "k@35956320", "Board");
$db->set_charset("utf8");

function mq($sql)
{
	global $db;
	$result =  $db->query($sql);
	//echo ("mq failed: " . $db->error);
	return $result;
}

function selectOne($sql)
{
	$result = mq($sql);

	if ($result->num_rows > 0) {
		// 데이터가 있으면 하나의 행을 추출
		$one = $result->fetch_assoc();
		return $one;
	} else {
		return null;
	}
}

function alertAndBack($msg)
{
	echo "
		<script>
		  alert(\"" . $msg . "\");
			history.back();
		</script>";
}

function alertAndGo($msg, $url)
{
	echo "
		<script>
		  alert(\"" . $msg . "\");
			location.href='".$url."';
		</script>";
}

function generateUUID()
{
	return uniqid('', true);
}

function dbClose()
{
	global $db;
	$db->close();
}

function insertBbs($user_id, $user_nickname, $title, $content, $file_name, $file_path, $type) {
	global $db;
	// SQL 쿼리 준비
	$sql = "INSERT INTO bbs (type, user_id, user_nickname, title, content, date, file_name, file_path) values (?, ?, ?, ?, ?, NOW(), ?, ?)";

	// 준비된 문장(prepared statement) 생성
	$stmt = $db->prepare($sql);
	if (!$stmt) {
    echo ("prepare() failed: " . $db->error);
	}
	// 변수를 준비된 문장에 바인딩
	$stmt->bind_param("sssssss", $type, $user_id, $user_nickname, $title, $content, $file_name, $file_path); // 'ss'는 두 매개변수가 모두 문자열임을 의미

	$result = false;
	// 쿼리 실행
	if ($stmt->execute()) {
		$result = true;
	} else {
    echo ("stmt->execute() failed: " . $db->error);
	}

	// 준비된 문장 닫기
	$stmt->close();

	return $result;
}


function updateBbs($idx, $title, $content, $file_name, $file_path) {
	global $db;
	// SQL 쿼리 준비
	$sql = "UPDATE bbs SET title =?, content = ?, date = NOW(), file_name = ?, file_path = ? WHERE idx = ?";

	// 준비된 문장(prepared statement) 생성
	$stmt = $db->prepare($sql);
	if (!$stmt) {
    echo ("prepare() failed: " . $db->error);
	}
	// 변수를 준비된 문장에 바인딩
	$stmt->bind_param("ssssi",  $title, $content, $file_name, $file_path, $idx); // 'ss'는 두 매개변수가 모두 문자열임을 의미

	$result = false;
	// 쿼리 실행
	if ($stmt->execute()) {
		$result = true;
	} else {
    echo ("stmt->execute() failed: " . $db->error);
	}

	// 준비된 문장 닫기
	$stmt->close();

	return $result;
}

function hitBbs($idx) {
	global $db;
	// SQL 쿼리 준비
	$sql = "UPDATE bbs SET hit = hit + 1 WHERE idx = ?";

	// 준비된 문장(prepared statement) 생성
	$stmt = $db->prepare($sql);
	if (!$stmt) {
    echo ("prepare() failed: " . $db->error);
	}
	// 변수를 준비된 문장에 바인딩
	$stmt->bind_param("i",  $idx); // 'ss'는 두 매개변수가 모두 문자열임을 의미

	$result = false;
	// 쿼리 실행
	if ($stmt->execute()) {
		$result = true;
	} else {
    echo ("stmt->execute() failed: " . $db->error);
	}

	// 준비된 문장 닫기
	$stmt->close();

	return $result;
}

function deleteOne($sql, $idx) {
	global $db;

	// 준비된 문장(prepared statement) 생성
	$stmt = $db->prepare($sql);
	if (!$stmt) {
    echo ("prepare() failed: " . $db->error);
	}
	// 변수를 준비된 문장에 바인딩
	$stmt->bind_param("i", $idx); 

	$result = false;
	// 쿼리 실행
	if ($stmt->execute()) {
		$result = true;
	} else {
    echo ("stmt->execute() failed: " . $db->error);
	}

	// 준비된 문장 닫기
	$stmt->close();

	return $result;
}
