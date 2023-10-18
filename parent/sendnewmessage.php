<?php
include('sendnewmessage_lang.php');
?>
<div class="ui form">
<div class="field">
<label for="user_id"><?php echo $user_id; ?></label>
<select id="user_id" class="ui search dropdown">
<option value="">--<?php echo $select; ?>--</option>
<?php
include('../db.php');
$sql = "SELECT * FROM teachers WHERE school_id='$_COOKIE[school_id]' ORDER BY name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value='teachers_$row[id]'>$row[name] $row[fn] / $teacher</option>";
  }}
$conn->close();
include('../db.php');
$sql = "SELECT * FROM admins WHERE school_id='$_COOKIE[school_id]' ORDER BY name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value='admins_$row[id]'>$row[name] $row[fn]</option>";
  }}
$conn->close();
include('../db.php');
$sql = "SELECT * FROM superadmins WHERE school_id='$_COOKIE[school_id]' AND id<>1 ORDER BY name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value='superadmins_$row[id]'>$row[name] $row[fn]</option>";
  }}
$conn->close();
?>
</select>
</div>
<div class="field">
<label for="message_text"><?php echo $message_text; ?></label>
<textarea type="text" id="message_text" placeholder="<?php echo $message_text_placeholder; ?>"></textarea>
</div>
<button class="ui button labeled icon left blue" style="width: 100%;" onclick="sendmessage()"><i class="send icon"></i> <?php echo $send_btn_text; ?></button>
</div>