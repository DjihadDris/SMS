<?php
include('../db.php');
include('adduser_lang.php');

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
$type = $_POST['type'];
if($_POST['mportal'] != 1){
    $mportal = '0';
}else{
    $mportal = '1';
}

if($_POST['mstudents'] != 1){
    $mstudents = '0';
}else{
    $mstudents = '1';
}

if($_POST['mteachers'] != 1){
    $mteachers = '0';
}else{
    $mteachers = '1';
}

if($_POST['mclasses'] != 1){
    $mclasses = '0';
}else{
    $mclasses = '1';
}

if($_POST['mdivs'] != 1){
    $mdivs = '0';
}else{
    $mdivs = '1';
}

if($_POST['myears'] != 1){
    $myears = '0';
}else{
    $myears = '1';
}

if($_POST['mmaterials'] != 1){
    $mmaterials = '0';
}else{
    $mmaterials = '1';
}

if($_POST['mservices'] != 1){
    $mservices = '0';
}else{
    $mservices = '1';
}

if($_POST['mdeclined_words'] != 1){
    $mdeclined_words = '0';
}else{
    $mdeclined_words = '1';
}

if($_POST['mschools'] != 1){
    $mschools = '0';
}else{
    $mschools = '1';
}

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

if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
$sqls = "SELECT * FROM $type WHERE id='$id'";
}else{
$sqls = "SELECT * FROM admins WHERE id='$id' AND school_id='$_COOKIE[school_id]'";
}
$results = $conn->query($sqls);

if ($results->num_rows > 0) {
if($pw != ""){
$sql = "UPDATE $type SET name='$name', fn='$fn', dob='$dob', gender='$gender', email='$email', pn='$pn', school_id='$school_id', password='$password' WHERE id='$id'";
}else{
$sql = "UPDATE $type SET name='$name', fn='$fn', dob='$dob', gender='$gender', email='$email', pn='$pn', school_id='$school_id' WHERE id='$id'";
}
if ($conn->query($sql) === TRUE) {
    if($type == "admins"){
        $sqlu = "UPDATE admins_permissions SET mportal='$mportal', mstudents='$mstudents', mteachers='$mteachers', mclasses='$mclasses', mdivs='$mdivs', myears='$myears', mmaterials='$mmaterials', mservices='$mservices', mdeclined_words='$mdeclined_words', mschools='$mschools' WHERE user_id='$id'";
        if ($conn->query($sqlu) === TRUE) {
            echo json_encode(array("statusCode"=>200, "message"=>$success2));
        }else{
            echo json_encode(array("statusCode"=>201, "message"=>$error2));
        }
    }else{
  echo json_encode(array("statusCode"=>200, "message"=>$success2));
    }
} else {
  echo json_encode(array("statusCode"=>201, "message"=>$error2));
}
  }else{
    if($pw != ""){
      $password = md5($pw);
    }else{
      $password = md5($code);
    }
$sql = "INSERT INTO $type (name, fn, dob, gender, email, pn, password, school_id, val)
    VALUES ('$name', '$fn', '$dob', '$gender', '$email', '$pn', '$password', '$school_id', '0')";
if ($conn->query($sql) === TRUE) {
$inserted_id = $conn->insert_id;
if($type == "admins"){
$sqlm = "INSERT INTO admins_permissions (`mportal`, `mstudents`, `mteachers`, `mclasses`, `mdivs`, `myears`, `mmaterials`, `mservices`, `mdeclined_words`, `mschools`, `user_id`)
    VALUES ('$mportal', '$mstudents', '$mteachers', '$mclasses', '$mdivs', '$myears', '$mmaterials', '$mservices', '$mdeclined_words', '$mschools', '$inserted_id')";
if ($conn->query($sqlm) === TRUE) {
    echo json_encode(array("statusCode"=>200, "message"=>$success1));
}else{
    echo json_encode(array("statusCode"=>201, "message"=>$error1));
}
}else{
    echo json_encode(array("statusCode"=>200, "message"=>$success1));
}
} else {
  echo json_encode(array("statusCode"=>201, "message"=>$error1));
}
  }
$conn->close();
?>