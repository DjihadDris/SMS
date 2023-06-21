<?php
include('../db.php');
include('addstudent_lang.php');

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
$year_id = $_POST['year_id'];
$div_id = $_POST['div_id'];
$class_id = $_POST['class_id'];
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

$sqls = "SELECT * FROM students WHERE id='$id'";
$results = $conn->query($sqls);

if ($results->num_rows > 0) {
if($pw != ""){
$sql = "UPDATE students SET name='$name', fn='$fn', dob='$dob', gender='$gender', email='$email', pn='$pn', school_id='$school_id', year_id='$year_id', div_id='$div_id', class_id='$class_id', password='$password' WHERE id='$id'";
}else{
$sql = "UPDATE students SET name='$name', fn='$fn', dob='$dob', gender='$gender', email='$email', pn='$pn', school_id='$school_id', year_id='$year_id', div_id='$div_id', class_id='$class_id' WHERE id='$id'";
}
if ($conn->query($sql) === TRUE) {
  echo json_encode(array("statusCode"=>200, "message"=>$success2));
} else {
  echo json_encode(array("statusCode"=>201, "message"=>$error2));
}
  }else{
$sql = "INSERT INTO students (name, fn, dob, gender, email, pn, password, code, school_id, year_id, div_id, class_id, val)
    VALUES ('$name', '$fn', '$dob', '$gender', '$email', '$pn', '$password', '$code', '$school_id', '$year_id', '$div_id', '$class_id', '0')";
if ($conn->query($sql) === TRUE) {
  echo json_encode(array("statusCode"=>200, "message"=>$success1));
} else {
  echo json_encode(array("statusCode"=>201, "message"=>$error1));
}
  }
$conn->close();
?>