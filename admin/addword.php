<?php
include('../db.php');

$word = $_POST['word'];
$school_id = $_POST['school_id'];

$sql = "INSERT INTO `declined_words`(`word`, `school_id`)
VALUES ('$word', '$school_id')";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>