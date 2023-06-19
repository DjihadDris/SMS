<?php
include('../db.php');

$id = $_POST['id'];
$sql = "UPDATE messages SET vu='yes' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>