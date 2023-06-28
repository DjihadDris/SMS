<?php
include('../db.php');

$id = $_COOKIE['school_id'];
$name = $_POST['name'];
$tawr = $_POST['tawr'];
$wilaya = $_POST['wilaya'];
$address = $_POST['address'];

$sql = "UPDATE schools SET name='$name', tawr='$tawr', wilaya='$wilaya', address='$address' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  header("Location: schools?true");
} else {
  header("Location: schools?false");
}
$conn->close();
?>