<?php
include('../db.php');

$id = $_POST['id'];
$sql = "SELECT * FROM news WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
 echo "<h1 style='text-align: center;'>$row[name]</h1>";
 echo "$row[des]";
  }}
$conn->close();
?>