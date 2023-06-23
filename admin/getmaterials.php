<?php
include('../db.php');

if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$choose = "Matière";
}else{
$choose = "المادة";
}
?>
<option value=""><?php echo $choose; ?></option>
<?php
$school_id = $_POST['school_id'];
$sql = "SELECT * FROM materials WHERE school_id='$school_id'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
<option value="<?php echo "$row[id]"; ?>" data-value="<?php echo "$row[name]"; ?>" data-value2="<?php echo "$row[class_id]"; ?>"><?php echo "$row[name] "; ?></option>
<?php
  }}
$conn->close();
?>