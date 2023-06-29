<?php
include('register_lang.php');
?>
<div class="alert alert-warning"><?php echo $message; ?></div>
<div class="input-group mb-3">
  <span class="input-group-text"><?php echo $name; ?></span>
  <input type="text" class="form-control" placeholder="<?php echo $name; ?>" id="rname">
</div>

<div class="input-group mb-3">
  <span class="input-group-text"><?php echo $fn; ?></span>
  <input type="text" class="form-control" placeholder="<?php echo $fn; ?>" id="rfn">
</div>

<div class="input-group mb-3">
  <span class="input-group-text"><?php echo $dob; ?></span>
  <input type="date" class="form-control" id="rdob">
</div>

<div class="input-group mb-3">
  <span class="input-group-text"><?php echo $gender; ?></span>
  <select class="form-control" id="rgender">
    <option value="">--<?php echo $choose; ?>--</option>
    <option value="0"><?php echo $gender0; ?></option>
    <option value="1"><?php echo $gender1; ?></option>
  </select>
</div>

<div class="input-group mb-3">
  <span class="input-group-text"><?php echo $email; ?></span>
  <input type="text" class="form-control" placeholder="<?php echo $email; ?>" id="remail">
</div>

<div class="input-group mb-3">
  <span class="input-group-text"><?php echo $pn; ?></span>
  <input type="text" class="form-control" placeholder="<?php echo $pn; ?>" id="rpn">
</div>

<div class="input-group mb-3">
  <span class="input-group-text"><?php echo $school; ?></span>
  <select class="form-control" id="rschool_id">
    <option value="">--<?php echo $choose; ?>--</option>
<?php
include('../db.php');

$sql = "SELECT * FROM schools";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
    <option value="<?php echo "$row[id]"; ?>"><?php echo "$row[name]"; ?></option>
<?php
  }}
$conn->close();
?>
  </select>
</div>

<div class="input-group mb-3">
  <span class="input-group-text"><?php echo $passwordtext; ?></span>
  <input type="password" class="form-control" placeholder="<?php echo $passwordtext; ?>" id="rpassword" minlength="8" maxlength="16">
</div>

<center><button type="button" class="btn btn-theme" onclick="createaccount()" style="width: 100%;"><?php echo $btn; ?></button></center>