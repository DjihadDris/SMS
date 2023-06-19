<?php
include('../db.php');
include('doservice_lang.php');
$name=$_POST['name'];
$id=$_COOKIE['id'];
$school_id=$_COOKIE['school_id'];
$type="teachers";
$sql = "INSERT INTO services (name, user_id, school_id, type)
VALUES ('$name', '$id', '$school_id', '$type')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("statusCode"=>200, "message"=>$success));
} else {
    echo json_encode(array("statusCode"=>201, "message"=>$error));
}
$conn->close();
?>