<?php
include('../db.php');
include('codesearch_lang.php');
$code = $_POST['code'];
if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
$sql = "SELECT 'students' as type, name, fn, dob, gender, email, pn, school_id, year_id, div_id, class_id, NULL AS material_id, val FROM students WHERE code='$code' UNION SELECT 'teachers' as type, name, fn, dob, gender, email, pn, school_id, NULL AS year_id, NULL AS div_id, class_id, material_id, val FROM teachers WHERE code='$code'";
}else{
$sql = "SELECT 'students' as type, name, fn, dob, gender, email, pn, school_id, year_id, div_id, class_id, NULL AS material_id, val FROM students WHERE code='$code' AND school_id='$_COOKIE[school_id]' UNION SELECT 'teachers' as type, name, fn, dob, gender, email, pn, school_id, NULL AS year_id, NULL AS div_id, class_id, material_id, val FROM teachers WHERE code='$code' AND school_id='$_COOKIE[school_id]'";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
if("$row[type]" == "students"){
?>
<div class="table-responsive">
<table class="table table-bordered table-striped mt-0">
                                <thead>
                                    <tr>
                                        <th><?php echo $fn; ?></th>
                                        <th><?php echo $name; ?></th>
                                        <th><?php echo $dob; ?></th>
                                        <th><?php echo $gender; ?></th>
                                        <th><?php echo $email; ?></th>
                                        <th><?php echo $pn; ?></th>
                                        <?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
                                        <th><?php echo $school; ?></th>
                                        <?php } ?>
                                        <th><?php echo $year; ?></th>
<?php include('../db.php'); $school_id=$_COOKIE['school_id']; $sqlo = "SELECT * FROM schools WHERE id='$school_id'"; $resulto = $conn->query($sqlo); if ($resulto->num_rows > 0) {while($rowo = $resulto->fetch_assoc()) { if("$rowo[tawr]" == 3){ ?>
                                        <th><?php echo $div; ?></th>
<?php }}} $conn->close(); ?>
                                        <th><?php echo $class; ?></th>
                                        <th><?php echo $val; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
<tr>
<td class="align-middle"><?php echo "$row[fn]"; ?></td>
<td class="align-middle"><?php echo "$row[name]"; ?></td>
<td class="align-middle"><?php echo "$row[dob]"; ?></td>
<td class="align-middle"><?php if("$row[gender]" == 0){echo $gender0;}elseif("$row[gender]" == 1){echo $gender1;}; ?></td>
<td class="align-middle"><?php echo "$row[email]"; ?></td>
<td class="align-middle"><?php echo "$row[pn]"; ?></td>
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
<td class="align-middle"><?php include('../db.php'); $sqls = "SELECT * FROM schools WHERE id='$row[school_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No school found..";} $conn->close(); ?></td>
<?php } ?>
<td class="align-middle"><?php include('../db.php'); $sqls = "SELECT * FROM years WHERE id='$row[year_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No year found..";} $conn->close(); ?></td>
<?php include('../db.php'); $school_id=$_COOKIE['school_id']; $sqlo = "SELECT * FROM schools WHERE id='$school_id'"; $resulto = $conn->query($sqlo); if ($resulto->num_rows > 0) {while($rowo = $resulto->fetch_assoc()) { if("$rowo[tawr]" == 3){ ?>
<td class="align-middle"><?php $sqls = "SELECT * FROM divs WHERE id='$row[div_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}} ?></td>
<?php }}} $conn->close(); ?>
<td class="align-middle"><?php include('../db.php'); $sqls = "SELECT * FROM classes WHERE id='$row[class_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}} ?></td>
<td class="align-middle"><?php if("$row[val]" == 0){echo "<span class='badge badge-success'>$val0</span>";}elseif("$row[val]" == 1){echo "<span class='badge badge-danger'>$val1</span>";} ?></td>
</tr>
                                </tbody>
</table>
</div>
<?php
}else{
?>
<div class="table-responsive">
<table class="table table-bordered table-striped mt-0">
                                <thead>
                                    <th><?php echo $fn; ?></th>
                                    <th><?php echo $name; ?></th>
                                    <th><?php echo $dob; ?></th>
                                    <th><?php echo $gender; ?></th>
                                    <th><?php echo $email; ?></th>
                                    <th><?php echo $pn; ?></th>
                                    <?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
                                    <th><?php echo $school; ?></th>
                                    <?php } ?>
                                    <th><?php echo $material; ?></th>
                                    <th><?php echo $classes; ?></th>
                                    <th><?php echo $val; ?></th>
                                </thead>
                                <tbody>
<tr>
<td class="align-middle"><?php echo "$row[fn]"; ?></td>
<td class="align-middle"><?php echo "$row[name]"; ?></td>
<td class="align-middle"><?php echo "$row[dob]"; ?></td>
<td class="align-middle"><?php if("$row[gender]" == 0){echo $gender0;}elseif("$row[gender]" == 1){echo $gender1;}; ?></td>
<td class="align-middle"><?php echo "$row[email]"; ?></td>
<td class="align-middle"><?php echo "$row[pn]"; ?></td>
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
<td class="align-middle"><?php $sqls = "SELECT * FROM schools WHERE id='$row[school_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No school found..";} $conn->close(); ?></td>
<?php } ?>
<td class="align-middle"><?php include('../db.php'); $sqls = "SELECT * FROM materials WHERE id='$row[material_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No material found..";} $conn->close(); ?></td>
<td class="align-middle"><?php include('../db.php'); $sqlo = "SELECT * FROM classes WHERE school_id='$row[school_id]' AND id IN ($row[class_id])";
    $resulto = $conn->query($sqlo);
    if ($resulto->num_rows > 0) {
      while($rowo = $resulto->fetch_assoc()) {
            $sqlto = "SELECT * FROM years WHERE id='$rowo[year_id]'";
            $resultto = $conn->query($sqlto);
            if ($resultto->num_rows > 0) {
              while($rowto = $resultto->fetch_assoc()) {
 echo "$rowto[name] "; ?><?php if("$rowo[div_id]" != ""){
        $sqlso = "SELECT * FROM divs WHERE id='$rowo[div_id]'";
        $resultso = $conn->query($sqlso);
        if ($resultso->num_rows > 0) {
          while($rowso = $resultso->fetch_assoc()) {
           echo "$rowso[name] ";}} } ?><?php echo "$rowo[name]<br>";
              }}
      }}else{echo "No classes found..";} ?></td>
<td class="align-middle"><?php if("$row[val]" == 0){echo "<span class='badge badge-success'>$val0</span>";}elseif("$row[val]" == 1){echo "<span class='badge badge-danger'>$val1</span>";} ?></td>
</tr>
                                </tbody>
</table>
</div>
<?php
}
}}
?>