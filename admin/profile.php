<?php
if(!isset($_COOKIE['id'])){
    header('Location: login');
}
include('profile_lang.php');
?>
<!DOCTYPE html>
<html dir="<?php if($lang == "ar"){echo 'rtl';}else{echo 'ltr';} ?>">
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

    <!--Favicon Icon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="assets/css/quicksand.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <!--Animate CSS-->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!--Chartist CSS-->
    <link rel="stylesheet" href="assets/css/chartist.min.css">
    <!--Map-->
    <link rel="stylesheet" href="assets/css/jquery-jvectormap-2.0.2.css">
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="assets/js/calendar/bootstrap_calendar.css">
    <!--Datatable-->
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    <link rel="shortcut icon" href="../favicon.ico">

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

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title><?php echo $title; ?></title>
    <style>
        <?php if($lang == "ar"){ ?>
        body {
            text-align: right !important;
        }
        .container-fluid {
            margin-right: -31.5px !important;
        }
        .sidebar-menu li a {
            text-align: right !important;
        }
        .menu-icon:first-child {
            margin: 5px 0px 0px 15px !important;
        }
        .dropdown-menu {
            left: 35px !important;
            text-align: right !important;
        }
        .sidebar-menu li a {
            padding: 13px 5px !important;
        }
        <?php } ?>
    </style>
  </head>
  <body>
    <!--Page loader-->
    <div class="loader-wrapper">
        <div class="loader-circle">
            <div class="loader-wave"></div>
        </div>
    </div>
    <!--Page loader-->
    
    <!--Page Wrapper-->

    <div class="container-fluid">

        <!--Header-->
        <?php include('navbar.php'); ?>
        <!--Header-->

        <!--Main Content-->

        <div class="row main-content">
            <!--Sidebar-->
            <?php include('sidebar.php'); ?>
            <!--Sidebar-->

            <!--Content right-->
            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">

                <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
                    <!--Order Listing-->
                    <div class="product-list">
                        
                        <div class="row border-bottom mb-4">
                            <div class="col-sm-8 pt-2"><h6 class="mb-4 bc-header"><i class="fas fa-user"></i> <?php echo $profile; ?></h6></div>
                        </div>
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
<div class="button-container custom-tabs-2">
<nav>
<div class="nav nav-tabs nav-fill" id="nav-customContent" role="tablist">
<a class="nav-item nav-link active show" id="nav-profile" data-toggle="tab" href="#custom-profile" role="tab" aria-controls="nav-profile" aria-selected="true"><?php echo $profile; ?></a>
<a class="nav-item nav-link" id="nav-password" data-toggle="tab" href="#custom-password" role="tab" aria-controls="nav-password" aria-selected="false"><?php echo $pw; ?></a>
</div>
</nav>

<div class="tab-content py-3 px-3 px-sm-0" id="nav-customContent">

<div class="tab-pane fade active show" id="custom-profile" role="tabpanel" aria-labelledby="nav-profile">

<?php
include('../db.php');
$sql = "SELECT * FROM $_COOKIE[user_type] WHERE id='$_COOKIE[id]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
<form method="POST" action="doprofile">
<div class="form-group row">
<div class="col-sm-6">
<input required type="text" class="form-control" name="name" placeholder="<?php echo $name; ?>" value="<?php echo "$row[name]"; ?>">
</div>
<div class="col-sm-6">
<input required type="text" class="form-control" name="fn" placeholder="<?php echo $fn; ?>" value="<?php echo "$row[fn]"; ?>">
</div>
</div>

<div class="form-group row">
<div class="col-sm-6">
<input required type="date" class="form-control" name="dob" placeholder="<?php echo $dob; ?>" value="<?php echo "$row[dob]"; ?>">
</div>
<div class="col-sm-6">
<select required class="form-control" name="gender">
    <option value=""><?php echo $choose; ?></option>
    <option value="0" <?php if("$row[gender]" == 0){echo "selected";} ?>><?php echo $gender0; ?></option>
    <option value="1" <?php if("$row[gender]" == 1){echo "selected";} ?>><?php echo $gender1; ?></option>
</select>
</div>
</div>

<div class="form-group row">
<div class="col-sm-6">
<input required type="email" class="form-control" name="email" placeholder="<?php echo $email; ?>" value="<?php echo "$row[email]"; ?>">
</div>
<div class="col-sm-6">
<input required type="tel" class="form-control" name="pn" placeholder="<?php echo $pn; ?>" value="<?php echo "$row[pn]"; ?>">
</div>
</div>

<button class="btn btn-success" style="width: 100%;" type="submit"><i class="fas fa-save"></i> <?php echo $save; ?></button>
</form>
<?php
}}
$conn->close();
?>

</div>

<div class="tab-pane fade" id="custom-password" role="tabpanel" aria-labelledby="nav-password">

<form method="POST" action="dopassword">
<div class="form-group row">
<div class="col-sm-12">
<input required type="password" class="form-control" name="actualpassword" placeholder="<?php echo $actualpassword; ?>" minlength="8">
</div>
</div>
<div class="form-group row">
<div class="col-sm-12">
<input required type="password" class="form-control" name="newpassword" placeholder="<?php echo $newpassword; ?>" minlength="8" maxlength="16">
</div>
</div>
<div class="form-group row">
<div class="col-sm-12">
<input required type="password" class="form-control" name="newnewpassword" placeholder="<?php echo $newnewpassword; ?>" minlength="8" maxlength="16">
</div>
</div>

<button class="btn btn-success" style="width: 100%;" type="submit"><i class="fas fa-save"></i> <?php echo $save; ?></button>
</form>

</div>

</div>
</div>
                    </div>
                    <!--/Order Listing-->
                </div>

                <!--Footer-->
                <?php include('footer.php'); ?>
                <!--Footer-->

            </div>
        </div>

        <!--Main Content-->

    </div>

    <!--Page Wrapper-->

    <!-- Page JavaScript Files-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <!--Popper JS-->
    <script src="assets/js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--Sweet alert JS-->
    <script src="assets/js/sweetalert.js"></script>
    <!--Progressbar JS-->
    <script src="assets/js/progressbar.min.js"></script>
    <!--Flot.JS-->
    <script src="assets/js/charts/jquery.flot.min.js"></script>
    <script src="assets/js/charts/jquery.flot.pie.min.js"></script>
    <script src="assets/js/charts/jquery.flot.categories.min.js"></script>
    <script src="assets/js/charts/jquery.flot.stack.min.js"></script>
    <!--Chart JS-->
    <script src="assets/js/charts/chart.min.js"></script>
    <!--Chartist JS-->
    <script src="assets/js/charts/chartist.min.js"></script>
    <script src="assets/js/charts/chartist-data.js"></script>
    <script src="assets/js/charts/demo.js"></script>
    <!--Maps-->
    <script src="assets/js/maps/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/js/maps/jvector-maps.js"></script>
    <!--Bootstrap Calendar JS-->
    <script src="assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="assets/js/calendar/demo.js"></script>
    <!--Datatable-->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>
    <!--Ckeditor-->
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script src="assets/js/ckeditor5/build-classic/ckeditor.js"></script>
    <script src="assets/js/ckeditor5/build-classic/translations/<?php if($lang == "ar"){echo 'ar';}else{echo 'fr';} ?>.js"></script>
    <!--Axios-->
    <!--<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>-->
    <!--JsBarcode-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.3/JsBarcode.all.min.js"></script>
    <!--Custom Js Script-->
    <script src="assets/js/custom.js"></script>
    <!--Custom Js Script-->
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
<script>
$(document).ready(function() {
let table = $('#schools').DataTable({
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
    },
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'copy',
        text: '<i class="fas fa-copy"></i> <?php echo $copy; ?>',
        className: 'btn btn-danger',
        exportOptions: { columns: ':visible:not(:last-child)' }
      },
      {
        extend: 'csv',
        text: '<i class="fas fa-file-csv"></i> <?php echo $exportcsv; ?>',
        className: 'btn btn-success',
        exportOptions: { columns: ':visible:not(:last-child)' }
      },
      {
        extend: 'excel',
        text: '<i class="fas fa-file-excel"></i> <?php echo $exportexcel; ?>',
        className: 'btn btn-theme',
        exportOptions: { columns: ':visible:not(:last-child)' }
      },
      <?php if($lang <> "ar"){ ?>
      {
        extend: 'pdf',
        text: '<i class="fas fa-file-pdf"></i> <?php echo $exportpdf; ?>',
        className: 'btn btn-warning',
        exportOptions: { columns: ':visible:not(:last-child)' }
      },
      <?php } ?>
      {
        extend: 'print',
        text: '<i class="fas fa-print"></i> <?php echo $print; ?>',
        className: 'btn btn-info',
        exportOptions: { columns: ':visible:not(:last-child)' }
        },
    ],
    initComplete: function(settings, json) {
      $('.btn.btn-danger').removeClass('dt-button');
      $('.btn.btn-theme').removeClass('dt-button');
      $('.btn.btn-success').removeClass('dt-button');
      $('.btn.btn-info').removeClass('dt-button');
      $('.btn.btn-warning').removeClass('dt-button');
    }
});
});

function addschool() {
var id = document.getElementById('asid').value;
var name = document.getElementById('asname').value;
var tawr = document.getElementById('astawr').value;
var wilaya = document.getElementById('aswilaya').value;
var address = document.getElementById('asaddress').value;
if(name == '' || tawr == '' || wilaya == '' || address == '') {
    alertify.error('<?php echo $allfields; ?>');
}else{
    $.ajax({
        url: "addschool.php",
        type: "POST",
        data: {
          id: id,
          name: name,
          tawr: tawr,
          wilaya: wilaya,
          address: address
        },
        cache: false,
        beforeSend: function(){
            document.getElementById('addschoolbtn').disabled = true;
            document.getElementById('addschoolbtn').innerHTML = "<i class='fa fa-spinner fa-spin'></i>";
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
function editschool(id) {
  $.ajax({
        url: "getschool.php",
        type: "POST",
        data: {
          id: id
        },
        cache: false,
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
                $('#addSchool').modal('show');
                $('#asid').val(dataResult.id);
                $('#asname').val(dataResult.name);
                $('#astawr').val(dataResult.tawr);
                $('#aswilaya').val(dataResult.wilaya);
                $('#asaddress').val(dataResult.address);
        }
  });
}
function delschool(id) {
    $.ajax({
        url: "delschool.php",
        type: "POST",
        data: {
          id: id
        },
        cache: false,
        success: function(dataResult){
            location.reload();
        }
  });
}
</script>
<?php } ?>
  </body>
</html>