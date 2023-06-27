<?php
include('sidebar_lang.php');
?>
<div class="col-sm-3 col-xs-6 sidebar pl-0">
<div class="inner-sidebar mr-3">
<!--Image Avatar-->
<div class="avatar text-center">
<img src="../<?php if($_COOKIE['gender'] == 0){echo "man";}else{echo "woman";} ?>.png" class="rounded-circle">
<p><strong><?php echo $_COOKIE['name']." ".$_COOKIE['fn']; ?></strong></p>
<span class="text-primary small"><strong><?php include('../db.php'); $school_id=$_COOKIE['school_id']; $sql = "SELECT * FROM schools WHERE id='$school_id'"; $result = $conn->query($sql); if ($result->num_rows > 0) {while($row = $result->fetch_assoc()) {echo "$row[name]";}} else {echo "No school found..";} $conn->close(); ?></strong></span>
</div>
<!--Image Avatar-->

<!--Sidebar Navigation Menu-->
<div class="sidebar-menu-container">
<ul class="sidebar-menu mt-4 mb-4">
<li class="parent">
<a href="dashboard"><i class="fas fa-home mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $dashboard; ?></span>
</a>
</li>
<?php
if($_COOKIE['user_type'] == "superadmins"){
?>
<li class="parent">
<a href="portal"><i class="fas fa-sign-in-alt mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $portal; ?></span>
</a>
</li>
<?php
}elseif($_COOKIE['user_type'] == "admins"){
include('../db.php'); $sqlm = "SELECT * FROM admins_permissions WHERE user_id='$_COOKIE[id]'"; $resultm = $conn->query($sqlm); if ($resultm->num_rows > 0) {while($rowm = $resultm->fetch_assoc()) { if("$rowm[mportal]" == 0){
?>
<li class="parent">
<a href="portal"><i class="fas fa-sign-in-alt mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $portal; ?></span>
</a>
</li>
<?php
}}}
$conn->close();
}
?>
<?php
if($_COOKIE['user_type'] == "superadmins"){
?>
<li class="parent">
<a href="students"><i class="fas fa-user-graduate mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $students; ?></span>
</a>
</li>
<?php
}elseif($_COOKIE['user_type'] == "admins"){
include('../db.php'); $sqlm = "SELECT * FROM admins_permissions WHERE user_id='$_COOKIE[id]'"; $resultm = $conn->query($sqlm); if ($resultm->num_rows > 0) {while($rowm = $resultm->fetch_assoc()) { if("$rowm[mstudents]" == 0){
?>
<li class="parent">
<a href="students"><i class="fas fa-user-graduate mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $students; ?></span>
</a>
</li>
<?php
}}}
$conn->close();
}
?>
<?php
if($_COOKIE['user_type'] == "superadmins"){
?>
<li class="parent">
<a href="teachers"><i class="fas fa-chalkboard-teacher mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $teachers; ?></span>
</a>
</li>
<?php
}elseif($_COOKIE['user_type'] == "admins"){
include('../db.php'); $sqlm = "SELECT * FROM admins_permissions WHERE user_id='$_COOKIE[id]'"; $resultm = $conn->query($sqlm); if ($resultm->num_rows > 0) {while($rowm = $resultm->fetch_assoc()) { if("$rowm[mteachers]" == 0){
?>
<li class="parent">
<a href="teachers"><i class="fas fa-chalkboard-teacher mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $teachers; ?></span>
</a>
</li>
<?php
}}}
$conn->close();
}
?>
<?php if($_COOKIE['user_type'] == "superadmins"){ ?>
<li class="parent">
<a href="users"><i class="fas fa-users mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $users; ?></span>
</a>
</li>
<?php } ?>
<?php
if($_COOKIE['user_type'] == "superadmins"){
?>
<li class="parent">
<a href="classes"><i class="fas fa-chalkboard mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $classes; ?></span>
</a>
</li>
<?php
}elseif($_COOKIE['user_type'] == "admins"){
include('../db.php'); $sqlm = "SELECT * FROM admins_permissions WHERE user_id='$_COOKIE[id]'"; $resultm = $conn->query($sqlm); if ($resultm->num_rows > 0) {while($rowm = $resultm->fetch_assoc()) { if("$rowm[mclasses]" == 0){
?>
<li class="parent">
<a href="classes"><i class="fas fa-chalkboard mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $classes; ?></span>
</a>
</li>
<?php
}}}
$conn->close();
}
?>
<?php
if($_COOKIE['user_type'] == "superadmins"){
?>
<?php include('../db.php'); $school_id=$_COOKIE['school_id']; $sql = "SELECT * FROM schools WHERE id='$school_id'"; $result = $conn->query($sql); if ($result->num_rows > 0) {while($row = $result->fetch_assoc()) { if("$row[tawr]" == 3){ ?>
<li class="parent">
<a href="divs"><i class="fas fa-network-wired mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $divs; ?></span>
</a>
</li>
<?php }}} $conn->close(); ?>
<?php
}elseif($_COOKIE['user_type'] == "admins"){
include('../db.php');
$sqlm = "SELECT * FROM admins_permissions WHERE user_id='$_COOKIE[id]'"; $resultm = $conn->query($sqlm); if ($resultm->num_rows > 0) {while($rowm = $resultm->fetch_assoc()) { if("$rowm[mdivs]" == 0){
$school_id=$_COOKIE['school_id']; $sql = "SELECT * FROM schools WHERE id='$school_id'"; $result = $conn->query($sql); if ($result->num_rows > 0) {while($row = $result->fetch_assoc()) { if("$row[tawr]" == 3){
?>
<li class="parent">
<a href="divs"><i class="fas fa-network-wired mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $divs; ?></span>
</a>
</li>
<?php
}}}}}}
$conn->close();
}
?>
<?php
if($_COOKIE['user_type'] == "superadmins"){
?>
<li class="parent">
<a href="years"><i class="fas fa-layer-group mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $years; ?></span>
</a>
</li>
<?php
}elseif($_COOKIE['user_type'] == "admins"){
include('../db.php'); $sqlm = "SELECT * FROM admins_permissions WHERE user_id='$_COOKIE[id]'"; $resultm = $conn->query($sqlm); if ($resultm->num_rows > 0) {while($rowm = $resultm->fetch_assoc()) { if("$rowm[myears]" == 0){
?>
<li class="parent">
<a href="years"><i class="fas fa-layer-group mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $years; ?></span>
</a>
</li>
<?php
}}}
$conn->close();
}
?>
<?php
if($_COOKIE['user_type'] == "superadmins"){
?>
<li class="parent">
<a href="materials"><i class="fas fa-stream mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $materials; ?></span>
</a>
</li>
<?php
}elseif($_COOKIE['user_type'] == "admins"){
include('../db.php'); $sqlm = "SELECT * FROM admins_permissions WHERE user_id='$_COOKIE[id]'"; $resultm = $conn->query($sqlm); if ($resultm->num_rows > 0) {while($rowm = $resultm->fetch_assoc()) { if("$rowm[mmaterials]" == 0){
?>
<li class="parent">
<a href="materials"><i class="fas fa-stream mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $materials; ?></span>
</a>
</li>
<?php
}}}
$conn->close();
}
?>
<?php
if($_COOKIE['user_type'] == "superadmins"){
?>
<li class="parent">
<a href="services"><i class="fas fa-list-ul mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $services; ?></span>
</a>
</li>
<?php
}elseif($_COOKIE['user_type'] == "admins"){
include('../db.php'); $sqlm = "SELECT * FROM admins_permissions WHERE user_id='$_COOKIE[id]'"; $resultm = $conn->query($sqlm); if ($resultm->num_rows > 0) {while($rowm = $resultm->fetch_assoc()) { if("$rowm[mservices]" == 0){
?>
<li class="parent">
<a href="services"><i class="fas fa-list-ul mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $services; ?></span>
</a>
</li>
<?php
}}}
$conn->close();
}
?>
<?php
if($_COOKIE['user_type'] == "superadmins"){
?>
<li class="parent">
<a href="declined_words"><i class="fas fa-comment-slash mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $declined_words; ?></span>
</a>
</li>
<?php
}elseif($_COOKIE['user_type'] == "admins"){
include('../db.php'); $sqlm = "SELECT * FROM admins_permissions WHERE user_id='$_COOKIE[id]'"; $resultm = $conn->query($sqlm); if ($resultm->num_rows > 0) {while($rowm = $resultm->fetch_assoc()) { if("$rowm[mdeclined_words]" == 0){
?>
<li class="parent">
<a href="declined_words"><i class="fas fa-comment-slash mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $declined_words; ?></span>
</a>
</li>
<?php
}}}
$conn->close();
}
?>
<?php
if($_COOKIE['user_type'] == "superadmins"){
?>
<li class="parent">
<a href="schools"><i class="fas fa-school mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $schools; ?></span>
</a>
</li>
<?php
}elseif($_COOKIE['user_type'] == "admins"){
include('../db.php'); $sqlm = "SELECT * FROM admins_permissions WHERE user_id='$_COOKIE[id]'"; $resultm = $conn->query($sqlm); if ($resultm->num_rows > 0) {while($rowm = $resultm->fetch_assoc()) { if("$rowm[mschools]" == 0){
?>
<li class="parent">
<a href="schools"><i class="fas fa-school mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $schools; ?></span>
</a>
</li>
<?php
}}}
$conn->close();
}
?>
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
<li class="parent">
<a href="wilayas"><i class="fas fa-map-marked-alt mr-3" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>"></i>
<span class="none"><?php echo $wilayas; ?></span>
</a>
</li>
<?php } ?>
</ul>
</div>
<!--Sidebar Naigation Menu-->
</div>
</div>