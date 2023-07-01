<?php
include('../db.php');
include('dologin_lang.php');
$email=$_POST['email'];
if(strlen($_POST['password']) > 16){
$password=$_POST['password'];
}else{
$password=md5($_POST['password']);
}
$date = date('Y-m-d');
$time = date('H:i');
$lastlat = $_POST['lastlat'];
$lastlong = $_POST['lastlong'];
$lastip = $_POST['lastip'];
$sql = "SELECT 'superadmins' AS user_type, id, name, fn, dob, email, gender, password, school_id, val
FROM superadmins
WHERE email = '$email' AND password = '$password'
UNION
SELECT 'admins' AS user_type, id, name, fn, dob, email, gender, password, school_id, val
FROM admins
WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if("$row[val]" == 0){
$sql = "UPDATE $row[user_type] SET lastdate='$date', lasttime='$time', lastlat='$lastlat', lastlong='$lastlong', lastip='$lastip' WHERE id=$row[id]";

if ($conn->query($sql) === TRUE) {
  setcookie("id", "$row[id]", time() + 3600, "/");
  setcookie("name", "$row[name]", time() + 3600, "/");
  setcookie("fn", "$row[fn]", time() + 3600, "/");
  setcookie("dob", "$row[dob]", time() + 3600, "/");
  setcookie("email", "$row[email]", time() + 3600, "/");
  setcookie("gender", "$row[gender]", time() + 3600, "/");
  setcookie("school_id", "$row[school_id]", time() + 3600, "/");
  setcookie("user_type", "$row[user_type]", time() + 3600, "/");
  echo json_encode(array("statusCode"=>200, "message"=>$success));
} else {
  echo json_encode(array("statusCode"=>201, "message"=>$error1));
}
    }else{
      echo json_encode(array("statusCode"=>201, "message"=>$error1));
    }
  }}else{
    echo json_encode(array("statusCode"=>201, "message"=>$error2));
  }
$conn->close();
?>