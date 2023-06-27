<?php
include('../db.php');

$id = $_POST['id'];
$type = $_POST['type'];

$sql = "DELETE FROM $type WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  if($type == "admins"){
    $sql = "DELETE FROM admins_permissions WHERE user_id='$id'";
    if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
    }else{
      echo "Error deleting record: " . $conn->error;
    }
  }else{
    echo "Record deleted successfully";
  }
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>