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

$sqls = "SELECT * FROM parents WHERE email='$email'";
$results = $conn->query($sqls);

if ($results->num_rows > 0) {
    echo json_encode(array("statusCode"=>201, "message"=>$error1));
  }else{
    $sql = "INSERT INTO parents (name, fn, dob, gender, email, pn, password, school_id, val)
    VALUES ('$name', '$fn', '$dob', '$gender', '$email', '$pn', '$password', '$school_id', '1')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("statusCode"=>200, "message"=>$success));
    } else {
        echo json_encode(array("statusCode"=>201, "message"=>$error2));
    }
  }
$conn->close();
?>