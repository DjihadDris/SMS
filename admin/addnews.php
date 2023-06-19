<?php
include('../db.php');

$user_id = $_COOKIE['id'];
$user_type = $_COOKIE['user_type'];
$title = $_POST['title'];
$des = $_POST['des'];
$date = date('Y-m-d');

$sql = "INSERT INTO `news`(`name`, `des`, `date`, `user_id`, `type`)
VALUES ('$title', '$des', '$date', '$user_id', '$user_type')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>