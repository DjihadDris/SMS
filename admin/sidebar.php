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
<a href="dashboard"><i class="fa fa-home mr-3"></i>
<span class="none"><?php echo $dashboard; ?></span>
</a>
</li>
<!--<li class="parent">
<a href="#"><i class="fa fa-calendar-o mr-3"></i>
<span class="none">Full Calendar </span>
</a>
</li>-->
</ul>
</div>
<!--Sidebar Naigation Menu-->
</div>
</div>