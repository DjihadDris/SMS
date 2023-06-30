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
$school_name = $_POST['school_name'];
$tawr = $_POST['tawr'];
$wilaya = $_POST['wilaya'];
$address = $_POST['address'];

$sqls = "SELECT * FROM superadmins WHERE email='$email'";
$results = $conn->query($sqls);

if ($results->num_rows > 0) {
    echo json_encode(array("statusCode"=>201, "message"=>$error1));
  }else{
    $sqlo = "INSERT INTO schools (name, tawr, wilaya, address)
    VALUES ('$name', '$tawr', '$wilaya', '$address')";
    if ($conn->query($sqlo) === TRUE) {
        $inserted_id = $conn->insert_id;
    $sql = "INSERT INTO superadmins (name, fn, dob, gender, email, pn, password, school_id, val)
    VALUES ('$name', '$fn', '$dob', '$gender', '$email', '$pn', '$password', '$inserted_id', '0')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("statusCode"=>200, "message"=>$success));
    } else {
        echo json_encode(array("statusCode"=>201, "message"=>$error2));
    }
    } else {
        echo json_encode(array("statusCode"=>201, "message"=>$error2));
    }
  }
$conn->close();
?>