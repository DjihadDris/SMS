<?php
if(isset($_COOKIE['id'])){
    header('Location: dashboard');
}
include('login_lang.php');
?>
<!DOCTYPE html>
<html dir="<?php if($lang == "ar"){echo "rtl";}else{echo "ltr";} ?>">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="" >
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Meta Responsive tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="assets/css/quicksand.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">

    <link rel="shortcut icon" href="../favicon.ico">

    <title><?php echo $title; ?></title>

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
.corner-button {
  position: fixed;
  top: 20px;
  <?php if($lang == "ar"){echo 'right';}else{echo 'left';} ?>: 20px;
  background-color: white;
  color: black;
  border: 5px solid #0D47A1;
  border-radius: 100%;
  cursor: pointer;
  font-weight: bold;
}
button {
  outline: none !important;
  cursor: pointer !important;
}
<?php if($lang == "ar"){ ?>
.ajs-header {
  text-align: right !important;
}
.alert {
  text-align: right !important;
}
.ajs-content {
  text-align: right !important;
}
<?php } ?>
    </style>
  </head>

  <body class="login-body">
    
    <!--Login Wrapper-->
    <div class="container-fluid login-wrapper">
    <button class="corner-button"><a style="color: inherit; text-decoration: none;" href="changelang?from=login"><?php if($lang == "ar"){echo 'Fr';}else{echo 'Ar';} ?></a></button>
    <h5 class="text-center mb-5" style="color: white; padding-top: 10px;"><?php echo $jomhoria; ?><br><?php echo $wizara; ?></h5>
        <div class="login-box">
            <h1 class="text-center mb-5"><img src="../icon2.png" width="100px" height="100px"> <?php echo $system ?></h1>    
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12 login-box-info">
                <h3 class="mb-4"><?php echo $register; ?></h3>
                    <p class="mb-4"><?php echo $registertext; ?></p>
                    <p class="text-center"><a href="#" class="btn btn-light" onclick="register()"><?php echo $register; ?></a></p>
                </div>
                <div class="col-md-6 col-sm-6 col-12 login-box-form p-4">
                <h3 class="mb-4" style="<?php if($lang == "ar"){echo "text-align: right;";} ?>"><?php echo $login; ?></h3>
                    <form class="mt-2" id="loginForm">
                        <div class="input-group mb-3">
                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control mt-0" id="email" placeholder="<?php echo $email; ?>">
                        </div>

                        <div class="input-group mb-3">
                          <span class="input-group-text"><i class="fa fa-lock"></i></span>
                          <input type="password" class="form-control mt-0" id="password" placeholder="<?php echo $password; ?>" minlength="8">
                        </div>
                        <input id="lastlat" hidden>
                        <input id="lastlong" hidden>
                        <input id="lastip" hidden>
                        <div class="form-group">
                            <button class="btn btn-theme btn-block p-2 mb-1" type="submit" id="btnSubmit"><?php echo $login; ?></button>
                            <a href="#" onclick="reset()" style="<?php if($lang == "fr"){echo "float: right;";} ?>">
                                <small class="text-theme"><strong><?php echo $reset; ?></strong></small>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    <!--Login Wrapper-->

    <!-- Page JavaScript Files-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/sweetalert.js"></script>
    <script src="assets/js/alertify.min.js"></script>
    <!--Popper JS-->
    <script src="assets/js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
$(document).ready(function() {
if ("geolocation" in navigator) {
  // Call the getCurrentPosition() method to get the user's location
  navigator.geolocation.getCurrentPosition(
    position => {
      const latitude = position.coords.latitude;
      const longitude = position.coords.longitude;
      $("#lastlat").val(latitude);
      $("#lastlong").val(longitude);

    },
    error => {
      $("#lastlat").val("Error getting location:", error.message);
      $("#lastlong").val("Error getting location:", error.message);
    }
  );
} else {
  $("#lastlat").val("Geolocation is not supported by this browser.");
  $("#lastlong").val("Geolocation is not supported by this browser.");
}

// This code makes an HTTP request to an external service to obtain the IP address of the user.
// Create a function to handle the response from the external service
const handleResponse = (response) => {
  if (response.status === 200) {
    response.json().then(data => {
      $("#lastip").val(data.ip);
    });
  } else {
    $("#lastip").val('Failed to fetch IP address.');
  }
};

// Make an HTTP request to the external service
fetch('https://api.ipify.org/?format=json')
  .then(handleResponse)
  .catch(error => $("#lastip").val(error));
});

function createaccount() {
var name = document.getElementById('rname').value;
var fn = document.getElementById('rfn').value;
var dob = document.getElementById('rdob').value;
var gender = document.getElementById('rgender').value;
var email = document.getElementById('remail').value;
var pn = document.getElementById('rpn').value;
var school_name = document.getElementById('rschool_name').value;
var tawr = document.getElementById('rtawr').value;
var wilaya = document.getElementById('rwilaya').value;
var address = document.getElementById('raddress').value;
var password = document.getElementById('rpassword').value;

if(name == '' || fn == '' || dob == '' || gender == '' || email == '' || pn == '' || school_name == '' || tawr == '' || wilaya == '' || address == '' || password == '') {
    alertify.error('<?php echo $allfields; ?>');
} else if(password != "" && password.length < 8) {
    alertify.error('<?php echo $passwordshort; ?>');
    return false;
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
            school_name: school_name,
            tawr: tawr,
            wilaya: wilaya,
            address: address,
            password: password
        },
        cache: false,
        beforeSend: function(){
            document.getElementById('createaccountbtn').disabled = true;
            document.getElementById('createaccountbtn').innerHTML = "<i class='fa fa-spinner fa-spin'></i>";
        },
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

document.getElementById("loginForm").addEventListener("submit", function (event) {
event.preventDefault();
var email = document.getElementById('email').value;
var password = document.getElementById('password').value;
var lastlat = document.getElementById('lastlat').value;
var lastlong = document.getElementById('lastlong').value;
var lastip = document.getElementById('lastip').value;
if(email != "") {
if(password != "") {
  $.ajax({
        url: "dologin.php",
        type: "POST",
        data: {
          email: email,
          password: password,
          lastlat: lastlat,
          lastlong: lastlong,
          lastip: lastip
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

function reset() {
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
    </script>

    <!--Custom Js Script-->
    <!--<script src="assets/js/custom.js"></script>-->
    <!--Custom Js Script-->
  </body>
</html>