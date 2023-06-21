<?php
include('../db.php');

$id=$_POST['id'];
$sql = "SELECT * FROM students WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo json_encode(array("id"=>"$row[id]", "name"=>"$row[name]", "fn"=>"$row[fn]", "dob"=>"$row[dob]", "gender"=>"$row[gender]", "email"=>"$row[email]", "pn"=>"$row[pn]", "school_id"=>"$row[school_id]", "year_id"=>"$row[year_id]", "div_id"=>"$row[div_id]", "class_id"=>"$row[class_id]"));
  }}
$conn->close();
?>