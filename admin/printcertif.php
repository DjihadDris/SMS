<?php
include('../db.php');

$id = $_POST['id'];
$type = $_POST['type'];
$sql = "SELECT * FROM $type WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>

<?php
  }}
$conn->close();
?>