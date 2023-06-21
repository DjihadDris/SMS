<?php
include('../db.php');

$id = $_POST['id'];
$user_id = $_COOKIE['id'];
$school_id = $_COOKIE['school_id'];
$user_type = $_COOKIE['user_type'];
$title = $_POST['title'];
$des = $_POST['des'];
$date = date('Y-m-d');
if($id != ""){
$sql = "UPDATE news SET name='$title', des='$des' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
}else{
$sql = "INSERT INTO `news`(`name`, `des`, `date`, `user_id`, `type`, `school_id`)
VALUES ('$title', '$des', '$date', '$user_id', '$user_type', '$school_id')";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>