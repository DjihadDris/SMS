<?php
if(!isset($_COOKIE['id'])){
  header('Location: login');
}
if(!isset($_GET['id'])){
  header('Location: dashboard');
}
include('discussion_lang.php');
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

.container {
  border: 1px solid black/*#dedede*/;
  background-image: linear-gradient(to bottom <?php if($lang == "ar"){echo 'left';}else{echo 'right';} ?>, #2185d0, #a7d1f1)/*#f1f1f1*/;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
  height: 80px;
  text-align: <?php if($lang == "ar"){echo 'right';}else{echo 'left';} ?>;
  color: white;
}
.darker {
  background-image: linear-gradient(to top <?php if($lang == "ar"){echo 'right';}else{echo 'left';} ?>, #acecb3, #2ecc40)/*#ddd*/;
  color: white;
}
.container::after {
  content: "";
  clear: both;
  display: table;
}
.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}
.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}
.time-right {
  float: right;
  color: black/*#aaa*/;
}
.time-left {
  float: left;
  color: black/*#999*/;
}

#chatbox {
text-align: right;
margin: 0 auto;
margin-bottom: 25px;
padding: 10px;
background: #fff;
height: 400px !important;
width: 100%;
border: 1px solid #2185d0;
overflow: auto;
}
#chatbox h5 {
font-family: 'Readex Pro', sans-serif;
}
#usermsg {
border: 1px solid #2185d0;
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
        <div class="ui raised segment" id="chatcontent">

<div class="ui icon message" id="loadingcontent"> <!-- attached -->
  <i class="notched circle loading icon"></i>
  <div class="content">
    <div class="header">
      <?php echo $just1s; ?>
    </div>
    <p><?php echo $loadingcontent; ?></p>
  </div>
</div>

<div class="ui form">
	<div id="chatbox" style="display: none;"></div>
  <form class="ui form" id="formmsg"> <!-- attached -->

<div class="field">
  <div class="ui right labeled input">
    <input type="text" id="usermsg" placeholder="<?php echo $messagetext; ?>" maxlength="250">
      <button class="ui blue button labeled left icon" type="submit"><i class="send icon"></i> <?php echo $sendbtntext; ?></button>
  </div>
</div>

  </form>
</div>

<script type="text/javascript">
$(document).ready(function() {
$.ajax({
        url: "getdiscussion.php",
        type: "POST",
        data: {
          class_id: "<?php echo $_GET['id'] ?>"
        },
        cache: false,
        success: function(dataResult){
        $('#chatbox').html(dataResult);
        document.getElementById('chatbox').style.display = "";
        document.getElementById('loadingcontent').parentNode.removeChild(document.getElementById('loadingcontent'));
        }
});
setInterval (loadLog, 1000);
});
$("#formmsg").submit(function(){
    var clientmsg = $("#usermsg").val();
    var class_id = "<?php echo $_GET['id'] ?>";
    if(clientmsg != "" && clientmsg != " "){
      $.post('check_message.php', { message: clientmsg }, function(response) {
          if (response.hasDeclinedWords) {
            var declinedWords = response.declinedWords.join('<?php echo $comma; ?> ');
            alertify.error('<?php echo $declined; ?>: ' + declinedWords);
          } else {
            $.post("post.php", {class_id: class_id, message: clientmsg});
            document.getElementById('usermsg').value = "";
          }
        }, 'json');
    }else{
    alertify.error('الرجاء إدخال نص الرسالة');
    }
    loadLog;
    return false;
});
function loadLog(){
    $.ajax({
        url: "getdiscussion.php",
        type: "POST",
        data: {
          class_id: "<?php echo $_GET['id'] ?>"
        },
        cache: false,
        success: function(html){
            if(html != ""){
            $("#chatbox").html(html);
            var newscrollHeight = document.getElementById("chatbox").getAttribute("scrollHeight") + 99999;
            $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
            }
        },
    });
}
</script>

</body>

</html>