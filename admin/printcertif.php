<?php
include('../db.php');
include('printcertif_lang.php');

function startsWithVowel($word) {
  $vowels = ['A', 'E', 'I', 'O', 'U'];
  $firstCharacter = mb_substr($word, 0, 1, 'UTF-8');
  return in_array(mb_strtoupper($firstCharacter, 'UTF-8'), $vowels);
}

$id = $_POST['id'];
$type = $_POST['type'];

if($type == "students"){

$sql = "SELECT * FROM $type WHERE id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

$sqls = "SELECT * FROM schools WHERE id='$row[school_id]'";
$results = $conn->query($sqls);
if ($results->num_rows > 0) {
  while($rows = $results->fetch_assoc()) {

$sqlt = "SELECT * FROM wilayas WHERE id='$rows[wilaya]'";
$resultt = $conn->query($sqlt);
if ($resultt->num_rows > 0) {
  while($rowt = $resultt->fetch_assoc()) {

    $sqlss = "SELECT * FROM classes WHERE school_id='$row[school_id]' AND id='$row[class_id]'"; $resultss = $conn->query($sqlss); if ($resultss->num_rows > 0) {while($rowss = $resultss->fetch_assoc()) {
      $sqlts = "SELECT * FROM years WHERE id='$rowss[year_id]'"; $resultts = $conn->query($sqlts); if ($resultts->num_rows > 0) {while($rowts = $resultts->fetch_assoc()) {
      $printyear = "$rowts[name] ";
      if("$rowss[div_id]" != ""){
        $sqlf = "SELECT * FROM divs WHERE id='$rowss[div_id]'"; $resultf = $conn->query($sqlf); if ($resultf->num_rows > 0) {while($rowf = $resultf->fetch_assoc()) {
    $printdiv = "$rowf[name] ";
        }}else{
          $printdiv = "";
        }
      }else{
        $printdiv = "";
      }
      $printclass = "$rowss[name]";}}}}else{$printyear = ""; $printdiv = ""; $printclass = "";}

    $name = $row['name'];
    $fn = $row['fn'];
    $dob = $row['dob'];
    $code = $row['code'];
    $school_name = $rows['name'];
    $address = $rows['address'];
    if($lang == "ar"){
    $wilayaf = $rowt['arname'];
    }else{
    $wilayaf = $rowt['frname'];
    }
    if($lang == "ar"){
      $wilaya = "مديرية التربية لولاية ".$wilayaf;
    }else{
    $startsWithVowel = startsWithVowel($wilayaf);
    if ($startsWithVowel) {
      $wilaya = "Direction de l'Education d'".$wilayaf;
    } else {
      $wilaya = "Direction de l'Education de ".$wilayaf;
    }
    }
    $datem = date('m');
    if($datem >= 9 && $datem <= 12){
      $schoolyear = date('Y')."/".(date('Y')+1);
    }else{
      $schoolyear = (date('Y')-1)."/".date('Y');
    }
?>
<h5 style="text-align: center;">
<?php echo $jomhoria; ?>
<br>
<?php echo $wizara; ?>
</h5>
<h5 style="float: left; font-family: 'Libre Barcode 128 Text', cursive; font-size: 30px; height: 0px; margin-top: -15px; margin-left: 25px;"><?php echo $code; ?></h5>
<div style="display: flex; width: 100%; justify-content: space-between; height: 30px; position: relative; top: -40px;">
<h5><?php echo $wilaya; ?></h5>
<h5><?php echo $schoolyeartxt; ?>: <?php echo $schoolyear; ?></h5>
</div>
<h5 style="margin-top: -20px;"><?php echo $school_name; ?></h5>
<h5 style="margin-top: -20px;"><?php echo $certifnum; ?>: <span contenteditable="true">..........</span> / <?php echo date('Y'); ?></h5>
<center>
<h2 style="background: linear-gradient(#000, #fff); width: 175px;"><?php echo $certif; ?></h2>
</center>
<h5>
<span><?php echo $anamodir; ?> <?php echo $school_name; ?> <?php echo $achadoana; ?>:</span>
<br>
<center>
<span style="display: flex; width: 70%; justify-content: space-between; height: 0px;"><span style="margin-<?php if($lang == "ar"){echo "right";}else{echo "left";} ?>: 15px;"><?php echo $fntxt; ?>: <?php echo $fn; ?></span><?php echo $nametxt; ?>: <?php echo $name; ?></span>
<br>
<span><?php echo $dobtxt; ?>: <?php echo $dob; ?></span>
</center>
</h5>
<center><h3 contenteditable="true"><?php echo $continue; ?></h3></center>
<h5>
<span><?php echo $schoolyeartxt; ?>: <?php echo $schoolyear; ?></span>
<br>
<span><?php echo $classtxt; ?>: <?php echo $printyear.$printdiv.$printclass; ?><span>
</h5>
<center><h3 contenteditable="true"><?php echo $today; ?></h3></center>
<h5 style="float: <?php if($lang == "ar"){echo "left";}else{echo "right";} ?>; margin-top: -15px;">
<span><?php echo $horira; ?><?php echo $address; ?> <?php echo $in; ?>: <?php echo date('Y-m-d'); ?><span>
<br>
<span style="margin-<?php if($lang == "ar"){echo "left";}else{echo "right";} ?>: 25px;"><?php echo $sign; ?></span>
</h5>
<?php
  }}}}}}
}else{
  
}
$conn->close();
?>