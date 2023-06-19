<?php
include('../db.php');
include('getlesson_lang.php');

$id=$_POST['id'];
$sql = "SELECT * FROM lessons WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>

<h4><u style="color: #2185d0;"><?php echo $lessonname; ?>:</u> <span><?php echo "$row[name]"; ?></span></h4>
<h4><u style="color: #2185d0;"><?php echo $lessondate; ?>:</u> <span><?php echo "$row[date]"; ?></span></h4>
<h4><u style="color: #2185d0;"><?php echo $lessontime; ?>:</u> <span><?php echo "$row[time]"; ?></span></h4>
<h4><u style="color: #2185d0;"><?php echo $lessontrim; ?>:</u> <span><?php if("$row[trim]" == 1){echo $trim1;}else if("$row[trim]" == 2){echo $trim2;}else if("$row[trim]" == 3){echo $trim3;} ?></span></h4>
<h4><u style="color: #2185d0;"><?php echo $lessondes; ?>:</u></h4><?php echo "$row[des]"; ?>
<h4><u style="color: #2185d0;"><?php echo $lessonimgs; ?>:</u></h4><?php echo "$row[imgs]"; ?>
<h4><u style="color: #2185d0;"><?php echo $lessonfiles; ?>:</u></h4><?php echo "$row[files]"; ?>

<?php
  }}else{
echo "No lesson found..";
  }
$conn->close();
?>