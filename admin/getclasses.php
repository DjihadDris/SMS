<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$class = "Classe";
}else{
$class = "القسم";
}
?>
<option value=""><?php echo $class; ?></option>
<?php
include('../db.php');
$school_id = $_POST['school_id'];
$year_id = $_POST['year_id'];
$div_id = $_POST['div_id'];
if($div_id == ""){
$sql = "SELECT * FROM classes WHERE school_id='$school_id' AND year_id='$year_id'";
}else{
$sql = "SELECT * FROM classes WHERE school_id='$school_id' AND year_id='$year_id' AND div_id='$div_id'";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<option value='$row[id]' data-value='$row[name]'>$row[name]</option>";
}}
$conn->close();
?>