<?php
include('../db.php');

$id = $_POST['id'];
$to = $_POST['to'];

$sql = "UPDATE services SET status='$to' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
$conn->close();
?>