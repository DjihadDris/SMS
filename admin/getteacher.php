<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$gender0 = "Mâle";
$gender1 = "Femelle";
}else{
$lang = "ar";
$gender0 = "ذكر";
$gender1 = "أنثى";
}
include('../db.php');

$id=$_POST['id'];
$sql = "SELECT * FROM teachers WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if("$row[gender]" == 0){
      $printgender = $gender0;
    }else{
      $printgender = $gender1;
    }
    $sqls = "SELECT * FROM materials WHERE id='$row[material_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {
    $printmaterial = $rows['name'];  
    }}else{$printmaterial = "";}

      $sqll = "SELECT * FROM schools WHERE id='$row[school_id]'";
      $resultl = $conn->query($sqll);
      
      if ($resultl->num_rows > 0) {
        while($rowl = $resultl->fetch_assoc()) {
          $printschool = "$rowl[name]";
        }}else{
          $printschool = "";
        }
        $values = explode(',', $row['class_id']);
        $modifiedValues = array_map(function ($value) {
            return "'" . trim($value) . "'";
        }, $values);
        
        $modifiedString = implode(',', $modifiedValues);
    echo json_encode(array("id"=>"$row[id]", "name"=>"$row[name]", "fn"=>"$row[fn]", "dob"=>"$row[dob]", "gender"=>"$row[gender]", "printgender"=>$printgender, "email"=>"$row[email]", "pn"=>"$row[pn]", "school_id"=>"$row[school_id]", "printschool"=>$printschool, "class_id"=>"$row[class_id]", "class_id2"=>$modifiedString, "material_id"=>"$row[material_id]", "printmaterial"=>$printmaterial, "code"=>"$row[code]"));
  }}
$conn->close();
?>