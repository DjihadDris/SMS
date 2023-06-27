<?php
include('../db.php');
include('addclass_lang.php');

$id = $_POST['id'];
$name = $_POST['name'];
$school_id = $_POST['school_id'];
$year_id = $_POST['year_id'];
$div_id = $_POST['div_id'];
if($_POST['chat'] != 1){
    $chat = '0';
}else{
    $chat = '1';
}

if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
$sqls = "SELECT * FROM classes WHERE id='$id'";
}else{
$sqls = "SELECT * FROM classes WHERE id='$id' AND school_id='$_COOKIE[school_id]'";
}
$results = $conn->query($sqls);

if ($results->num_rows > 0) {
$sql = "UPDATE classes SET name='$name', school_id='$school_id', year_id='$year_id', div_id='$div_id', chat='$chat' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
  echo json_encode(array("statusCode"=>200, "message"=>$success2));
} else {
  echo json_encode(array("statusCode"=>201, "message"=>$error2));
}
  }else{
$sql = "INSERT INTO classes (name, chat, school_id, year_id, div_id)
    VALUES ('$name', '$chat', '$school_id', '$year_id', '$div_id')";
if ($conn->query($sql) === TRUE) {
  echo json_encode(array("statusCode"=>200, "message"=>$success1));
} else {
  echo json_encode(array("statusCode"=>201, "message"=>$error1));
}
  }
$conn->close();
?>