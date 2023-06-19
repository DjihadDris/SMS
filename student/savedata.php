<?php
include('../db.php');

$id = $_COOKIE['id'];
$name = $_POST['name'];
$fn = $_POST['fn'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$pn = $_POST['pn'];
$school = $_POST['school'];
$year = $_POST['year'];
$div = $_POST['div'];
$class = $_POST['class'];

$sql = "UPDATE students SET name='$name', fn='$fn', dob='$dob', gender='$gender', email='$email', pn='$pn', school_id='$school', year_id='$year', div_id='$div', class_id='$class' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  setcookie("name", "", time()- (60*60*24*30), "/");
  setcookie("name", "$name", time() + (60*60*24*30), "/");
  setcookie("fn", "", time() - (60*60*24*30), "/");
  setcookie("fn", "$fn", time() + (60*60*24*30), "/");
  setcookie("dob", "", time() - (60*60*24*30), "/");
  setcookie("dob", "$dob", time() + (60*60*24*30), "/");
  setcookie("email", "", time() - (60*60*24*30), "/");
  setcookie("email", "$email", time() + (60*60*24*30), "/");
  setcookie("gender", "", time() - (60*60*24*30), "/");
  setcookie("gender", "$gender", time() + (60*60*24*30), "/");
  setcookie("school_id", "", time() - (60*60*24*30), "/");
  setcookie("school_id", "$school", time() + (60*60*24*30), "/");
  setcookie("year_id", "", time() - (60*60*24*30), "/");
  setcookie("year_id", "$year", time() + (60*60*24*30), "/");
  setcookie("div_id", "", time() - (60*60*24*30), "/");
  setcookie("div_id", "$div", time() + (60*60*24*30), "/");
  setcookie("class_id", "", time() - (60*60*24*30), "/");
  setcookie("class_id", "$class", time() + (60*60*24*30), "/");
  header('Location: details?true');
} else {
  header('Location: details?false=errordb');
}

$conn->close();
?>