<?php
include('../db.php');
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$nochat = "Le chat de cette classe a été bloqué par l'administrateur du site.";
}else{
$nochat = "تم حظر الدردشة لهذا القسم من قبل مدير الموقع.";
}
$class_id = $_POST['class_id'];
$sql = "SELECT * FROM classes WHERE id='$class_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
if("$row[chat]" == 0){
echo 'window.location.href="discussion?id='.$class_id.'"';
}else{
echo 'alertify.alert("'.$nochat.'");';
}
}} else {
echo 'alertify.alert("'.$nochat.'");';
}
$conn->close();
?>