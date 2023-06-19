<?php
include('../db.php');
include('getdiscussion_lang.php');

$sql = "SELECT * FROM chat WHERE class_id='$_COOKIE[class_id]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

$sqls = "SELECT * FROM $row[type] WHERE id='$row[user_id]'";
$results = $conn->query($sqls);   
if ($results->num_rows > 0) {
while($rows = $results->fetch_assoc()) {

  $startTimeStamp = strtotime("$row[date]");
  $endTimeStamp = strtotime(date("Y-m-d"));
  $timeDiff = abs($endTimeStamp - $startTimeStamp);
  $numberDays = $timeDiff/86400;
?>
<div class="container<?php if("$rows[id]" <> $_COOKIE['id'] OR "$row[type]" <> "students"){echo " darker";} ?>">
  <img src="../<?php if("$rows[gender]" == 0){echo "man";}else if("$rows[gender]" == 1){echo "woman";} ?>.png" alt="<?php echo $avatar; ?>"<?php if("$rows[id]" <> $_COOKIE['id'] OR "$row[type]" <> "students"){echo ' class="right"';} ?>>
  <p><?php echo "$row[message]"; ?></p>
  <span class="time-<?php if("$rows[id]" <> $_COOKIE['id'] OR "$row[type]" <> "students"){echo "left";}else{echo "right";} ?>"><?php echo "$rows[name] $rows[fn]"; if($numberDays == 0){echo " ($today";}else if($numberDays == 1){echo " ($yesterday";}else{echo " ($dateshow $row[date]";} echo " $timeshow $row[time])"; ?></span>
</div>
<?php
}}
}}else{
?>
<h5 style="line-height: 375px; text-align: center;"><?php echo $nothing; ?></h5>
<?php
}
$conn->close();
?>

<!-- <div class="container">
  <img src="../man.png" alt="<?php echo $avatar; ?>">
  <p>Hello. How are you today?</p>
  <span class="time-right">11:00</span>
</div>

<div class="container darker">
  <img src="../woman.png" alt="<?php echo $avatar; ?>" class="right">
  <p>Hey! I'm fine. Thanks for asking!</p>
  <span class="time-left">11:01</span>
</div> -->