<?php
include('../db.php');

$id=$_POST['id'];
$sql = "SELECT * FROM news WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "$row[des]";
  }}
$conn->close();
?>