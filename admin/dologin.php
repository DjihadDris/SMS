<?php
include('../db.php');
include('dologin_lang.php');
$email=$_POST['email'];
if(strlen($_POST['password']) > 16){
$password=$_POST['password'];
}else{
$password=md5($_POST['password']);
}
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
    setcookie("id", "$row[id]", time() + (60*60*24*30), "/");
    setcookie("name", "$row[name]", time() + (60*60*24*30), "/");
    setcookie("fn", "$row[fn]", time() + (60*60*24*30), "/");
    setcookie("dob", "$row[dob]", time() + (60*60*24*30), "/");
    setcookie("email", "$row[email]", time() + (60*60*24*30), "/");
    setcookie("gender", "$row[gender]", time() + (60*60*24*30), "/");
    setcookie("school_id", "$row[school_id]", time() + (60*60*24*30), "/");
    setcookie("user_type", "$row[user_type]", time() + (60*60*24*30), "/");
    echo json_encode(array("statusCode"=>200, "message"=>$success));
    }else{
      echo json_encode(array("statusCode"=>201, "message"=>$error1));
    }
  }}else{
    echo json_encode(array("statusCode"=>201, "message"=>$error2));
  }
$conn->close();
?>