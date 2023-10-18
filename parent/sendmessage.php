<?php
include('../db.php');
include('sendmessage_lang.php');
$to_user_id=$_POST['to_user_id'];
$message=$_POST['message'];
$id=$_COOKIE['id'];
$from_type="parents";
$to_type=$_POST['to_type'];
$sql = "INSERT INTO messages (message, from_user_id, to_user_id, vu, from_type, to_type)
VALUES ('$message', '$id', '$to_user_id', '', '$from_type', '$to_type')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("statusCode"=>200, "message"=>$success));
} else {
    echo json_encode(array("statusCode"=>201, "message"=>$error));
}
$conn->close();
?>