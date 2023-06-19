<?php
include('sendnewmessage_lang.php');
?>
<div class="form-group">
<label for="user_id"><?php echo $user_id; ?></label>
<select id="user_id" class="form-control">
<option value="">--<?php echo $select; ?>--</option>
<?php
include('../db.php');
$sql = "SELECT * FROM students WHERE school_id='$_COOKIE[school_id]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value='students_$row[id]'>$row[name] $row[fn] / $student</option>";
  }}
$conn->close();
include('../db.php');
$sql = "SELECT * FROM teachers WHERE school_id='$_COOKIE[school_id]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value='teachers_$row[id]'>$row[name] $row[fn] / $teacher</option>";
  }}
$conn->close();
include('../db.php');
$id=$_COOKIE['id'];
$type=$_COOKIE['user_type'];
if($type == 'superadmins'){
$sql = "SELECT * FROM admins WHERE school_id='$_COOKIE[school_id]'";
}else{
$sql = "SELECT * FROM superadmins WHERE school_id='$_COOKIE[school_id]'";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
if($type == 'superadmins'){
echo "<option value='admins_$row[id]'>$row[name] $row[fn]</option>";
}else{
echo "<option value='superadmins_$row[id]'>$row[name] $row[fn]</option>";
}
  }}
$conn->close();
?>
</select>
</div>
<!--<div class="form-group">
<label class="control-label" for="message_text"><?php echo $message_text; ?></label>
<textarea class="from-control" id="message_text" placeholder="<?php echo $message_text_placeholder; ?>"></textarea>
</div>-->
<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text"><?php echo $message_text; ?></span>
</div>
<textarea class="form-control" id="message_text" placeholder="<?php echo $message_text_placeholder; ?>"></textarea>
</div>
<div class="form-group">
<button class="btn btn-outline-success" style="width: 100%;" onclick="sendmessage()"><i class="fa fa-send"></i> <?php echo $send_btn_text; ?></button>
</div>