<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$class = "Classe";
}else{
$class = "القسم";
}
include('../db.php');
$school_id = $_POST['school_id'];
$type = $_POST['type'];
if($type == "students"){
$year_id = $_POST['year_id'];
$div_id = $_POST['div_id'];
if($div_id == ""){
$sql = "SELECT * FROM classes WHERE school_id='$school_id' AND year_id='$year_id'";
}else{
$sql = "SELECT * FROM classes WHERE school_id='$school_id' AND year_id='$year_id' AND div_id='$div_id'";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>
<option value=""><?php echo $class; ?></option>
<?php
while($row = $result->fetch_assoc()) {
echo "<option value='$row[id]' data-value='$row[name]'>$row[name]</option>";
}}else{
?>
<option value=""><?php echo $class; ?></option>
<?php
}
}else{
$material_id = $_POST['material_id'];
    $sql = "SELECT * FROM classes WHERE school_id='$school_id' AND id IN ($material_id)";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
            $sqlt = "SELECT * FROM years WHERE id='$row[year_id]'";
            $resultt = $conn->query($sqlt);
            if ($resultt->num_rows > 0) {
              while($rowt = $resultt->fetch_assoc()) {
    ?>
    <option value="<?php echo "$row[id]"; ?>"><?php echo "$rowt[name] "; ?><?php if("$row[div_id]" != ""){
        $sqls = "SELECT * FROM divs WHERE id='$row[div_id]'";
        $results = $conn->query($sqls);
        if ($results->num_rows > 0) {
          while($rows = $results->fetch_assoc()) {
           echo "- $rows[name] ";}} } ?><?php echo "$row[name]"; ?></option>
    <?php
              }}else{
?>
<option value=""><?php echo $class; ?></option>
<?php
              }
      }}else{
?>
<option value=""><?php echo $class; ?></option>
<?php
      }
}
$conn->close();
?>