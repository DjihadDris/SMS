<?php
include('../db.php');
include('addschool_lang.php');

$id = $_POST['id'];
$name = $_POST['name'];
$tawr = $_POST['tawr'];
$wilaya = $_POST['wilaya'];
$address = $_POST['address'];

$sqls = "SELECT * FROM schools WHERE id='$id'";
$results = $conn->query($sqls);

if ($results->num_rows > 0) {
$sql = "UPDATE schools SET name='$name', tawr='$tawr', wilaya='$wilaya', address='$address' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
  echo json_encode(array("statusCode"=>200, "message"=>$success2));
} else {
  echo json_encode(array("statusCode"=>201, "message"=>$error2));
}
  }else{
$sql = "INSERT INTO schools (name, tawr, wilaya, address)
    VALUES ('$name', '$tawr', '$wilaya', '$address')";
if ($conn->query($sql) === TRUE) {
  echo json_encode(array("statusCode"=>200, "message"=>$success1));
} else {
  echo json_encode(array("statusCode"=>201, "message"=>$error1));
}
  }
$conn->close();
?>