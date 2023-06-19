<?php
if(!isset($_COOKIE['id'])){
  header('Location: login');
}
include('lessons_lang.php');
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
<script src="https://cdn.tiny.cloud/1/1pz0lp632p1tc3y9nfmzy0wsl4c2xx0n0bidpi0s53fsc2l6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

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


<div class="ui basic modal">
  <i class="close icon"></i>
  <div class="header">
  <?php echo $addlesson; ?>
  </div>
  <div class="content">
<div class="ui form segment">
<div class="ui dimmer"><div class="ui loader"></div></div>
<div class="field">
<label><?php echo $lessonname; ?> <span style="color: red;">*</span></label>
<input type="text" id="namelesson" placeholder="<?php echo $lessonname; ?>">
</div>

<div class="field">
<label><?php echo $lessondes; ?> <span style="color: red;">*</span></label>
<textarea id="deslesson"></textarea>
</div>

<div class="field">
<label><?php echo $lessonfiles; ?></label>
<input type="file" id="uploadFiles" onchange="uploadFile(this, 'Files')">
</div>

<div class="field" id="previewFiles" style="display: none;"></div>

<div class="field">
<label><?php echo $lessonimgs; ?></label>
<input type="file" id="uploadImgs" onchange="uploadFile(this, 'Imgs')" accept="image/*">
</div>

<div class="field" id="previewImgs" style="display: none;"><div class="ui two cards" id="cardsImgs"></div></div>

<div class="field">
<label><?php echo $lessontrim; ?> <span style="color: red;">*</span></label>
<select class="ui search dropdown" id="trimlesson">
<option value="">--<?php echo $choose; ?>--</option>
<option value="1"><?php echo $trim1; ?></option>
<option value="2"><?php echo $trim2; ?></option>
<option value="3"><?php echo $trim3; ?></option>
</select>
</div>

<div class="field">
<label><?php echo $lessonclass; ?> <span style="color: red;">*</span></label>
<select class="ui search dropdown" id="classlesson">
<option value="">--<?php echo $choose; ?>--</option>
<?php
include('../db.php');
$school_id = $_COOKIE['school_id'];
$sql = "SELECT * FROM classes WHERE school_id='$school_id' AND id IN ($_COOKIE[class_id])";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
        $sqlt = "SELECT * FROM years WHERE id='$row[year_id]'";
        $resultt = $conn->query($sqlt);
        if ($resultt->num_rows > 0) {
          while($rowt = $resultt->fetch_assoc()) {
?>
<option value="<?php echo "$rowt[id]_";$sqls = "SELECT * FROM divs WHERE id='$row[div_id]'";
    $results = $conn->query($sqls);
    if ($results->num_rows > 0) {
      while($rows = $results->fetch_assoc()) {
       echo "$rows[id]";}}else{echo "";} echo "_$row[id]"; ?>"><?php echo "$rowt[name] "; ?><?php if("$row[div_id]" != ""){
    $sqls = "SELECT * FROM divs WHERE id='$row[div_id]'";
    $results = $conn->query($sqls);
    if ($results->num_rows > 0) {
      while($rows = $results->fetch_assoc()) {
       echo "- $rows[name] ";}} } ?><?php echo "$row[name]"; ?></option>
<?php
          }}
  }}
$conn->close();
?>
</select>
</div>

<div class="filed">
<button class="ui green button labeled left icon inverted" style="width: 100%;" onclick="savelesson()"><i class="save icon"></i> <?php echo $savebtn; ?></button>
</div>

</div>
  </div>
  <div class="actions">
    <div class="ui negative left labeled icon button">
    <?php echo $leave; ?>
      <i class="close icon"></i>
    </div>
  </div>
</div>


<div class="ui tiny modal">
  <i class="close icon"></i>
  <div class="header">
  <?php echo $lessondetail; ?>
  </div>
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
  <a class="item active" data-tab="first"><i class="file alternate outline icon"></i> <?php echo $lessonstitle; ?></a>
</div>
<div class="ui bottom attached tab segment active" data-tab="first">

<div class="ui form segment blue raised">
  <div class="three fields">
<div class="field">
<label><?php echo $lessontrim; ?></label>
<select class="ui search dropdown" id="trimFilter">
<option value=""></option>
<option value="<?php echo $trim1; ?>"><?php echo $trim1; ?></option>
<option value="<?php echo $trim2; ?>"><?php echo $trim2; ?></option>
<option value="<?php echo $trim3; ?>"><?php echo $trim3; ?></option>
</select>
</div>
<div class="field">
<label><?php echo $lessonclass; ?></label>
<select class="ui search dropdown" id="classFilter">
<option value=""></option>
</select>
</div>
<div class="field">
<label><?php echo $addlesson; ?></label>
<button class="ui blue button labeled left icon" style="width: 100%;" onclick="addnewlesson()"><i class="add icon"></i> <?php echo $addlesson; ?></button>
</div>
</div>
</div>

<table class="ui celled table display" id="news" width="100%">
  <thead>
    <tr>
    <th><?php echo $lessonname; ?></th>
    <th><?php echo $lessondate; ?></th>
    <th><?php echo $lessontime; ?></th>
    <th><?php echo $lessonclass; ?></th>
    <th><?php echo $lessontrim; ?></th>
    <th></th>
    </tr>
  </thead>
  <tbody>
<?php

include('../db.php');

$sql = "SELECT * FROM lessons WHERE school_id='$_COOKIE[school_id]' AND class_id IN ($_COOKIE[class_id]) AND material_id='$_COOKIE[material_id]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo "$row[name]"; ?></td>
<td><?php echo "$row[date]"; ?></td>
<td><?php echo "$row[time]"; ?></td>
<td><?php $class_id=$_COOKIE['class_id']; $sqls = "SELECT * FROM classes WHERE school_id='$_COOKIE[school_id]' AND id IN ($row[class_id])"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {
  $sqlt = "SELECT * FROM years WHERE id='$rows[year_id]'"; $resultt = $conn->query($sqlt); if ($resultt->num_rows > 0) {while($rowt = $resultt->fetch_assoc()) {
  echo "$rowt[name] ";
  if("$rows[div_id]" != ""){
    $sqlf = "SELECT * FROM divs WHERE id='$rows[div_id]'"; $resultf = $conn->query($sqlf); if ($resultf->num_rows > 0) {while($rowf = $resultf->fetch_assoc()) {
echo "- $rowf[name] ";
    }}
  }
  echo "$rows[name] ";}}}}else{echo "No class found..";} ?></td>
<td><?php if("$row[trim]" == 1){echo $trim1;}else if("$row[trim]" == 2){echo $trim2;}else if("$row[trim]" == 3){echo $trim3;} ?></td>
<td><div class="ui buttons"><button class="ui button labeled icon left green" type="button" onclick="showmore(<?php echo "$row[id]"; ?>)"><i class="eye icon"></i> <?php echo $detailoflesson; ?></button><div class="or" data-text="<?php echo $ortext; ?>"><button class="ui red button" onclick="dellesson(<?php echo "$row[id]"; ?>)"><?php echo $delbtn; ?></button></div></div></td>
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

var select = $('#classFilter');
  select.on('change', function() {
    var val = $.fn.dataTable.util.escapeRegex($(this).val());
    table.column(3).search(val ? '^' + val + '$' : '', true, false).draw();
  });
  table.column(3).data().unique().sort().each(function(d) {
    select.append('<option value="' + d + '">' + d + '</option>');
  });

var select2 = $('#trimFilter');
  select2.on('change', function() {
    var val = $.fn.dataTable.util.escapeRegex($(this).val());
    table.column(4).search(val ? '^' + val + '$' : '', true, false).draw();
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

function savelesson() {
var name = document.getElementById('namelesson').value;
var des = tinymce.get('deslesson').getContent();
var files = document.getElementById('previewFiles').innerHTML;
var imgs = document.getElementById('previewImgs').innerHTML;
var trim = document.getElementById('trimlesson').value;
var selectElement = document.getElementById("classlesson");
var selectedOption = selectElement.options[selectElement.selectedIndex];
var selectedValue = selectedOption.value;
var year_id = selectedValue.split("_")[0];
var div_id = selectedValue.split("_")[1];
var class_id = selectedValue.split("_")[2];
if(name != "" && des != "" && trim != "" && year_id != "" && class_id != "") {
$.ajax({
        url: "addlesson.php",
        type: "POST",
        data: {
          name: name,
          des: des,
          files: files,
          imgs: imgs,
          trim: trim,
          class_id: class_id,
          year_id: year_id,
          div_id: div_id
        },
        cache: false,
        success: function(dataResult){
          location.reload();
        }
  });
} else {
  alertify.error('<?php echo $allfields; ?>');
}

}

function uploadFile(input, type) {
  $('.ui.segment.form').dimmer('show');
  // Get the file object
  var file = input.files[0];

  // Create a FormData object
  var formData = new FormData();

  // Append the file to the FormData object
  formData.append('file', file);

  // Create a new XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Set up the request
  xhr.open('POST', 'upload.php', true);

  // Set up a handler for when the request finishes
  xhr.onload = function() {
    if (xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      if (response.success) {
        // File upload successful
        document.getElementById('preview'+type).style.display = "";
        if(type == "Imgs"){
        document.getElementById('cards'+type).innerHTML += "<a class='blue card' href='"+response.file+"' download><div class='image'><img src='"+response.file+"'></div></a>";
        }else{
        document.getElementById('preview'+type).innerHTML += "<a class='ui download button' href='"+response.file+"' download><i class='download icon'></i> "+response.name+"</a>";
        }
        $('.ui.segment.form').dimmer('hide');
      } else {
        // File upload failed
        alertify.error(response.message);
        $('.ui.segment.form').dimmer('hide');
      }
    } else {
      // Request failed
      alertify.error('Error: ' + xhr.status);
      location.reload();
    }
  };

  // Send the request
  xhr.send(formData);
}

function addnewlesson() {
  $('.basic.modal').modal('show');
  tinymce.init({
      selector: '#deslesson',
      language: '<?php if($lang == "ar"){echo 'ar';}else{echo 'fr_FR';} ?>',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    });
}

function dellesson(id) {
  alertify.confirm("<?php echo $confirmdel; ?>",
  function(){
    $.ajax({
        url: "dellesson.php",
        type: "POST",
        data: {
          id: id
        },
        cache: false,
        success: function(dataResult){
          location.reload();
        }
  });
  },
  function(){
    alertify.error('<?php echo $cancel_button; ?>');
  });
}

function showmore(id) {
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