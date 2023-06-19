<?php
include('navbar_lang.php');
?>
<div class="row header shadow-sm">
            
<!--Logo-->
<div class="col-sm-3 pl-0 text-center header-logo">
<div class="bg-theme mr-3 pt-3 pb-2 mb-0">
<h3 class="logo"><a href="#" class="text-secondary logo"><!--<img src="../icon.png" width="30px" height="30px"> --><?php echo $sysname; ?></a></h3>
</div>
</div>
<!--Logo-->

<!--Header Menu-->
<div class="col-sm-9 header-menu pt-2 pb-0">
<div class="row">

<!--Menu Icons-->
<div class="col-sm-4 col-8 pl-0">
<!--Toggle sidebar-->
<span class="menu-icon" onclick="toggle_sidebar()">
<span id="sidebar-toggle-btn"></span>
</span>
<!--Toggle sidebar-->
<!--Inbox icon-->
<span class="menu-icon inbox">
<a href="#" role="button" id="dropdownMenuLink3" onclick="openmsgslist()" aria-haspopup="true" aria-expanded="false">
<i class="fa fa-envelope"></i>
<?php include('../db.php'); $query = "SELECT * FROM messages WHERE to_user_id='$_COOKIE[id]' AND to_type='$_COOKIE[user_type]' AND vu=''"; $result = mysqli_query($conn, $query); $rowCount = mysqli_num_rows($result); if($rowCount != 0){echo "<span class='badge badge-danger'>".$rowCount."</span>";} $conn->close(); ?>
</a>
</span>
<!--Inbox icon-->
</div>
<!--Menu Icons-->

<!--Search box and avatar-->
<div class="col-sm-8 col-4 text-right flex-header-menu justify-content-end">
<div class="search-rounded mr-3">
<input type="text" class="form-control search-box" placeholder="<?php echo $search; ?>">
</div>
<div class="mr-4">
<a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<img src="../<?php if($_COOKIE['gender'] == 0){echo "man";}else{echo "woman";} ?>.png" class="rounded-circle" width="40px" height="40px">
</a>
<div class="dropdown-menu dropdown-menu-right mt-13" aria-labelledby="dropdownMenuLink">
<a class="dropdown-item" href="profile"><i class="fa fa-user pr-2"></i> <?php echo $profile; ?></a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="changelang?from=<?php echo $_SERVER['REQUEST_URI']; ?>"><i class="fa fa-language pr-2"></i> <?php echo $changelang; ?></a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="logout"><i class="fa fa-power-off pr-2"></i> <?php echo $logout; ?></a>
</div>
</div>
</div>
<!--Search box and avatar-->
</div>    
</div>
<!--Header Menu-->
</div>

<script>
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