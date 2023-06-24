<?php
include('../db.php');

$id = $_POST['id'];
$val = $_POST['val'];
$type = $_POST['type'];
if($val == 0){
$to = 1;
}elseif($val == 1){
$to = 0;
}else{
$to = 0;
}

$sql = "UPDATE $type SET val='$to' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
$conn->close();
?>