<?php
include('../db.php');

$id=$_POST['id'];
$sql = "SELECT * FROM years WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo json_encode(array("id"=>"$row[id]", "name"=>"$row[name]", "school_id"=>"$row[school_id]"));
  }}
$conn->close();
?>