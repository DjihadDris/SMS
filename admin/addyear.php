<?php
include('../db.php');
include('addyear_lang.php');

$id = $_POST['id'];
$name = $_POST['name'];
$school_id = $_POST['school_id'];

if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
$sqls = "SELECT * FROM years WHERE id='$id'";
}else{
$sqls = "SELECT * FROM years WHERE id='$id' AND school_id='$_COOKIE[school_id]'";
}
$results = $conn->query($sqls);

if ($results->num_rows > 0) {
$sql = "UPDATE years SET name='$name', school_id='$school_id' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
  echo json_encode(array("statusCode"=>200, "message"=>$success2));
} else {
  echo json_encode(array("statusCode"=>201, "message"=>$error2));
}
  }else{
$sql = "INSERT INTO years (name, school_id)
    VALUES ('$name', '$school_id')";
if ($conn->query($sql) === TRUE) {
  echo json_encode(array("statusCode"=>200, "message"=>$success1));
} else {
  echo json_encode(array("statusCode"=>201, "message"=>$error1));
}
  }
$conn->close();
?>