<?php
include('sidebar_lang.php');
?>
<div class="ui fixed blue inverted main menu" style="height: 80px !important; background-color: <?php echo $bgcolor; ?>; border: <?php echo $bordersize; ?> <?php echo $bordercolor; ?> <?php echo $borderweight; ?>;">
<div class="ui blue big launch attached fixed button" onclick="sidebar()" style="background-color: <?php echo $bgcolor; ?>;">
<i class="circular white bars icon"></i>
</div>
<a style="color: white !important;" href="#" class="item">
<center>
<?php echo $jomhoria; ?>
<br>
<?php echo $wizara; ?>
<br><br>
<i class="hand point right outline icon circular small"></i> <?php include('../db.php'); $school_id=$_COOKIE['school_id']; $sql = "SELECT * FROM schools WHERE id='$school_id'"; $result = $conn->query($sql); if ($result->num_rows > 0) {while($row = $result->fetch_assoc()) {echo "$row[name]";}} else {echo "No school found..";} $conn->close(); ?>
</center>
</a>
  <a class="item" onclick="openmsgslist()">
    <i class="icon mail large"></i> <?php echo $messagetitle; ?>: <span style="margin-<?php if($lang == "ar"){echo 'right';}else{echo 'left';} ?>: 2.5px;"><?php include('../db.php'); $query = "SELECT * FROM messages WHERE to_user_id='$_COOKIE[id]' AND to_type='students' AND vu=''"; $result = mysqli_query($conn, $query); $rowCount = mysqli_num_rows($result); echo $rowCount; $conn->close(); ?></span>
  </a>
  <a class="item" onclick="bgcolor()">
    <i class="settings icon large"></i>
  </a>
</div>



<div class="ui vertical blue inverted sidebar labeled icon menu" style="background-color: <?php echo $bgcolor; ?>; border: <?php echo $bordersize; ?> <?php echo $bordercolor; ?> <?php echo $borderweight; ?>;">
  <a class="item" href="dashboard">
    <i class="home icon"></i>
    <?php echo $dashboard; ?>
  </a>
  <a class="item" href="details">
    <i class="edit icon"></i>
    <?php echo $details; ?>
  </a>
    <a class="item" href="lessons">
    <i class="list icon"></i>
    <?php echo $lessons; ?>
  </a>
    <a class="item" onclick="checkchat()">
    <i class="comment icon"></i>
    <?php echo $chat; ?>
  </a>
   <a class="item" onclick="order()">
    <i class="send icon"></i>
    <?php echo $service; ?>
  </a>
   <a class="item" href="changelang?from=<?php echo $_SERVER['REQUEST_URI']; ?>">
    <i class="language icon"></i>
    <?php echo $changelang; ?>
  </a>
   <a class="item" href="logout">
    <i class="logout icon"></i>
    <?php echo $logout; ?>
  </a>
</div>

<script>
  function sidebar(){
    $('.ui.labeled.icon.sidebar')
    .sidebar('setting', 'transition', 'overlay')
  .sidebar('toggle')
;
  }

  function checkchat(){
    <?php
    include('../db.php');
    $class_id=$_COOKIE['class_id'];
    $sql = "SELECT * FROM classes WHERE id='$class_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if("$row[chat]" == 0){
          echo "window.location.href='discussion'";
        }else{
          echo 'alertify.alert("'.$contactadmin.'");';
        }
      }} else {
        echo 'alertify.alert("'.$contactadmin.'");';
      }
      $conn->close();
    ?>
  }

  function bgcolor(){
    alertify.alert("<div class='ui form'><div class='field'><label for='bgcolor'><?php echo $sidenavbgcolor; ?></label><input id='bgcolor' type='color' value='<?php echo $bgcolor; ?>' style='width: 100%;' onchange='savethiscolor()'></div><div class='field'><label for='bordercolor'><?php echo $sidenavbordercolor; ?></label><input type='color' id='bordercolor' value='<?php echo $bordercolor; ?>' style='width: 100%;' onchange='savethiscolor()'></div><div class='field'><label for='bbgcolor'><?php echo $bodybgcolor; ?></label><input type='color' value='<?php echo $bbgcolor; ?>' id='bbgcolor' style='width: 100%;' onchange='savethiscolor()'></div><div class='field' hidden><label for='bbordercolor'><?php echo $bodybordercolor; ?></label><input type='color' id='bbordercolor' value='<?php echo $bbordercolor; ?>' style='width: 100%;'></div><div class='field'><div class='ui buttons' style='width: 100%;'><button class='ui green button inverted labeled icon left' onclick='savethiscolor()'><i class='save icon'></i> <?php echo $savecolorbtn; ?></button><div class='or' data-text='<?php echo $ordatatext; ?>'></div><button class='ui blue button inverted' onclick='resettodefault()'><?php echo $resetbtn; ?></button></div></div></div>"); 
  }
  function savethiscolor(){
    var bgcolor = document.getElementById('bgcolor');
    if(<?php if($bgcolor != ""){ ?>bgcolor.value != ""<?php }else{ ?>bgcolor.value != "#000000"<?php } ?>){
    document.cookie = "bgcolor="+bgcolor.value;
    }else{
    document.cookie = "bgcolor=";
    }
    var bordercolor = document.getElementById('bordercolor');
    if(<?php if($bordercolor != ""){ ?>bordercolor.value != ""<?php }else{ ?>bordercolor.value != "#000000"<?php } ?>){
    document.cookie = "bordercolor="+bordercolor.value;
    }else{
      document.cookie = "bordercolor=";
    }
    var bbgcolor = document.getElementById('bbgcolor');
    if(<?php if($bbgcolor != ""){ ?>bbgcolor.value != ""<?php }else{ ?>bbgcolor.value != "#000000"<?php } ?>){
    document.cookie = "bbgcolor="+bbgcolor.value;
    }else{
    document.cookie = "bbgcolor=";
    }
    var bbordercolor = document.getElementById('bbordercolor');
    if(<?php if($bbordercolor != ""){ ?>bbordercolor.value != ""<?php }else{ ?>bbordercolor.value != "#000000"<?php } ?>){
    document.cookie = "bbordercolor="+bbordercolor.value;
    }else{
    document.cookie = "bbordercolor=";
    }
    location.reload();
  }

  function resettodefault(){
    document.cookie = "bgcolor=";
    document.cookie = "bordercolor=";
    document.cookie = "bbgcolor=";
    document.cookie = "bbordercolor=";
    location.reload();
  }

  function order(){
    alertify.prompt("<?php echo $servicename; ?>", "",
  function(evt, value ){
    if(value != ""){
      $.ajax({
        url: "doservice.php",
        type: "POST",
        data: {
          name: value
        },
        cache: false,
        success: function(dataResult){
var dataResult = JSON.parse(dataResult);
if(dataResult.statusCode==200){
alertify.success(dataResult.message);
}else{
alertify.error(dataResult.message);
}
        }
      });
    }else{
    alertify.error('<?php echo $servicename; ?>');
    }
  },
  function(){
    alertify.error('<?php echo $cancel_button; ?>');
  })
  ;
  }
  
  function openmsgslist(){
    $.ajax({
        url: "getmessages.php",
        type: "POST",
        cache: false,
        success: function(dataResult){
  alertify
  .alert(dataResult);
        }
    });
  }

  function sendnewmessage(){
  $.ajax({
        url: "sendnewmessage.php",
        type: "POST",
        cache: false,
        success: function(dataResult){
  alertify
  .alert(dataResult);
  $('.ui.search.dropdown').dropdown();
        }
    });
}

function sendmessage(){
/*var user = document.getElementById('user_id').value;*/
var message = document.getElementById('message_text').value;
var selectElement = document.getElementById("user_id");
var selectedOption = selectElement.options[selectElement.selectedIndex];
var selectedValue = selectedOption.value;
var to_type = selectedValue.split("_")[0]; // Extract the table name from the selected value
var user = selectedValue.split("_")[1]; // Extract the row ID from the selected value

if(user != "" && to_type != ""){
  if(message != ""){
    $.ajax({
        url: "sendmessage.php",
        type: "POST",
        data: {
          to_user_id: user,
          message: message,
          to_type: to_type
        },
        cache: false,
        success: function(dataResult){
var dataResult = JSON.parse(dataResult);
if(dataResult.statusCode==200){
alertify.success(dataResult.message);
document.getElementById('user_id').value = "";
document.getElementById('message_text').value = "";
}else{
alertify.error(dataResult.message);
}
        }
      });
  }else{
    alertify.error('<?php echo $message_error_2; ?>');
  }
}else{
  alertify.error('<?php echo $message_error_1; ?>');
}
}

function vumessage(id){
  $.ajax({
        url: "vumessage.php",
        type: "POST",
        data: {
          id: id
        },
        cache: false,
        success: function(dataResult){
          openmsgslist.call();
        }
      });
}

</script>