<?php
include('../db.php');

if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$choose = "Sélectionner";
}else{
$choose = "إختر";
}

$school_id = $_POST['school_id'];
$year_id = $_POST['year_id'];
$div_id = $_POST['div_id'];
$sql = "SELECT * FROM classes WHERE school_id='$school_id' AND year_id='$year_id' AND div_id='$div_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
<option value="">--<?php echo $choose; ?>--</option>
<?php
  while($row = $result->fetch_assoc()) {
?>
<option value="<?php echo "$row[id]"; ?>"><?php echo "$row[name]"; ?></option>
<?php
  }}
$conn->close();
?>