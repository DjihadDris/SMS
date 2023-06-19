<?php
include('../db.php');

$id = $_COOKIE['id'];
$class_id = $_COOKIE['class_id'];
$message = $_POST['message'];
$date = date('Y-m-d');
$time = date('H:i');
$type = "students";

$sql = "INSERT INTO chat (message, date, time, user_id, class_id, type)
VALUES ('$message', '$date', '$time', '$id', '$class_id', '$type')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>