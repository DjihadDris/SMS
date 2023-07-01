<?php
if(!isset($_COOKIE['id'])){
    header('Location: login');
}
include('users_lang.php');
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
                            <div class="col-sm-8 pt-2"><h6 class="mb-4 bc-header"><i class="fas fa-users"></i> <?php echo $users; ?></h6></div>
                            <div class="col-sm-4 text-right pb-3">
                                <button class="btn btn-outline-theme shadow" data-toggle="modal" data-target="#addUser">
                                    <i class="fas fa-plus"></i> <?php echo $adduser; ?>
                                </button>
                                <button class="btn btn-outline-success shadow" data-toggle="modal" data-target="#addExcel">
                                    <i class="fas fa-file-excel"></i> <?php echo $importexcel; ?>
                                </button>
                            </div>
                        </div>

<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
<div class="form-group row">
<div class="col-sm-12">
<select class="form-control" id="sschool_id">
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
</div>
<?php }
?>
<?php
if(isset($_GET['false'])){
    if($_GET['false']=="format"){
        echo "<div class='alert alert-danger'>Only xlsx and xls are supported.</div>";
    }elseif($_GET['false']=="error"){
        echo "<div class='alert alert-danger'>Error..</div>";
    }
}
?>
                        <table class="table table-bordered table-striped mt-0" width="100%" id="users">
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
                                        <th><?php echo $type; ?></th>
                                        <th><?php echo $iptxt; ?></th>
                                        <th><?php echo $lattxt; ?></th>
                                        <th><?php echo $longtxt; ?></th>
                                        <?php } ?>
                                        <th><?php echo $lastlogin; ?></th>
                                        <th><?php echo $val; ?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
include('../db.php');
if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
$sql = "SELECT 'superadmins' AS type, id, name, fn, dob, gender, email, pn, school_id, val, lastdate, lasttime, lastlat, lastlong, lastip FROM superadmins WHERE id<>'$_COOKIE[id]' UNION SELECT 'admins' AS type, id, name, fn, dob, gender, email, pn, school_id, val, lastdate, lasttime, lastlat, lastlong, lastip FROM admins";
}else{
$sql = "SELECT * FROM admins WHERE school_id='$_COOKIE[school_id]'";
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
<td class="align-middle"><?php include('../db.php'); $sqls = "SELECT * FROM schools WHERE id='$row[school_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No school found..";} ?></td>
<td class="align-middle"><?php if("$row[type]" == "superadmins"){echo $type0;}elseif("$row[type]" == "admins"){echo $type1;} ?></td>
<td class="align-middle"><?php echo "$row[lastip]" ?></td>
<td class="align-middle"><?php echo "$row[lastlat]" ?></td>
<td class="align-middle"><?php echo "$row[lastlong]" ?></td>
<?php } ?>
<td class="align-middle"><?php echo "$row[lastdate] ".$intxt." $row[lasttime]"; ?></td>
<td class="align-middle"><?php if("$row[val]" == 0){echo "<span class='badge badge-success'>$val0</span>";}elseif("$row[val]" == 1){echo "<span class='badge badge-danger'>$val1</span>";} ?></td>
<td class="align-middle text-center">
    <button class="btn btn-info" onclick="showmore(<?php echo "$row[id]"; ?> , '<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){echo "$row[type]";}else{echo "admins";} ?>')"><i class="fas fa-edit"></i></button>
    <button class="btn btn-warning" onclick="val(<?php echo "$row[id]"; ?> , <?php if("$row[val]" == 0){echo 0;}elseif("$row[val]" == 1){echo 1;} ?>, '<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){echo "$row[type]";}else{echo "admins";} ?>')"><i class="fas fa-<?php if("$row[val]" == 1){echo "check";}else{echo "close";} ?>"></i></button>
    <button class="btn btn-danger" onclick="deluser(<?php echo "$row[id]"; ?>, '<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){echo "$row[type]";}else{echo "admins";} ?>')"><i class="fas fa-trash"></i></button>
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

                    <!--User Add Modal-->
                    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $adduser; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input id="auid" hidden>
                                    <label><?php echo $fn; ?> <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="aufn">
                                    <label><?php echo $name; ?> <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="auname">
                                    <label><?php echo $dob; ?> <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" id="audob">
                                    <label><?php echo $gender; ?> <span style="color: red;">*</span></label>
                                    <select class="form-control" id="augender">
                                        <option value=""><?php echo $choose; ?></option>
                                        <option value="0"><?php echo $gender0; ?></option>
                                        <option value="1"><?php echo $gender1; ?></option>
                                    </select>
                                    <label><?php echo $email; ?> <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" id="auemail">
                                    <label><?php echo $pn; ?> <span style="color: red;">*</span></label>
                                    <input type="tel" class="form-control" id="aupn">
                                    <span style="<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){}else{echo "display: none;";} ?>">
                                    <label><?php echo $school; ?> <span style="color: red;">*</span></label>
                                    <select class="form-control" id="auschool">
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
                                    <span style="<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){}else{echo "display: none;";} ?>">
                                    <label><?php echo $type; ?> <span style="color: red;">*</span></label>
                                    <select class="form-control" id="autype" onchange="showpermissions()">
                                        <option value=""><?php echo $type; ?></option>
                                        <option value="superadmins"><?php echo $type0; ?></option>
                                        <option value="admins"><?php echo $type1; ?></option>
                                    </select>
                                    </span>
                                    <span id="permissions" style="<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){echo "display: none;";} ?>">
                                    <label><?php echo $permissions; ?> <span style="color: red;">*</span></label>
                                    <div class="form-check-box cta">
                                        <span class="color1">
                                            <input type="checkbox" id="mportal" value="1">
                                            <label for="mportal"></label>
                                        </span>
                                        <label for="mportal"><?php echo $portal; ?></label>
                                        <br>
                                        <span class="color1">
                                            <input type="checkbox" id="mstudents" value="1">
                                            <label for="mstudents"></label>
                                        </span>
                                        <label for="mstudents"><?php echo $students; ?></label>
                                        <br>
                                        <span class="color1">
                                            <input type="checkbox" id="mteachers" value="1">
                                            <label for="mteachers"></label>
                                        </span>
                                        <label for="mteachers"><?php echo $teachers; ?></label>
                                        <br>
                                        <span class="color1">
                                            <input type="checkbox" id="mclasses" value="1">
                                            <label for="mclasses"></label>
                                        </span>
                                        <label for="mclasses"><?php echo $classes; ?></label>
                                        <br>
                                        <span style="<?php include('../db.php'); $school_id=$_COOKIE['school_id']; $sql = "SELECT * FROM schools WHERE id='$school_id'"; $result = $conn->query($sql); if ($result->num_rows > 0) {while($row = $result->fetch_assoc()) { if("$row[tawr]" <> 3){echo "display: none;";}}} $conn->close(); ?>">
                                        <span class="color1">
                                            <input type="checkbox" id="mdivs" value="1">
                                            <label for="mdivs"></label>
                                        </span>
                                        <label for="mdivs"><?php echo $divs; ?></label>
                                        <br>
                                        </span>
                                        <span class="color1">
                                            <input type="checkbox" id="myears" value="1">
                                            <label for="myears"></label>
                                        </span>
                                        <label for="myears"><?php echo $years; ?></label>
                                        <br>
                                        <span class="color1">
                                            <input type="checkbox" id="mmaterials" value="1">
                                            <label for="mmaterials"></label>
                                        </span>
                                        <label for="mmaterials"><?php echo $materials; ?></label>
                                        <br>
                                        <span class="color1">
                                            <input type="checkbox" id="mservices" value="1">
                                            <label for="mservices"></label>
                                        </span>
                                        <label for="mservices"><?php echo $services; ?></label>
                                        <br>
                                        <span class="color1">
                                            <input type="checkbox" id="mdeclined_words" value="1">
                                            <label for="mdeclined_words"></label>
                                        </span>
                                        <label for="mdeclined_words"><?php echo $declined_words; ?></label>
                                        <br>
                                        <span class="color1">
                                            <input type="checkbox" id="mschools" value="1">
                                            <label for="mschools"></label>
                                        </span>
                                        <label for="mschools"><?php echo $schools; ?></label>
                                    </div>
                                    </span>
                                    <label><?php echo $pw; ?> <span style="color: red;">*</span> <span id="leavepass" style="display: none;">(<b><?php echo $leavepass; ?></b>)</span></label>
                                    <input type="text" class="form-control" id="aupassword" placeholder="<?php echo $chars8; ?>">
                                </div>
                                <div class="modal-footer">
                                <button class="btn btn-outline-success" id="adduserbtn" onclick="adduser()"><i class="fas fa-save"></i> <?php echo $save; ?></button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $leave; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--User Add Modal-->

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
                                <form action="uploadusers.php" method="post" enctype="multipart/form-data">
                                  <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="excel_file" accept=".xlsx, .xls">
                                    <button class="btn btn-success" type="submit"><?php echo $importexcel; ?></button>
                                  </div>
                                </form>
                                <div style="text-align: <?php if($lang == "ar"){echo "right";}else{echo "left";} ?>;">
                                <ol>
                                <li><?php echo $excelli1; ?></li>
                                <?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
                                <li><?php echo $excelli2; ?></li>
                                <li><?php echo $excelli3; ?></li>
                                <?php } ?>
                                <li><?php echo $excelli4; ?></li>
                                </ol>
                                </div>
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
let table = $('#users').DataTable({
    /*columnDefs: [
        {
            targets: 10,
            visible: false
        }
    ],*/
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
<?php } ?>

  var mportal = document.getElementById('mportal');
mportal.addEventListener('change', function() {
  if (mportal.checked) {
    mportal.value = '0';
  } else {
    mportal.value = '1';
  }
});
  var mstudents = document.getElementById('mstudents');
  mstudents.addEventListener('change', function() {
  if (mstudents.checked) {
    mstudents.value = '0';
  } else {
    mstudents.value = '1';
  }
});
  var mteachers = document.getElementById('mteachers');
  mteachers.addEventListener('change', function() {
  if (mteachers.checked) {
    mteachers.value = '0';
  } else {
    mteachers.value = '1';
  }
});
  var mclasses = document.getElementById('mclasses');
  mclasses.addEventListener('change', function() {
  if (mclasses.checked) {
    mclasses.value = '0';
  } else {
    mclasses.value = '1';
  }
});
  var mdivs = document.getElementById('mdivs');
  mdivs.addEventListener('change', function() {
  if (mdivs.checked) {
    mdivs.value = '0';
  } else {
    mdivs.value = '1';
  }
});
  var myears = document.getElementById('myears');
  myears.addEventListener('change', function() {
  if (myears.checked) {
    myears.value = '0';
  } else {
    myears.value = '1';
  }
});
  var mmaterials = document.getElementById('mmaterials');
  mmaterials.addEventListener('change', function() {
  if (mmaterials.checked) {
    mmaterials.value = '0';
  } else {
    mmaterials.value = '1';
  }
});
  var mservices = document.getElementById('mservices');
  mservices.addEventListener('change', function() {
  if (mservices.checked) {
    mservices.value = '0';
  } else {
    mservices.value = '1';
  }
});
  var mdeclined_words = document.getElementById('mdeclined_words');
  mdeclined_words.addEventListener('change', function() {
  if (mdeclined_words.checked) {
    mdeclined_words.value = '0';
  } else {
    mdeclined_words.value = '1';
  }
});
  var mschools = document.getElementById('mschools');
  mschools.addEventListener('change', function() {
  if (mschools.checked) {
    mschools.value = '0';
  } else {
    mschools.value = '1';
  }
});

});
function showpermissions() {
var type = document.getElementById('autype').value;
if(type == "admins"){
    document.getElementById('permissions').style.display = "";
}else{
    document.getElementById('permissions').style.display = "none";
}
}
function adduser() {
var id = document.getElementById('auid').value;
var name = document.getElementById('auname').value;
var fn = document.getElementById('aufn').value;
var dob = document.getElementById('audob').value;
var gender = document.getElementById('augender').value;
var email = document.getElementById('auemail').value;
var pn = document.getElementById('aupn').value;
var school_id = document.getElementById('auschool').value;
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
var type = document.getElementById('autype').value;
<?php }else{ ?>
var type = "admins";
<?php } ?>
var mportal = document.getElementById('mportal').value;
var mstudents = document.getElementById('mstudents').value;
var mteachers = document.getElementById('mteachers').value;
var mclasses = document.getElementById('mclasses').value;
var mdivs = document.getElementById('mdivs').value;
var myears = document.getElementById('myears').value;
var mmaterials = document.getElementById('mmaterials').value;
var mservices = document.getElementById('mservices').value;
var mdeclined_words = document.getElementById('mdeclined_words').value;
var mschools = document.getElementById('mschools').value;
var password = document.getElementById('aupassword').value;

if(name == '' || fn == '' || dob == '' || gender == '' || email == '' || pn == '' || school_id == '' || type == '') {
    alertify.error('<?php echo $allfields; ?>');
} else if(password != "" && password.length < 8) {
    alertify.error('<?php echo $passwordshort; ?>');
    return false;
} else {
    $.ajax({
        url: "adduser.php",
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
            type: type,
            mportal: mportal,
            mstudents: mstudents,
            mteachers: mteachers,
            mclasses: mclasses,
            mdivs: mdivs,
            myears: myears,
            mmaterials: mmaterials,
            mservices: mservices,
            mdeclined_words: mdeclined_words,
            mschools: mschools,
            password: password
        },
        cache: false,
        beforeSend: function(){
            document.getElementById('adduserbtn').disabled = true;
            document.getElementById('adduserbtn').innerHTML = "<i class='fa fa-spinner fa-spin'></i>";
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
function val(id, val, type){
  $.ajax({
        url: "val.php",
        type: "POST",
        data: {
          id: id,
          val: val,
          type: type
        },
        cache: false,
        success: function(dataResult){
            location.reload();
        }
  });
}
function showmore(id, type) {
  $.ajax({
        url: "getuser.php",
        type: "POST",
        data: {
          id: id,
          type: type
        },
        cache: false,
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
                $('#addUser').modal('show');
                document.getElementById('leavepass').style.display = "";
                $('#auid').val(dataResult.id);
                $('#auname').val(dataResult.name);
                $('#aufn').val(dataResult.fn);
                $('#augender').val(dataResult.gender);
                $('#audob').val(dataResult.dob);
                $('#auemail').val(dataResult.email);
                $('#aupn').val(dataResult.pn);
                $('#auschool').val(dataResult.school_id);
                $('#autype').val(type);
                if(type == "admins"){
                    document.getElementById('permissions').style.display = "";
                    if(dataResult.mportal == 0){
                    document.getElementById('mportal').checked = true;
                    $('#mportal').val(dataResult.mportal);
                    }else if(dataResult.mportal == 1){
                    document.getElementById('mportal').checked = false;
                    $('#mportal').val(dataResult.mportal);
                    }

                    if(dataResult.mstudents == 0){
                    document.getElementById('mstudents').checked = true;
                    $('#mstudents').val(dataResult.mstudents);
                    }else if(dataResult.mstudents == 1){
                    document.getElementById('mstudents').checked = false;
                    $('#mstudents').val(dataResult.mstudents);
                    }

                    if(dataResult.mteachers == 0){
                    document.getElementById('mteachers').checked = true;
                    $('#mteachers').val(dataResult.mteachers);
                    }else if(dataResult.mteachers == 1){
                    document.getElementById('mteachers').checked = false;
                    $('#mteachers').val(dataResult.mteachers);
                    }

                    if(dataResult.mclasses == 0){
                    document.getElementById('mclasses').checked = true;
                    $('#mclasses').val(dataResult.mclasses);
                    }else if(dataResult.mclasses == 1){
                    document.getElementById('mclasses').checked = false;
                    $('#mclasses').val(dataResult.mclasses);
                    }

                    if(dataResult.mdivs == 0){
                    document.getElementById('mdivs').checked = true;
                    $('#mdivs').val(dataResult.mdivs);
                    }else if(dataResult.mdivs == 1){
                    document.getElementById('mdivs').checked = false;
                    $('#mdivs').val(dataResult.mdivs);
                    }

                    if(dataResult.myears == 0){
                    document.getElementById('myears').checked = true;
                    $('#myears').val(dataResult.myears);
                    }else if(dataResult.myears == 1){
                    document.getElementById('myears').checked = false;
                    $('#myears').val(dataResult.myears);
                    }

                    if(dataResult.mmaterials == 0){
                    document.getElementById('mmaterials').checked = true;
                    $('#mmaterials').val(dataResult.mmaterials);
                    }else if(dataResult.mmaterials == 1){
                    document.getElementById('mmaterials').checked = false;
                    $('#mmaterials').val(dataResult.mmaterials);
                    }

                    if(dataResult.mservices == 0){
                    document.getElementById('mservices').checked = true;
                    $('#mservices').val(dataResult.mservices);
                    }else if(dataResult.mservices == 1){
                    document.getElementById('mservices').checked = false;
                    $('#mservices').val(dataResult.mservices);
                    }

                    if(dataResult.mdeclined_words == 0){
                    document.getElementById('mdeclined_words').checked = true;
                    $('#mdeclined_words').val(dataResult.mdeclined_words);
                    }else if(dataResult.mdeclined_words == 1){
                    document.getElementById('mdeclined_words').checked = false;
                    $('#mdeclined_words').val(dataResult.mdeclined_words);
                    }

                    if(dataResult.mschools == 0){
                    document.getElementById('mschools').checked = true;
                    $('#mschools').val(dataResult.mschools);
                    }else if(dataResult.mschools == 1){
                    document.getElementById('mschools').checked = false;
                    $('#mschools').val(dataResult.mschools);
                    }
                }else{
                    document.getElementById('permissions').style.display = "none";
                }
        }
  });
}
function deluser(id, type) {
    $.ajax({
        url: "deluser.php",
        type: "POST",
        data: {
          id: id,
          type: type
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