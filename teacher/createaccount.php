<?php
include('../db.php');
include('createaccount_lang.php');

$name = $_POST['name'];
$fn = $_POST['fn'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$pn = $_POST['pn'];
$password = md5($_POST['password']);
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

$sqls = "SELECT * FROM teachers WHERE email='$email'";
$results = $conn->query($sqls);

if ($results->num_rows > 0) {
    echo json_encode(array("statusCode"=>201, "message"=>$error1));
  }else{
    $sql = "INSERT INTO teachers (name, fn, dob, gender, email, pn, password, code, school_id, class_id, material_id, val)
    VALUES ('$name', '$fn', '$dob', '$gender', '$email', '$pn', '$password', '$code', '$school_id', '$class_id', '$material_id', '1')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("statusCode"=>200, "message"=>$success));
    } else {
        echo json_encode(array("statusCode"=>201, "message"=>$error2));
    }
  }
$conn->close();
?>