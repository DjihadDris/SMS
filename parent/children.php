<?php
if(!isset($_COOKIE['id'])){
  header('Location: login');
}
include('children_lang.php');
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
.content h4 {
  font-family: 'Readex Pro', sans-serif !important;
}
</style>

</head>

<body style="background-color: <?php echo $bbgcolor; ?>; border: <?php echo $bbordersize; ?> <?php echo $bbordercolor; ?> <?php echo $bborderweight; ?>;">

<?php include('sidebar.php'); ?>

<div class="ui tiny modal">
  <i class="close icon"></i>
  <div class="content" id="lessondes">

  </div>
  <div class="actions">
    <div class="ui negative left labeled icon button">
    <?php echo $leave; ?>
      <i class="close icon"></i>
    </div>
  </div>
</div>

<div class="ui top attached tabular menu" style="margin-top: 100px;">
  <a class="item active" data-tab="first"><i class="child icon"></i> <?php echo $childrentitle; ?></a>
</div>
<div class="ui bottom attached tab segment active" data-tab="first">

<button class="ui inverted labeled icon left button green" style="float: <?php if($lang == "ar"){echo "left";}else{echo "right";} ?>;"><i class="add icon"></i> Ajouter</button>

<table class="ui celled table display" id="news" width="100%">
  <thead>
    <tr>
    <th><?php echo $lessonname; ?></th>
    <th><?php echo $lessondate; ?></th>
    <th><?php echo $lessontime; ?></th>
    <th><?php echo $lessonuser; ?></th>
    <th><?php echo $lessonmaterial; ?></th>
    <th><?php echo $lessontrim; ?></th>
    <th></th>
    </tr>
  </thead>
  <tbody>
<?php

include('../db.php');
if(isset($_COOKIE['div_id'])){
$sql = "SELECT * FROM lessons WHERE school_id='$_COOKIE[school_id]' AND year_id='$_COOKIE[year_id]' AND div_id='$_COOKIE[div_id]' AND class_id='$_COOKIE[class_id]'";
}else{
$sql = "SELECT * FROM lessons WHERE school_id='$_COOKIE[school_id]' AND year_id='$_COOKIE[year_id]' AND class_id='$_COOKIE[class_id]'";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo "$row[name]"; ?></td>
<td><?php echo "$row[date]"; ?></td>
<td><?php echo "$row[time]"; ?></td>
<td><?php $user_id="$row[user_id]"; $sqls = "SELECT * FROM teachers WHERE id='$user_id'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name] $rows[fn]";}}else{echo "No user found..";} $conn->close(); ?></td>
<td><?php include('../db.php'); $material_id="$row[material_id]"; $sqls = "SELECT * FROM materials WHERE id='$material_id'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No material found..";} /*$conn->close();*/ ?></td>
<td><?php if("$row[trim]" == 1){echo $trim1;}else if("$row[trim]" == 2){echo $trim2;}else if("$row[trim]" == 3){echo $trim3;} ?></td>
<td><button class="ui button labeled icon right green" type="button" onclick="showmore(<?php echo "$row[id]"; ?>)"><i class="eye icon"></i> <?php echo $detailoflesson; ?></button></td>
</tr>
<?php
  }}
?>
  </tbody>
</table>

</div>


<script>
$('.menu .item')
  .tab()
;
$('.ui.dropdown')
  .dropdown({clearable: true})
;
$(document).ready(function() {
let table = new DataTable('#news', {
    ordering: true,
    searching: true,
    paging: true,
    processing: true,
    destroy: true,
    scrollX: true,
    lengthChange: true,
    responsive: true,
        "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/<?php if($lang == "ar"){echo 'Arabic';}else{echo 'French';} ?>.json"
        }
});

var select = $('#materialFilter');
  select.on('change', function() {
    var val = $.fn.dataTable.util.escapeRegex($(this).val());
    table.column(4).search(val ? '^' + val + '$' : '', true, false).draw();
  });
  table.column(4).data().unique().sort().each(function(d) {
    select.append('<option value="' + d + '">' + d + '</option>');
  });

var select2 = $('#trimFilter');
  select2.on('change', function() {
    var val = $.fn.dataTable.util.escapeRegex($(this).val());
    table.column(5).search(val ? '^' + val + '$' : '', true, false).draw();
  });
  /*var customOrder = ["<?php echo $trim1; ?>", "<?php echo $trim2; ?>", "<?php echo $trim3; ?>"];
  for (var i = 0; i < customOrder.length; i++) {
    select2.append('<option value="' + customOrder[i] + '">' + customOrder[i] + '</option>');
  }
  var remainingOptions = table.column(5).data().unique().sort().filter(function(value) {
    return !customOrder.includes(value);
  });
  remainingOptions.each(function(d) {
    select2.append('<option value="' + d + '">' + d + '</option>');
  });*/

});

function showmore(id){
  $.ajax({
        url: "getlesson.php",
        type: "POST",
        data: {
          id: id
        },
        cache: false,
        success: function(dataResult){
          $('.tiny.modal').modal('show');
          $('#lessondes').html(dataResult);
        }
  });
}
</script>

</body>

</html>