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
$sql = "SELECT * FROM students WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if("$row[gender]" == 0){
      $printgender = $gender0;
    }else{
      $printgender = $gender1;
    }
    $sqls = "SELECT * FROM classes WHERE school_id='$row[school_id]' AND id='$row[class_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {
      $sqlt = "SELECT * FROM years WHERE id='$rows[year_id]'"; $resultt = $conn->query($sqlt); if ($resultt->num_rows > 0) {while($rowt = $resultt->fetch_assoc()) {
      $printyear = "$rowt[name] ";
      if("$rows[div_id]" != ""){
        $sqlf = "SELECT * FROM divs WHERE id='$rows[div_id]'"; $resultf = $conn->query($sqlf); if ($resultf->num_rows > 0) {while($rowf = $resultf->fetch_assoc()) {
    $printdiv = "$rowf[name] ";
        }}else{
          $printdiv = "";
        }
      }else{
        $printdiv = "";
      }
      $printclass = "$rows[name]";}}}}else{$printyear = ""; $printdiv = ""; $printclass = "";}

      $sqll = "SELECT * FROM schools WHERE id='$row[school_id]'";
      $resultl = $conn->query($sqll);
      
      if ($resultl->num_rows > 0) {
        while($rowl = $resultl->fetch_assoc()) {
          $printschool = "$rowl[name]";
        }}else{
          $printschool = "";
        }

    echo json_encode(array("id"=>"$row[id]", "name"=>"$row[name]", "fn"=>"$row[fn]", "dob"=>"$row[dob]", "gender"=>"$row[gender]", "printgender"=>$printgender, "email"=>"$row[email]", "pn"=>"$row[pn]", "school_id"=>"$row[school_id]", "printschool"=>$printschool, "year_id"=>"$row[year_id]", "div_id"=>"$row[div_id]", "class_id"=>"$row[class_id]", "printclass"=>$printyear.$printdiv.$printclass, "code"=>"$row[code]"));
  }}
$conn->close();
?>