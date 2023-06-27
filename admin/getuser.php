<?php
include('../db.php');

$id=$_POST['id'];
$type=$_POST['type'];
$sql = "SELECT * FROM $type WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($type == "superadmins"){
    echo json_encode(array("id"=>"$row[id]", "name"=>"$row[name]", "fn"=>"$row[fn]", "dob"=>"$row[dob]", "gender"=>"$row[gender]", "email"=>"$row[email]", "pn"=>"$row[pn]", "school_id"=>"$row[school_id]"));
    }elseif($type == "admins"){
        $sqls = "SELECT * FROM admins_permissions WHERE user_id='$row[id]'";
        $results = $conn->query($sqls);
        
        if ($results->num_rows > 0) {
          while($rows = $results->fetch_assoc()) {
            echo json_encode(array("id"=>"$row[id]", "name"=>"$row[name]", "fn"=>"$row[fn]", "dob"=>"$row[dob]", "gender"=>"$row[gender]", "email"=>"$row[email]", "pn"=>"$row[pn]", "school_id"=>"$row[school_id]", "mportal"=>"$rows[mportal]", "mstudents"=>"$rows[mstudents]", "mteachers"=>"$rows[mteachers]", "mclasses"=>"$rows[mclasses]", "mdivs"=>"$rows[mdivs]", "myears"=>"$rows[myears]", "mmaterials"=>"$rows[mmaterials]", "mservices"=>"$rows[mservices]", "mdeclined_words"=>"$rows[mdeclined_words]", "mschools"=>"$rows[mschools]"));
          }}
    }
  }}
$conn->close();
?>