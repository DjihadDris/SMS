<?php
if(!isset($_COOKIE['id'])){
    header('Location: login');
}
include('schools_lang.php');
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
                            <div class="col-sm-8 pt-2"><h6 class="mb-4 bc-header"><i class="fas fa-school"></i> <?php echo $schools; ?></h6></div>
                            <?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
                            <div class="col-sm-4 text-right pb-3">
                                <button class="btn btn-outline-theme shadow" data-toggle="modal" data-target="#addSchool">
                                    <i class="fas fa-plus"></i> <?php echo $addschool; ?>
                                </button>
                            </div>
                            <?php } ?>
                        </div>
<div class="alert alert-warning"><?php echo $downloadreader; ?></div>
                        <?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
                        <table class="table table-bordered table-striped mt-0" width="100%" id="schools">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo $name; ?></th>
                                        <th><?php echo $tawr; ?></th>
                                        <th><?php echo $wilaya; ?></th>
                                        <th><?php echo $address; ?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
include('../db.php');
$sql = "SELECT * FROM schools";
$i = 1;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
<tr>
<td class="align-middle"><?php echo $i;$i++; ?></td>
<td class="align-middle"><?php echo "$row[name]"; ?></td>
<td class="align-middle"><?php if("$row[tawr]" == 1){echo $tawr1;}elseif("$row[tawr]" == 2){echo $tawr2;}elseif("$row[tawr]" == 3){echo $tawr3;} ?></td>
<td class="align-middle"><?php include('../db.php'); $sqls = "SELECT * FROM wilayas WHERE id='$row[wilaya]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {if($lang == "ar"){echo "$rows[arname]";}elseif($lang == "fr"){echo "$rows[frname]";}}}else{echo "No wilaya found..";} ?></td>
<td class="align-middle"><?php echo "$row[address]"; ?></td>
<td class="align-middle text-center">
    <button class="btn btn-info" onclick="editschool(<?php echo "$row[id]"; ?>)"><i class="fas fa-edit"></i></button>
    <button class="btn btn-danger" onclick="delschool(<?php echo "$row[id]"; ?>)"><i class="fas fa-trash"></i></button>
</td>
</tr>
<?php
  }}
$conn->close();
?>
                                </tbody>
                    </table>
                    <?php }else{ ?>
                        <?php
if(isset($_GET['false'])){
    echo "<div class='alert alert-danger'>Error..</div>";
}
?>
<?php
include('../db.php');
$sql = "SELECT * FROM schools WHERE id='$_COOKIE[school_id]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
<form method="POST" action="doschools">
<div class="form-group row">
<div class="col-sm-6">
<input required class="form-control" name="name" placeholder="<?php echo $name; ?>" value="<?php echo "$row[name]"; ?>">
</div>
<div class="col-sm-6">
<select required class="form-control" name="tawr">
<option value=""><?php echo $tawr; ?></option>
<option value="1" <?php if("$row[tawr]" == 1){echo "selected";} ?>><?php echo $tawr1; ?></option>
<option value="2" <?php if("$row[tawr]" == 2){echo "selected";} ?>><?php echo $tawr2; ?></option>
<option value="3" <?php if("$row[tawr]" == 3){echo "selected";} ?>><?php echo $tawr3; ?></option>
</select>
</div>
</div>
<div class="form-group row">
<div class="col-sm-6">
<select required class="form-control" name="wilaya">
<option value=""><?php echo $wilaya; ?></option>
<?php
$sqlw = "SELECT * FROM wilayas";
$resultw = $conn->query($sqlw);
if ($resultw->num_rows > 0) {
while($roww = $resultw->fetch_assoc()) {
if($lang == "ar"){
    if("$roww[id]" == "$row[wilaya]"){
echo "<option value='$roww[id]' selected>$roww[arname]</option>";
    }else{
echo "<option value='$roww[id]'>$roww[arname]</option>";
    }
}elseif($lang == "fr"){
    if("$roww[id]" == "$row[wilaya]"){
echo "<option value='$roww[id]'>$roww[frname]</option>";
    }else{
echo "<option value='$roww[id]'>$roww[frname]</option>";
    }
}
}}
?>
</select>
</div>
<div class="col-sm-6">
<input required class="form-control" name="address" placeholder="<?php echo $address; ?>" value="<?php echo "$row[address]"; ?>">
</div>
</div>
<button class="btn btn-success" style="width: 100%;"><?php echo $save; ?></button>
</form>
<?php
}}
$conn->close();
?>
                    <?php } ?>
                    </div>
                    <!--/Order Listing-->
                    <?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
                    <!--School Add Modal-->
                    <div class="modal fade" id="addSchool" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $addschool; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input id="asid" hidden>
                                    <label><?php echo $name; ?> <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="asname">
                                    <label><?php echo $tawr; ?> <span style="color: red;">*</span></label>
                                    <select class="form-control" id="astawr">
                                        <option value=""><?php echo $tawr; ?></option>
                                        <option value="1"><?php echo $tawr1; ?></option>
                                        <option value="2"><?php echo $tawr2; ?></option>
                                        <option value="3"><?php echo $tawr3; ?></option>
                                    </select>
                                    <label><?php echo $wilaya; ?> <span style="color: red;">*</span></label>
                                    <select class="form-control" id="aswilaya">
                                        <option value=""><?php echo $wilaya; ?></option>
<?php
include('../db.php');
$sql = "SELECT * FROM wilayas";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
if($lang == "ar"){
    echo "<option value='$row[id]'>$row[arname]</option>";
}elseif($lang == "fr"){
    echo "<option value='$row[id]'>$row[frname]</option>";
}
}}
$conn->close();
?>
                                    </select>
                                    <label><?php echo $address; ?> <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="asaddress">
                                </div>
                                <div class="modal-footer">
                                <button class="btn btn-outline-success" id="addschoolbtn" onclick="addschool()"><i class="fas fa-save"></i> <?php echo $save; ?></button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $leave; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--School Add Modal-->
                    <?php } ?>

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