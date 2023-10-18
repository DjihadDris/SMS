<?php
include('../db.php');

$id = $_COOKIE['id'];

if(strlen($_POST['actualpassword']) > 16){
$actualpassword = $_POST['actualpassword'];
}else{
$actualpassword = md5($_POST['actualpassword']);
}
$newpassword = md5($_POST['newpassword']);
$newnewpassword = md5($_POST['newnewpassword']);

$sqld = "SELECT * FROM parents WHERE id='$id'";
$resultd = $conn->query($sqld);

if ($resultd->num_rows > 0) {
  // output data of each row
while($row = $resultd->fetch_assoc()) {

if("$row[password]" == $actualpassword){
if($newpassword == $newnewpassword){

$sql = "UPDATE parents SET password='$newpassword' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
header('Location: details?true');
}else{
header('Location: details?false=errordb');
}

}else{
header('Location: details?false=errornewpassword');
}
}else{
header('Location: details?false=erroractualpassword');
}

}}else{
header('Location: logout');
}
?>