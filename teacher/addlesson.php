<?php
include('../db.php');

$user_id = $_COOKIE['id'];
$name = $_POST['name'];
$des = $_POST['des'];
$files = $_POST['files'];
$imgs = $_POST['imgs'];
$trim = $_POST['trim'];
$school_id = $_COOKIE['school_id'];
$material_id = $_COOKIE['material_id'];
$year_id = $_POST['year_id'];
$div_id = $_POST['div_id'];
$class_id = $_POST['class_id'];
$date = date('Y-m-d');
$time = date('H:i');

$sql = "INSERT INTO `lessons`(`name`, `des`, `imgs`, `files`, `date`, `time`, `user_id`, `school_id`, `year_id`, `div_id`, `class_id`, `material_id`, `trim`)
VALUES ('$name', '$des', '$imgs', '$files', '$date', '$time', '$user_id', '$school_id', '$year_id', '$div_id', '$class_id', '$material_id', '$trim')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>