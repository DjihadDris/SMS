<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$year = "Niveau scolaire";
}else{
$year = "المستوى التعليمي";
}
?>
<option value=""><?php echo $year; ?></option>
<?php
include('../db.php');
$school_id = $_POST['school_id'];
$sql = "SELECT * FROM years WHERE school_id='$school_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<option value='$row[id]' data-value='$row[name]'>$row[name]</option>";
}}
$conn->close();
?>