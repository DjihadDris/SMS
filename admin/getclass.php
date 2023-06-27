<?php
include('../db.php');

$id=$_POST['id'];
$sql = "SELECT * FROM classes WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo json_encode(array("id"=>"$row[id]", "name"=>"$row[name]", "school_id"=>"$row[school_id]", "year_id"=>"$row[year_id]", "div_id"=>"$row[div_id]", "chat"=>"$row[chat]"));
  }}
$conn->close();
?>