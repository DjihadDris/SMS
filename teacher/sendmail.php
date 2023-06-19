<?php
if(!isset($_POST['email'])){
    header('Location: login');
}
use PHPMailer\PHPMailer\PHPMailer;
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
require '../PHPMailer/Exception.php';
include('../db.php');
include('sendmail_lang.php');
$email=$_POST['email'];
$sql = "SELECT * FROM teachers WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

$name = $row['name'];
$email = $row['email'];
$password = $row['password'];

$message = $yourpassword." ".$password."\r\r".$changepass."\r\r".$title;

try {
    $mail = new PHPMailer(true);

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Your SMTP server hostname
    $mail->SMTPAuth = true;
    $mail->Username = 'djihad139@gmail.com'; // Your SMTP username
    $mail->Password = 'acxvkdwyxkityhfc'; // Your SMTP password
    $mail->SMTPSecure = 'ssl'; // Enable encryption, 'ssl' also accepted
    $mail->Port = 465; // TCP port to connect to

    // Sender and recipient details
    $mail->setFrom('djihad139@gmail.com', "$title");
    $mail->addAddress("$email", "$name");

    // Email content
    $mail->Subject = "$emailtitle";
    $mail->Body = "$message";

    // Send the email
    $mail->send();
    echo json_encode(array("statusCode"=>200, "message"=>$success));
} catch (Exception $e) {
    echo json_encode(array("statusCode"=>201, "message"=>$error_1." ".$mail->ErrorInfo));
}

  }}else{
    echo json_encode(array("statusCode"=>201, "message"=>$error_2));
  }
?>