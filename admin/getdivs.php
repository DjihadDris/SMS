<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$div = "Division";
}else{
$div = "الشعبة";
}
?>
<option value=""><?php echo $div; ?></option>
<?php
include('../db.php');
$school_id = $_POST['school_id'];
$year_id = $_POST['year_id'];
$sql = "SELECT * FROM divs WHERE school_id='$school_id' AND year_id='$year_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<option value='$row[id]' data-value='$row[name]'>$row[name]</option>";
}}
$conn->close();
?>