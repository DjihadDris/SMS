<?php
if(isset($_COOKIE['id'])){
  header('Location: dashboard');
}
include('login_lang.php');
?>
<html dir="<?php if($lang == "ar"){echo 'rtl';}else{echo 'ltr';} ?>">

<head>
<title><?php echo $title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<?php if($lang == "ar"){ ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
<?php } ?>
<script scr="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Readex+Pro&display=swap" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet">
<!--<link href="login.css" rel="stylesheet">-->
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
    margin: 0;
    padding: 0;
    font-family: 'Readex Pro', sans-serif;
    background-image: url('background.png');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.form {
    width: 800px;
    height: <?php if($lang == "ar"){echo '50%';}else{echo '53.5%';} ?>;
    border: 5px solid #298397;
    border-radius: 10px;
    background-color: #3ef8da;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.inside {
    padding: 25px;
    padding-right: 50px;
    padding-left: 50px;
}
.form-control, .input-group-text {
    border: 5px solid black;
}
.form-control {
    margin-<?php if($lang == "ar"){echo 'right';}else{echo 'left';} ?>: 5px !important;
}
.input-group-text {
    margin-<?php if($lang == "ar"){echo 'left';}else{echo 'right';} ?>: 5px !important;
}
.header {
    text-align: center;
    border: 5px solid #a47bbc;
    background-color: #66228e;
    border-radius: 30px;
    width: <?php if($lang == "ar"){echo '350';}else{echo '400';} ?>px;
    height: 65px;
    margin-top: 25px;
    color: white;
    font-weight: bold;
    transition: 0.5s;
}
.header:hover {
    background-color: #a47bbc;
    border: 3px solid #66228e;
}
.header2 {
    text-align: center;
    border: 5px solid #a47bbc;
    background-color: #66228e;
    border-radius: 30px;
    width: 150px;
    height: 35px;
    margin-top: -25px;
    color: white;
    font-weight: bold;
    transition: 0.5s;
}
.header2:hover {
    background-color: #a47bbc;
    border: 3px solid #66228e;
}
.btns-group {
    display: flex;
    /*padding-left: 10px;*/
    text-align: center;
}
.button {
    background-color: #66228e;
    border: 3px solid #a47bbc;
    border-radius: 30px;
    color: #e4e4ec;
    font-weight: bold;
    transition: 0.5s;
    padding: 7.5px;
}
.button:hover {
    background-color: #a47bbc;
    border: 3px solid #66228e;
}
.btns-group .button:nth-child(1) {
    margin-<?php if($lang == "ar"){echo 'right';}else{echo 'left';} ?>: 10px;
    margin-<?php if($lang == "ar"){echo 'left';}else{echo 'right';} ?>: 25px;
}
.btns-group .button:nth-child(2) {
    margin-<?php if($lang == "ar"){echo 'left';}else{echo 'right';} ?>: 12.5px;
}
.btns-group .button:nth-child(3) {
    margin-<?php if($lang == "ar"){echo 'right';}else{echo 'left';} ?>: 12.5px;
}
.btns-group .button:nth-child(4) {
    margin-<?php if($lang == "ar"){echo 'right';}else{echo 'left';} ?>: 25px;
    margin-<?php if($lang == "ar"){echo 'left';}else{echo 'right';} ?>: 7.5px;
}
.corner-button {
    position: fixed;
    top: 20px; /* Adjust the distance from the bottom */
    <?php if($lang == "ar"){echo 'right';}else{echo 'left';} ?>: 20px; /* Adjust the distance from the right */
    background-color: white;
    color: black;
    /*padding: 10px 20px;*/
    border: 5px solid #298397;
    border-radius: 100%;
    cursor: pointer;
    font-weight: bold;
}
</style>
</head>

<body>
  
<button class="corner-button"><a style="color: inherit; text-decoration: none;" href="changelang?from=login"><?php if($lang == "ar"){echo 'Fr';}else{echo 'Ar';} ?></a></button>

<div class="position-absolute top-50 start-50 translate-middle form">
<div class="inside">

<div class="position-relative top-50 start-50 translate-middle header">
<p>
<?php echo $jomhoria; ?>
<br>
<?php echo $wizara; ?>
</p>
</div>

<div class="position-relative top-50 start-50 translate-middle header2">
<p>School name</p>
</div>

<form id="loginForm">
<div class="input-group mb-3">
  <span class="input-group-text"><i class="fas fa-user"></i></span>
  <input type="text" class="form-control" placeholder="<?php echo $email; ?>" id="email">
</div>

<div class="input-group mb-3">
  <span class="input-group-text"><i class="fas fa-lock"></i></span>
  <input type="password" class="form-control" placeholder="<?php echo $password; ?>" id="password" minlength="8">
</div>

<div class="d-flex justify-content-center btns-group">
  <button type="submit" class="button" onclick="login()" id="btnSubmit"><?php echo $login; ?></button>
  <button type="button" class="button" onclick="register()"><?php echo $register; ?></button>
  <button type="button" class="button" onclick="resetpass()"><?php echo $reset; ?></button>
  <button type="button" class="button" onclick="help()"><?php echo $help; ?></button>
</div>
</form>

</div>
</div>

<script>
function getyears() {
  document.getElementById('drdiv_id').style.display = "none";
  document.getElementById('rdiv_id').value = "";
  document.getElementById('drclass_id').style.display = "none";
  document.getElementById('rclass_id').value = "";
  var school_id = document.getElementById('rschool_id').value;
  if(school_id != "") {
  $.ajax({
        url: "getyears.php",
        type: "POST",
        data: {
            school_id: school_id
        },
        cache: false,
        success: function(dataResult){
        document.getElementById('ryear_id').innerHTML = dataResult;
        document.getElementById('dryear_id').style.display = "";
        }
  });
  } else {
    document.getElementById('dryear_id').style.display = "none";
    document.getElementById('ryear_id').value = "";
    document.getElementById('drdiv_id').style.display = "none";
    document.getElementById('rdiv_id').value = "";
    document.getElementById('drclass_id').style.display = "none";
    document.getElementById('rclass_id').value = "";
  }
}

function getdivs() {
  var school_id = document.getElementById('rschool_id').value;
  var year_id = document.getElementById('ryear_id').value;
  if(school_id != "" && year_id != "") {
  $.ajax({
        url: "getdivs.php",
        type: "POST",
        data: {
            school_id: school_id,
            year_id: year_id
        },
        cache: false,
        success: function(dataResult){
          if(dataResult != "") {
        document.getElementById('rdiv_id').innerHTML = dataResult;
        document.getElementById('drdiv_id').style.display = "";
          }else{
            document.getElementById('drdiv_id').style.display = "none";
            if(year_id != ""){
            getclasses.call();
            }else{
              document.getElementById('rclass_id').innerHTML = "";
              document.getElementById('drclass_id').style.display = "none";
            }
          }
        }
  });
  } else {
    document.getElementById('drdiv_id').style.display = "none";
    document.getElementById('rdiv_id').value = "";
    document.getElementById('drclass_id').style.display = "none";
    document.getElementById('rclass_id').value = "";
  }
}

function getclasses() {
  var school_id = document.getElementById('rschool_id').value;
  var year_id = document.getElementById('ryear_id').value;
  var div_id = document.getElementById('rdiv_id').value;
  if(school_id != "" && year_id != "") {
  $.ajax({
        url: "getclasses.php",
        type: "POST",
        data: {
            school_id: school_id,
            year_id: year_id,
            div_id: div_id
        },
        cache: false,
        success: function(dataResult){
        document.getElementById('rclass_id').innerHTML = dataResult;
        document.getElementById('drclass_id').style.display = "";
        }
  });
  } else {
    document.getElementById('drdiv_id').style.display = "none";
    document.getElementById('rdiv_id').value = "";
    document.getElementById('drclass_id').style.display = "none";
    document.getElementById('rclass_id').value = "";
  }
}

function createaccount() {
var name = document.getElementById('rname').value;
var fn = document.getElementById('rfn').value;
var dob = document.getElementById('rdob').value;
var gender = document.getElementById('rgender').value;
var email = document.getElementById('remail').value;
var pn = document.getElementById('rpn').value;
var school_id = document.getElementById('rschool_id').value;
var year_id = document.getElementById('ryear_id').value;
var div_id = document.getElementById('rdiv_id').value;
var class_id = document.getElementById('rclass_id').value;
var password = document.getElementById('rpassword').value;

if(name == '' || fn == '' || dob == '' || gender == '' || email == '' || pn == '' || school_id == '' || year_id == '' || class_id == '' || password == '') {
    alertify.error('<?php echo $allfields; ?>');
} else {
    $.ajax({
        url: "createaccount.php",
        type: "POST",
        data: {
            name: name,
            fn: fn,
            dob: dob,
            gender: gender,
            email: email,
            pn: pn,
            school_id: school_id,
            year_id: year_id,
            div_id: div_id,
            class_id: class_id,
            password: password
        },
        cache: false,
        success: function(dataResult){
        var dataResult = JSON.parse(dataResult);
        if(dataResult.statusCode==200) {
        alertify.success(dataResult.message);
        setTimeout(function(){location.reload();},2500);
        } else {
        alertify.error(dataResult.message);
        }
        }
    });
}
}

function register() {
  $.ajax({
        url: "register.php",
        type: "POST",
        cache: false,
        success: function(dataResult){
alertify.alert(dataResult);
        }
      });
}

function help() {
alertify.alert("<?php echo $help_1; ?> <br> <?php echo $help_2; ?> <br> <?php echo $help_3; ?> <br> <u><?php echo $help_4; ?></u> <?php echo $help_5; ?>");
}

function resetpass() {
  alertify.prompt("<?php echo $id5alemail; ?>", "",
  function(evt, value ){
    if(value != "") {
      $.ajax({
        url: "sendmail.php",
        type: "POST",
        data: {
          email: value
        },
        cache: false,
        success: function(dataResult){
var dataResult = JSON.parse(dataResult);
if(dataResult.statusCode==200) {
alertify.success(dataResult.message);
} else {
alertify.error(dataResult.message);
}
        }
      });
    } else {
    alertify.error('<?php echo $id5alemail; ?>');
    }
  },
  function(){
    alertify.error('<?php echo $cancel_button; ?>');
  })
  ;
}

document.getElementById("loginForm").addEventListener("submit", function (event) {
event.preventDefault();
var email = document.getElementById('email').value;
var password = document.getElementById('password').value;
if(email != "") {
if(password != "") {
  $.ajax({
        url: "dologin.php",
        type: "POST",
        data: {
          email: email,
          password: password
        },
        cache: false,
        beforeSend: function(){
          document.getElementById("btnSubmit").disabled = true;
          document.getElementById("btnSubmit").innerHTML = "<i class='fa fa-spinner fa-spin'></i>";
        },
        success: function(dataResult){
var dataResult = JSON.parse(dataResult);
if(dataResult.statusCode==200) {
alertify.success(dataResult.message);
setTimeout(function(){location.href = "dashboard";},500);
} else {
document.getElementById("btnSubmit").disabled = false;
document.getElementById("btnSubmit").innerHTML = "<?php echo $login; ?>";
alertify.error(dataResult.message);
}
        }
      });
} else {
  alertify.error('<?php echo $id5alpassword; ?>');
}
} else {
  alertify.error('<?php echo $id5alemail; ?>');
}
});
</script>

</body>

</html>