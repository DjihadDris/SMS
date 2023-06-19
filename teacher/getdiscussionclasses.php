<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$class = "Classe";
$choose = "Sélectionner";
}else{
$class = "القسم";
$choose = "إختر";
}
?>
<div class='ui form'>
<div class='field'>
<label><?php echo $class; ?></label>
<select class='ui search dropdown' id='chatclass_id' onchange='checkchat()'>
<option value=''>--<?php echo $choose; ?>--</option>
<?php
include('../db.php');
$school_id = $_COOKIE['school_id'];
$sql = "SELECT * FROM classes WHERE school_id='$school_id' AND id IN ($_COOKIE[class_id])";
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
          }}
  }}
$conn->close();
?>
</select>
</div>
</div>