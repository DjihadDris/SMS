<?php
include('../db.php');

$arname = $_POST['arname'];
$frname = $_POST['frname'];

$sql = "INSERT INTO `wilayas`(`arname`, `frname`)
VALUES ('$arname', '$frname')";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>