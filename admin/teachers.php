<?php
if(!isset($_COOKIE['id'])){
    header('Location: login');
}
include('teachers_lang.php');
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
        .barcode {
            /*position: relative !important;*/
            width: 30mm !important;
            height: 12.25mm !important;
            /*top: -21.5mm !important;*/
            margin-top: -35.5mm !important;
        }
    </style>
  </head>
  <body>
<?php
if(isset($_GET['false'])){
    if($_GET['false']=="format"){
        echo "<script>alertify.alert('Only xlsx and xls are supported')</script>";
    }elseif($_GET['false']=="error"){
        echo "<script>alertify.alert('Error..')</script>";
    }
}
?>
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
                            <div class="col-sm-8 pt-2"><h6 class="mb-4 bc-header"><i class="fas fa-chalkboard-teacher"></i> <?php echo $teachers; ?></h6></div>
                            <div class="col-sm-4 text-right pb-3">
                                <button class="btn btn-outline-theme shadow" data-toggle="modal" data-target="#addTeacher" onclick="getmaterials('atschool', 'atmaterial')">
                                    <i class="fas fa-plus"></i> <?php echo $addteacher; ?>
                                </button>
                                <button class="btn btn-outline-success shadow" data-toggle="modal" data-target="#addExcel">
                                    <i class="fas fa-file-excel"></i> <?php echo $importexcel; ?>
                                </button>
                            </div>
                        </div>

<div class="form-group row">
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
<div class="col-sm-4">
<select class="form-control" id="sschool_id" onchange="getmaterials('sschool_id', 'smaterial_id')">
    <option value=""><?php echo $school; ?></option>
<?php
include('../db.php');
$sql = "SELECT * FROM schools";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<option value='$row[id]' data-value='$row[name]'>$row[name]</option>";
}}
$conn->close();
?>
</select>
</div>
<div class="col-sm-4">
<select class="form-control" id="smaterial_id" onchange="getclasses('sschool_id', 'smaterial_id', 'sclass_id')">
    <option value=""><?php echo $material; ?></option>
</select>
</div>
<div class="col-sm-4">
<select class="form-control" id="sclass_id">
    <option value=""><?php echo $class; ?></option>
</select>
</div>
<?php }else{
?>
<div class="col-sm-6">
<select class="form-control" id="smaterial_id" onchange="getclasses('sschool_id', 'smaterial_id', 'sclass_id')">
    <option value=""><?php echo $material; ?></option>
<?php
include('../db.php');
$school_id = $_COOKIE['school_id'];
$sql = "SELECT * FROM materials WHERE school_id='$school_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<option value='$row[id]' data-value='$row[name]'>$row[name]</option>";
}}
$conn->close();
?>
</select>
</div>
<div class="col-sm-6">
<select class="form-control" id="sclass_id">
    <option value=""><?php echo $class; ?></option>
</select>
</div>
<?php
} ?>
</div>
                            
                        <table class="table table-bordered table-striped mt-0" width="100%" id="teachers">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo $fn; ?></th>
                                        <th><?php echo $name; ?></th>
                                        <th><?php echo $dob; ?></th>
                                        <th><?php echo $gender; ?></th>
                                        <th><?php echo $email; ?></th>
                                        <th><?php echo $pn; ?></th>
                                        <?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
                                        <th><?php echo $school; ?></th>
                                        <?php } ?>
                                        <th><?php echo $material; ?></th>
                                        <th><?php echo $class; ?></th>
                                        <th><?php echo $val; ?></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
include('../db.php');
if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
$sql = "SELECT * FROM teachers";
}else{
$sql = "SELECT * FROM teachers WHERE school_id='$_COOKIE[school_id]'";
}
$i = 1;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
<tr>
<td class="align-middle"><?php echo $i;$i++; ?></td>
<td class="align-middle"><?php echo "$row[fn]"; ?></td>
<td class="align-middle"><?php echo "$row[name]"; ?></td>
<td class="align-middle"><?php echo "$row[dob]"; ?></td>
<td class="align-middle"><?php if("$row[gender]" == 0){echo $gender0;}elseif("$row[gender]" == 1){echo $gender1;}; ?></td>
<td class="align-middle"><?php echo "$row[email]"; ?></td>
<td class="align-middle"><?php echo "$row[pn]"; ?></td>
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
<td class="align-middle"><?php include('../db.php'); $sqls = "SELECT * FROM schools WHERE id='$row[school_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No school found..";} $conn->close(); ?></td>
<?php } ?>
<td class="align-middle"><?php include('../db.php'); $sqls = "SELECT * FROM materials WHERE id='$row[material_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No material found..";} $conn->close(); ?></td>
<td class="align-middle"><?php include('../db.php'); $sqlo = "SELECT * FROM classes WHERE school_id='$row[school_id]' AND id IN ($row[class_id])";
    $resulto = $conn->query($sqlo);
    if ($resulto->num_rows > 0) {
      while($rowo = $resulto->fetch_assoc()) {
            $sqlto = "SELECT * FROM years WHERE id='$rowo[year_id]'";
            $resultto = $conn->query($sqlto);
            if ($resultto->num_rows > 0) {
              while($rowto = $resultto->fetch_assoc()) {
 echo "$rowto[name] "; ?><?php if("$rowo[div_id]" != ""){
        $sqlso = "SELECT * FROM divs WHERE id='$rowo[div_id]'";
        $resultso = $conn->query($sqlso);
        if ($resultso->num_rows > 0) {
          while($rowso = $resultso->fetch_assoc()) {
           echo "$rowso[name] ";}} } ?><?php echo "$rowo[name]<br>";
              }}
      }}else{echo "No classes found..";} ?></td>
<td class="align-middle"><?php if("$row[val]" == 0){echo "<span class='badge badge-success'>$val0</span>";}elseif("$row[val]" == 1){echo "<span class='badge badge-danger'>$val1</span>";} ?></td>
<td class="align-middle"><?php echo "$row[code]"; ?></td>
<td class="align-middle text-center">
    <button class="btn btn-theme" onclick="showmore(<?php echo "$row[id]"; ?> , 'show')"><i class="fas fa-id-card"></i></button>
    <button class="btn btn-success" onclick="printcertif(<?php echo "$row[id]"; ?>)"><i class="fas fa-print"></i></button>
    <button class="btn btn-info" onclick="showmore(<?php echo "$row[id]"; ?> , 'edit')"><i class="fas fa-edit"></i></button>
    <button class="btn btn-warning" onclick="val(<?php echo "$row[id]"; ?> , <?php if("$row[val]" == 0){echo 0;}elseif("$row[val]" == 1){echo 1;} ?>)"><i class="fas fa-<?php if("$row[val]" == 1){echo "check";}else{echo "close";} ?>"></i></button>
    <button class="btn btn-danger" onclick="delteacher(<?php echo "$row[id]"; ?>)"><i class="fas fa-trash"></i></button>
</td>
</tr>
<?php
  }}
$conn->close();
?>
                                </tbody>
                    </table>
                    </div>
                    <!--/Order Listing-->

                    <!--Teacher Add Modal-->
                    <div class="modal fade" id="addTeacher" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $addteacher; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input id="atid" hidden>
                                    <label><?php echo $fn; ?> <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="atfn">
                                    <label><?php echo $name; ?> <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="atname">
                                    <label><?php echo $dob; ?> <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" id="atdob">
                                    <label><?php echo $gender; ?> <span style="color: red;">*</span></label>
                                    <select class="form-control" id="atgender">
                                        <option value=""><?php echo $choose; ?></option>
                                        <option value="0"><?php echo $gender0; ?></option>
                                        <option value="1"><?php echo $gender1; ?></option>
                                    </select>
                                    <label><?php echo $email; ?> <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" id="atemail">
                                    <label><?php echo $pn; ?> <span style="color: red;">*</span></label>
                                    <input type="tel" class="form-control" id="atpn">
                                    <span style="<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){}else{echo "display: none;";} ?>">
                                    <label><?php echo $school; ?> <span style="color: red;">*</span></label>
                                    <select class="form-control" id="atschool" onchange="getmaterials('atschool', 'atmaterial')">
                                        <option value=""><?php echo $school; ?></option>
<?php
include('../db.php');
$sql = "SELECT * FROM schools";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
echo "<option value='$row[id]'>$row[name]</option>";
}else{
if("$row[id]" == $_COOKIE['school_id']){
echo "<option selected value='$row[id]'>$row[name]</option>";
}else{
echo "<option value='$row[id]'>$row[name]</option>";
}
}
}}
$conn->close();
?>
                                    </select>
                                    </span>
                                    <label><?php echo $material; ?> <span style="color: red;">*</span></label>
                                    <select class="form-control" id="atmaterial" onchange="getclasses('atschool', 'atmaterial', 'atclass')">
                                        <option value=""><?php echo $material; ?></option>
                                    </select>
                                    <label><?php echo $class; ?> <span style="color: red;">*</span></label>
                                    <select class="form-control" id="atclass" multiple>
                                        <option value=""><?php echo $class; ?></option>
                                    </select>
                                    <label><?php echo $pw; ?> <span style="color: red;">*</span> <span id="leavepass" style="display: none;">(<b><?php echo $leavepass; ?></b>)</span></label>
                                    <input type="text" class="form-control" id="atpassword" placeholder="<?php echo $chars8; ?>">
                                </div>
                                <div class="modal-footer">
                                <button class="btn btn-outline-success" id="addteacherbtn" onclick="addteacher()"><i class="fas fa-save"></i> <?php echo $save; ?></button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $leave; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Teacher Add Modal-->

                    <!--Teacher Show Modal-->
                    <div class="modal fade" id="showTeacher" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $printcard; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="printable" style="text-align: center;">
    <center>
    <div style="border: 1px solid black; width: 85.6mm; height: 53.98mm; border-style: solid; margin-bottom: 20px;/* bottom: 68px; margin-top: 68px; position: relative;*/">
      <img src="../wizara.png" width="100%" style="position: relative; padding: 5px 25px 15px 25px;">
      <h6 style="margin-top: -5px !important;"><?php echo $schoolcard; ?></h6>
      <div id="margindetails" style="text-align: <?php if($lang == "ar"){echo "right";}else{echo "left";} ?>; margin-<?php if($lang == "ar"){echo "right";}else{echo "left";} ?>: 10px; margin-top: 7.5px; font-size: 10px;">
        <span><?php echo $fn." ".$and." ".$name ?>:</span> <span id="printnamefn"></span>
        <br>
        <span><?php echo $dob; ?>:</span> <span id="printdob"></span>
        <br>
        <span><?php echo $gender; ?>:</span> <span id="printgender"></span>
        <br>
        <span><?php echo $material; ?>:</span> <span id="printmaterial"></span>
        <br>
        <span><?php echo $school; ?>:</span> <span id="printschool"></span>
        </div>
        <div id="marginphoto" style="border: none; text-align: center; width: 80px; height: 80px; position: relative; top: -21mm; <?php if($lang == "ar"){echo "right";}else{echo "left";} ?>: 25mm;">
          <img id="printimg" width="100%" height="100%">
        </div>
        <svg class="barcode" id="printcode"></svg>
    </div>
  </center>
                                </div>
                                <div class="modal-footer">
                                <button class="btn btn-outline-success" onclick="printcard()"><i class="fas fa-print"></i> <?php echo $print; ?></button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $leave; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Teacher Show Modal-->

                    <!--Excel Add Modal-->
                    <div class="modal fade" id="addExcel" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $importexcel; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="text-align: center;">
                                <form action="uploadteachers.php" method="post" enctype="multipart/form-data">
                                    <!--<input type="file" name="excel_file" />
                                    <input type="submit" value="Upload" />-->
                                  <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="excel_file">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit"><?php echo $importexcel; ?></button>
                                    </div>
                                  </div>
                                </form>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $leave; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Excel Add Modal-->

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
<script>
$(document).ready(function() {
let table = $('#teachers').DataTable({
    columnDefs: [
        {
            <?php
            if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
            ?>
            targets: 11,
            <?php
            }else{ 
            ?>
            targets: 10,
            <?php
            }
            ?>
            visible: false
        }
    ],
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
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
var select = $('#sschool_id');
select.on('change', function() {
  var val = $.fn.dataTable.util.escapeRegex($(this).val());
  var optionText = $(this).find('option:selected').data('value');
  table.column(7).search(val ? '^' + optionText + '$' : '', true, false).draw();
});
var select2 = $('#smaterial_id');
select2.on('change', function() {
  var val = $.fn.dataTable.util.escapeRegex($(this).val());
  var optionText = $(this).find('option:selected').data('value');
  table.column(8).search(val ? '^' + optionText + '$' : '', true, false).draw();
});
var select3 = $('#sclass_id');
select3.on('change', function() {
  var val = $.fn.dataTable.util.escapeRegex($(this).find('option:selected').data('value'));
  table.column(9).search(val ? val : '', true, false).draw();
});
<?php }else{ ?>
var select = $('#smaterial_id');
select.on('change', function() {
  var val = $.fn.dataTable.util.escapeRegex($(this).val());
  var optionText = $(this).find('option:selected').data('value');
  table.column(7).search(val ? '^' + optionText + '$' : '', true, false).draw();
});
var select2 = $('#sclass_id');
select2.on('change', function() {
  var val = $.fn.dataTable.util.escapeRegex($(this).val());
  var optionText = $(this).find('option:selected').data('value');
  table.column(8).search(val ? '^' + optionText + '$' : '', true, false).draw();
});
<?php } ?>
});
function printcard() {
var printContents = document.getElementById('printable').innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = printContents;
window.print();
document.body.innerHTML = originalContents;
location.reload();
}
function addteacher() {
var id = document.getElementById('atid').value;
var name = document.getElementById('atname').value;
var fn = document.getElementById('atfn').value;
var dob = document.getElementById('atdob').value;
var gender = document.getElementById('atgender').value;
var email = document.getElementById('atemail').value;
var pn = document.getElementById('atpn').value;
var school_id = document.getElementById('atschool').value;
var selectElement = document.querySelector('#atclass');
var selectedOptions = Array.from(selectElement.selectedOptions).map(option => option.value);
var material_id = document.getElementById('atmaterial').value;
var password = document.getElementById('atpassword').value;

if(name == '' || fn == '' || dob == '' || gender == '' || email == '' || pn == '' || school_id == '' || selectedOptions == '' || material_id == '') {
    alertify.error('<?php echo $allfields; ?>');
} else if(password != "" && password.length < 8) {
    alertify.error('<?php echo $passwordshort; ?>');
    return false;
} else {
    $.ajax({
        url: "addteacher.php",
        type: "POST",
        data: {
            id: id,
            name: name,
            fn: fn,
            dob: dob,
            gender: gender,
            email: email,
            pn: pn,
            school_id: school_id,
            class_id: selectedOptions,
            material_id: material_id,
            password: password
        },
        cache: false,
        beforeSend: function(){
            document.getElementById('addteacherbtn').disabled = true;
            document.getElementById('addteacherbtn').innerHTML = "<i class='fa fa-spinner fa-spin'></i>";
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
function getmaterials(schools, materials) {
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
var school_id = document.getElementById(schools).value;
<?php }else{ ?>
var school_id = <?php echo $_COOKIE['school_id'] ?>;
<?php } ?>
$.ajax({
        url: 'getmaterials.php',
        type: 'POST',
        data: {
            school_id: school_id
        },
        cache: false,
        success: function(dataResult){
            document.getElementById(materials).innerHTML = dataResult;
        }
    });
}
function getclasses(schools, materials, classes) {
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
var school_id = document.getElementById(schools).value;
<?php }else{ ?>
var school_id = <?php echo $_COOKIE['school_id'] ?>;
<?php } ?>
var selectElement = document.querySelector('#'+materials);
var selectedOption = selectElement.options[selectElement.selectedIndex];
var material_id = selectedOption.dataset.value2;
$.ajax({
        url: 'getclasses.php',
        type: 'POST',
        data: {
            school_id: school_id,
            material_id: material_id,
            type: 'teachers'
        },
        cache: false,
        success: function(dataResult){
            if(classes == "sclass_id"){
                document.getElementById(classes).innerHTML = "<option value='' data-value=''><?php echo $class; ?></option>"+dataResult;
            }else{
                document.getElementById(classes).innerHTML = dataResult;
            }
        }
    });
}
function val(id, val){
  $.ajax({
        url: "val.php",
        type: "POST",
        data: {
          id: id,
          val: val,
          type: 'teachers'
        },
        cache: false,
        success: function(dataResult){
            location.reload();
        }
  });
}
function printcertif(id) {
$.ajax({
    url: 'printcertif.php',
    type: 'POST',
    data: {
        id: id,
        type: 'teachers'
    },
    cache: false,
    success: function(response) {
        var printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write('<html dir="<?php if($lang == "ar"){echo "rtl";}else{echo "ltr";} ?>"><head><title><?php echo $print; ?></title><link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128+Text&family=Libre+Barcode+39+Text&family=Noto+Kufi+Arabic&display=swap" rel="stylesheet"><style>body {font-family: Noto Kufi Arabic;}</style></head><body>' + response + '</body></html>');
        printWindow.document.close();
        setTimeout(function(){printWindow.print();}, 500);
}
});
}
function showmore(id, type) {
  $.ajax({
        url: "getteacher.php",
        type: "POST",
        data: {
          id: id
        },
        cache: false,
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(type == "show"){
                $('#showTeacher').modal('show');
                if(dataResult.gender == 0){
                    $('#printimg').attr('src', '../man.png');
                }else{
                    $('#printimg').attr('src', '../woman.png');
                }
                $('#printnamefn').html(dataResult.fn+" "+dataResult.name);
                $('#printdob').html(dataResult.dob);
                $('#printgender').html(dataResult.printgender);
                $('#printmaterial').html(dataResult.printmaterial);
                $('#printschool').html(dataResult.printschool);
                var printcode =  dataResult.code;
                JsBarcode("#printcode", printcode);
            }else{
                $('#addTeacher').modal('show');
                document.getElementById('leavepass').style.display = "";
                $('#atid').val(dataResult.id);
                $('#atname').val(dataResult.name);
                $('#atfn').val(dataResult.fn);
                $('#atgender').val(dataResult.gender);
                $('#atdob').val(dataResult.dob);
                $('#atemail').val(dataResult.email);
                $('#atpn').val(dataResult.pn);
                $('#atschool').val(dataResult.school_id);
                getmaterials('atschool', 'atmaterial');
                setTimeout(function(){$('#atmaterial').val(dataResult.material_id); getclasses('atschool', 'atmaterial', 'atclass');},500);
                setTimeout(function(){
var valuesArray = [dataResult.class_id2];
var valuesString = valuesArray[0];
var valuesWithoutQuotes = valuesString.replace(/'/g, '');
var individualValues = valuesWithoutQuotes.split(',');

var selectElement = document.getElementById('atclass');

for (var i = 0; i < selectElement.options.length; i++) {
  var option = selectElement.options[i];
  if (individualValues.includes(option.value)) {
    option.selected = true;
  }
}},1000);
            }
        }
  });
}
function delteacher(id) {
    $.ajax({
        url: "delteacher.php",
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
  </body>
</html>