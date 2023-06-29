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

$sqld = "SELECT * FROM $_COOKIE[user_type] WHERE id='$id'";
$resultd = $conn->query($sqld);

if ($resultd->num_rows > 0) {
  // output data of each row
while($row = $resultd->fetch_assoc()) {

if("$row[password]" == $actualpassword){
if($newpassword == $newnewpassword){

$sql = "UPDATE $_COOKIE[user_type] SET password='$newpassword' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
header('Location: profile?true');
}else{
header('Location: profile?false=error');
}

}else{
header('Location: profile?false=errornewpassword');
}
}else{
header('Location: profile?false=erroractualpassword');
}

}}else{
header('Location: logout');
}
?>