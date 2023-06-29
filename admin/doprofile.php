<?php
include('../db.php');

$id = $_COOKIE['id'];
$type = $_COOKIE['user_type'];
$name = $_POST['name'];
$fn = $_POST['fn'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$pn = $_POST['pn'];

$sql = "UPDATE $type SET name='$name', fn='$fn', dob='$dob', gender='$gender', email='$email', pn='$pn' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  header("Location: profile?true");
} else {
  header("Location: profile?false");
}
$conn->close();
?>