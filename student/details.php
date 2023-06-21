<?php
if(!isset($_COOKIE['id'])){
  header('Location: login');
}
include('details_lang.php');
?>
<!DOCTYPE html>
<html dir="<?php if($lang == "ar"){echo 'rtl';}else{echo 'ltr';} ?>">

<head>
<title><?php echo $title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if($lang == "ar"){ ?>
<link rel="stylesheet" href="https://cdn.rtlcss.com/semantic-ui/2.4.1/semantic.rtl.min.css" integrity="sha384-yXUIpeQfH3cuk6u6Mwu8uyJXB2R3UOLvcha1343UCMA2TA7lQ14BFmrudI6LAP8A" crossorigin="anonymous">
<?php }else{ ?>
<link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">
<?php } ?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="../semantic/dist/semantic.min.js"></script>
<script src="https://cdn.rtlcss.com/semantic-ui/2.4.1/semantic.min.js" integrity="sha384-6urqf2sgCGDfIXcoxTUOVIoQV+jFr/Zuc4O2wCRS6Rnd8w0OJ17C4Oo3PuXu8ZtF" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Readex+Pro&display=swap" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet">

<link href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<?php if($lang == "ar"){ ?>
<link rel="stylesheet" href="../css/alertify.rtl.min.css">
<link rel="stylesheet" href="../css/themes/default.rtl.min.css">
<?php }else{ ?>
  <link rel="stylesheet" href="../css/alertify.min.css">
<link rel="stylesheet" href="../css/themes/default.min.css">
<?php } ?>
<script src="../alertify.min.js"></script>
<script>
alertify.defaults.glossary.title = "<?php echo $title; ?>";
alertify.defaults.glossary.ok = "<?php echo $ok_button; ?>";
alertify.defaults.glossary.cancel = "<?php echo $cancel_button; ?>";
</script>

<style>
body {
  font-family: 'Readex Pro', sans-serif;
  padding: 10px;
}
a {
  font-family: 'Readex Pro', sans-serif !important;
}
button {
  font-family: 'Readex Pro', sans-serif !important;
  cursor: pointer;
}
input {
  font-family: 'Readex Pro', sans-serif !important;
  outline: none;
}
textarea {
  font-family: 'Readex Pro', sans-serif !important;
}
.header, .content, .button {
  font-family: 'Readex Pro', sans-serif !important;
}
</style>

</head>

<body style="background-color: <?php echo $bbgcolor; ?>; border: <?php echo $bbordersize; ?> <?php echo $bbordercolor; ?> <?php echo $bborderweight; ?>;">

<?php include('sidebar.php'); ?>

<?php
if(isset($_GET['false'])){
if($_GET['false'] == "erroractualpassword"){
echo "<script>alertify.alert('Actual password is false..');</script>";
}else if($_GET['false'] == "errornewpassword"){
echo "<script>alertify.alert('Confirmation of new password is false..');</script>";
}else{
echo "<script>alertify.alert('Error..');</script>";
}
}
?>

<div class="ui padded grid">

          <div class="center aligned row" style="margin-top: 50px;">
          <div class="ui column grid profile">

  <div class="column">

  <div class="ui red message"><?php echo $infomessage; ?></div> <!-- attached -->

    <div class="ui raised segment"> <!-- attached -->

<?php
include('../db.php');

$id=$_COOKIE['id'];
$sql = "SELECT * FROM students WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
<a class="ui green ribbon label" style="float: <?php if($lang == "ar"){echo 'right';}else{echo 'left';} ?>;"><?php echo $profile_sec; ?></a>

<form class="ui form" method="POST" action="savedata" enctype="multipart/form-data">
<div class="field">
    <div class="two fields">
      <div class="field">
      <label><?php echo $name; ?></label>
<input type="text" name="name" placeholder="<?php echo $name; ?>" required="" value="<?php echo "$row[name]"; ?>" readonly="">
      </div>
      <div class="field">
      <label><?php echo $fn; ?></label>
<input type="text" name="fn" placeholder="<?php echo $fn; ?>" required="" value="<?php echo "$row[fn]"; ?>" readonly="">
      </div>
    </div>
</div>

<div class="field">
    <div class="two fields">
      <div class="field">
      <label><?php echo $dob; ?></label>
<input type="text" name="dob" placeholder="<?php echo $dob; ?>" required="" value="<?php echo "$row[dob]"; ?>" readonly="">
      </div>
      <div class="field">
      <label><?php echo $gender; ?></label>
<select readonly="" class="ui search dropdown" name="gender">
<option value="0" <?php if("$row[gender]" == 0){echo "selected";}else{echo "disabled";} ?>><?php echo $gender0; ?></option>
<option value="1" <?php if("$row[gender]" == 1){echo "selected";}else{echo "disabled";} ?>><?php echo $gender1; ?></option>
</select>
<!--<input type="text" placeholder="<?php echo $gender; ?>" required="" value="<?php if("$row[gender]" == 0){echo $gender0;}else if("$row[gender]" == 1){echo $gender1;} ?>" readonly="">
<input type="hidden" name="gender" value="<?php echo "$row[gender]"; ?>">-->
</div>
    </div>
</div>

<div class="field">
    <div class="two fields">
      <div class="field">
      <label><?php echo $email; ?></label>
<input type="email" name="email" placeholder="<?php echo $email; ?>" required="" value="<?php echo "$row[email]"; ?>">
      </div>
      <div class="field">
      <label><?php echo $pn; ?></label>
<input type="tel" name="pn" placeholder="<?php echo $pn; ?>" required="" value="<?php echo "$row[pn]"; ?>" pattern="[0-9]{10}">
      </div>
    </div>
</div>
<div class="field">
    <div class="two fields">
      <div class="field">
      <label><?php echo $school; ?></label>
<input type="text" placeholder="<?php echo $school; ?>" required="" value="<?php $school_id=$_COOKIE['school_id']; $sqls = "SELECT * FROM schools WHERE id='$school_id'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No school found..";} $conn->close(); ?>" readonly="">
<input type="hidden" name="school" value="<?php echo "$row[school_id]" ?>">      
</div>
      <div class="field">
      <label><?php echo $year; ?></label>
<input type="text" placeholder="<?php echo $year; ?>" required="" value="<?php include('../db.php'); $year_id=$_COOKIE['year_id']; $sqls = "SELECT * FROM years WHERE id='$year_id'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No year found..";} $conn->close(); ?>" readonly="">
<input type="hidden" name="year" value="<?php echo "$row[year_id]" ?>">         
</div>
    </div>
</div>

<div class="field">
    <div class="two fields">
<?php if("$row[div_id]" != ""){ ?>
      <div class="field">
      <label><?php echo $div; ?></label>
<input type="text" placeholder="<?php echo $div; ?>" required="" value="<?php include('../db.php'); $div_id=$_COOKIE['div_id']; $sqls = "SELECT * FROM divs WHERE id='$div_id'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No div found..";} $conn->close(); ?>" readonly="">
<input type="hidden" name="div" value="<?php echo "$row[div_id]" ?>">         
</div>
<?php } ?>
      <div class="field">
      <label><?php echo $class; ?></label>
<input type="text" placeholder="<?php echo $class; ?>" required="" value="<?php include('../db.php'); $class_id=$_COOKIE['class_id']; $sqls = "SELECT * FROM classes WHERE id='$class_id'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No class found..";} $conn->close(); ?>" readonly="">
<input type="hidden" name="class" value="<?php echo "$row[class_id]" ?>">         
</div>
    </div>
</div>

<div class="field" style="margin-bottom: 10px !important;">
<button type="submit" class="ui labeled icon button green inverted right" style="width: 100% !important;"><i class="save icon"></i> <?php echo $savebtn; ?></button>
  </div>
</form>
<?php
  }}else{
    echo "No data found..<br>";
  }
/*$conn->close();*/
?>


<a class="ui red ribbon label" style="float: <?php if($lang == "ar"){echo 'right';}else{echo 'left';} ?>;"><?php echo $password_sec; ?></a>
      
<form class="ui form" method="POST" action="dopassword" enctype="multipart/form-data">

  <div class="field">
    <label><?php echo $actualpassword; ?></label>
      <div class="field">
<input type="password" required="" name="actualpassword" placeholder="<?php echo $actualpassword; ?>" minlength="8">
      </div>
      <label><?php echo $newpassword; ?></label>
      <div class="field">
<input type="password" required="" name="newpassword" placeholder="<?php echo $newpassword; ?>" minlength="8" maxlength="16">
      </div>
      <label><?php echo $newnewpassword; ?></label>
      <div class="field">
<input type="password" required="" name="newnewpassword" placeholder="<?php echo $newnewpassword; ?>" minlength="8" maxlength="16">
      </div>
    </div>

  <div class="field" style="margin-bottom: 10px !important;">
<button type="submit" class="ui labeled icon button green inverted right" style="width: 100% !important;"><i class="save icon"></i> <?php echo $savebtn; ?></button>
  </div>
</form>

    </div>
  </div>
</div>
          </div>
        </div>

<script>
$('.ui.search.dropdown')
.dropdown({clearable: false})
;
</script>

</body>

</html>