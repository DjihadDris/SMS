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
  <input type="email" class="form-control" placeholder="<?php echo $email; ?>" id="remail">
</div>

<div class="input-group mb-3">
  <span class="input-group-text"><?php echo $pn; ?></span>
  <input type="tel" class="form-control" placeholder="<?php echo $pn; ?>" id="rpn">
</div>

<div class="input-group mb-3">
  <span class="input-group-text"><?php echo $school; ?></span>
  <select class="form-control" id="rschool_id" onchange="getmaterials()">
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

<div class="input-group mb-3" id="drmaterial_id" style="display: none;">
  <span class="input-group-text"><?php echo $material; ?></span>
  <select class="form-control" id="rmaterial_id" onchange="getclasses()"></select>
</div>

<div class="input-group mb-3" id="drclass_id" style="display: none;">
  <span class="input-group-text"><?php echo $class; ?></span>
  <select class="form-control" id="rclass_id" multiple></select>
</div>

<div class="input-group mb-3">
  <span class="input-group-text"><?php echo $passwordtext; ?></span>
  <input type="password" class="form-control" placeholder="<?php echo $passwordtext; ?>" id="rpassword" minlength="8" maxlength="16">
</div>

<center><button type="button" class="button" onclick="createaccount()" id="createaccountbtn" style="width: 100%;"><?php echo $btn; ?></button></center>