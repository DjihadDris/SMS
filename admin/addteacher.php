<?php
include('../db.php');
include('addteacher_lang.php');

$id = $_POST['id'];
$name = $_POST['name'];
$fn = $_POST['fn'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$pn = $_POST['pn'];
$pw = $_POST['password'];
$password = md5($pw);
$school_id = $_POST['school_id'];
$array = $_POST['class_id'];
$class_id = implode(', ', $array);
$material_id = $_POST['material_id'];
$n=10; 
function getName($n) { 
/* A, M, Q, W, Z */
    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
    $randomString = ""; 
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters)-1); 
        $randomString .= $characters[$index]; 
    } 
    return $randomString; 
} 
$code = getName($n);

$sqls = "SELECT * FROM teachers WHERE id='$id'";
$results = $conn->query($sqls);

if ($results->num_rows > 0) {
if($pw != ""){
$sql = "UPDATE teachers SET name='$name', fn='$fn', dob='$dob', gender='$gender', email='$email', pn='$pn', school_id='$school_id', class_id='$class_id', material_id='$material_id', password='$password' WHERE id='$id'";
}else{
$sql = "UPDATE teachers SET name='$name', fn='$fn', dob='$dob', gender='$gender', email='$email', pn='$pn', school_id='$school_id', class_id='$class_id', material_id='$material_id' WHERE id='$id'";
}
if ($conn->query($sql) === TRUE) {
  echo json_encode(array("statusCode"=>200, "message"=>$success2));
} else {
  echo json_encode(array("statusCode"=>201, "message"=>$error2));
}
  }else{
$sql = "INSERT INTO teachers (name, fn, dob, gender, email, pn, password, code, school_id, class_id, material_id, val)
    VALUES ('$name', '$fn', '$dob', '$gender', '$email', '$pn', '$password', '$code', '$school_id', '$class_id', '$material_id', '0')";
if ($conn->query($sql) === TRUE) {
  echo json_encode(array("statusCode"=>200, "message"=>$success1));
} else {
  echo json_encode(array("statusCode"=>201, "message"=>$error1));
}
  }
$conn->close();
?>