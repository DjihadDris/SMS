<?php
include('../db.php');

$id=$_POST['id'];
$sql = "SELECT * FROM materials WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $values = explode(',', $row['class_id']);
    $modifiedValues = array_map(function ($value) {
        return "'" . trim($value) . "'";
    }, $values);
    $modifiedString = implode(',', $modifiedValues);
    echo json_encode(array("id"=>"$row[id]", "name"=>"$row[name]", "school_id"=>"$row[school_id]", "class_id"=>$modifiedString));
  }}
$conn->close();
?>