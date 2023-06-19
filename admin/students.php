<?php
if(!isset($_COOKIE['id'])){
    header('Location: login');
}
include('students_lang.php');
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
                            <div class="col-sm-8 pt-2"><h6 class="mb-4 bc-header"><i class="fas fa-user-graduate"></i> <?php echo $students; ?></h6></div>
                            <div class="col-sm-4 text-right pb-3">
                                <button class="btn btn-outline-theme shadow" data-toggle="modal" data-target="#addStudent">
                                    <i class="fas fa-plus"></i> <?php echo $addstudent; ?>
                                </button>
                            </div>
                        </div>

<div class="form-group row">
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
<div class="col-sm-3">
<select class="form-control" id="sschool_id" onchange="getyears()">
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
<div class="col-sm-3">
<select class="form-control" id="syear_id" onchange="getdivs()">
    <option value=""><?php echo $year; ?></option>
</select>
</div>
<div class="col-sm-3">
<select class="form-control" id="sdiv_id" onchange="getclasses()">
    <option value=""><?php echo $div; ?></option>
</select>
</div>
<div class="col-sm-3">
<select class="form-control" id="sclass_id">
    <option value=""><?php echo $class; ?></option>
</select>
</div>
<?php }else{
include('../db.php'); $school_id=$_COOKIE['school_id']; $sql = "SELECT * FROM schools WHERE id='$school_id'"; $result = $conn->query($sql); if ($result->num_rows > 0) {while($row = $result->fetch_assoc()) { if("$row[tawr]" == 3){ ?>
<div class="col-sm-4">
<select class="form-control" id="syear_id" onchange="getdivs()">
    <option value=""><?php echo $year; ?></option>
<?php
$school_id = $_COOKIE['school_id'];
$sqls = "SELECT * FROM years WHERE school_id='$school_id'";
$results = $conn->query($sqls);
if ($results->num_rows > 0) {
while($rows = $results->fetch_assoc()) {
echo "<option value='$rows[id]' data-value='$rows[name]'>$rows[name]</option>";
}}
$conn->close();
?>
</select>
</div>
<div class="col-sm-4">
<select class="form-control" id="sdiv_id" onchange="getclasses()">
    <option value=""><?php echo $div; ?></option>
</select>
</div>
<div class="col-sm-4">
<select class="form-control" id="sclass_id">
    <option value=""><?php echo $class; ?></option>
</select>
</div>
<?php }}}} ?>
</div>

                        <div class="table-responsive product-list">
                            
                        <table class="table table-bordered table-striped mt-0" width="100%" id="students">
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
                                        <th><?php echo $year; ?></th>
                                        <th><?php echo $div; ?></th>
                                        <th><?php echo $class; ?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
include('../db.php');
if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
$sql = "SELECT * FROM students";
}else{
$sql = "SELECT * FROM students WHERE school_id='$_COOKIE[school_id]'";
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
<td class="align-middle"><?php if("$row[gender]" == 0){echo $gender0;}else{echo $gender1;}; ?></td>
<td class="align-middle"><?php echo "$row[email]"; ?></td>
<td class="align-middle"><?php echo "$row[pn]"; ?></td>
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
<td class="align-middle"><?php include('../db.php'); $sqls = "SELECT * FROM schools WHERE id='$row[school_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No school found..";} $conn->close();?></td>
<?php } ?>
<td class="align-middle"><?php include('../db.php'); $sqls = "SELECT * FROM years WHERE id='$row[year_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No year found..";} $conn->close();?></td>
<td class="align-middle"><?php include('../db.php'); $sqls = "SELECT * FROM divs WHERE id='$row[div_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No div found..";} $conn->close();?></td>
<td class="align-middle"><?php include('../db.php'); $sqls = "SELECT * FROM classes WHERE id='$row[class_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}} ?></td>
<td class="align-middle text-center"><button class="btn btn-theme" onclick="showmore(<?php echo "$row[id]"; ?>)"><i class="fa fa-eye"></i></button><button class="btn btn-success" onclick="printnews(<?php echo "$row[id]"; ?>)"><i class="fa fa-print"></i></button><!--<button class="btn btn-info" data-toggle="modal" data-target="#updateNews"><i class="fa fa-pencil"></i></button>--></td>
</tr>
<?php
  }}
$conn->close();
?>
                                </tbody>
                    </table>
                        </div>
                    </div>
                    <!--/Order Listing-->

                    <!--Student Add Modal-->
                    <div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $addstudent; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="ant"><?php echo $titleofnews; ?> <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="ant">
                                    <label for="and"><?php echo $detailofnews; ?> <span style="color: red;">*</span></label>
                                    <textarea id="and"></textarea>
                                    <br>
                                    <button class="btn btn-outline-success" style="width: 100% !important;" onclick="addnews()"><i class="fas fa-save"></i> <?php echo $save; ?></button>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $leave; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Student Add Modal-->

                    <!--Student Show Modal-->
                    <div class="modal fade" id="showStudent" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $newsdetail; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="newsdes"></div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $leave; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Student Show Modal-->

                    <!--Student Update Modal-->
                    <!--<div class="modal fade" id="updateStudent" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Ord#13 details update</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $leave; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <!--Student Update Modal-->
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
    <!--Ckeditor-->
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script src="assets/js/ckeditor5/build-classic/ckeditor.js"></script>
    <script src="assets/js/ckeditor5/build-classic/translations/<?php if($lang == "ar"){echo 'ar';}else{echo 'fr';} ?>.js"></script>
    <!--Axios-->
    <!--<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>-->
    <!--Custom Js Script-->
    <script src="assets/js/custom.js"></script>
    <!--Custom Js Script-->
<script>
$(document).ready(function() {
let table = $('#students').DataTable({
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
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
var select = $('#sschool_id');
select.on('change', function() {
  var val = $.fn.dataTable.util.escapeRegex($(this).val());
  var optionText = $(this).find('option:selected').data('value');
  table.column(7).search(val ? '^' + optionText + '$' : '', true, false).draw();
});
var select2 = $('#syear_id');
select2.on('change', function() {
  var val = $.fn.dataTable.util.escapeRegex($(this).val());
  var optionText = $(this).find('option:selected').data('value');
  table.column(8).search(val ? '^' + optionText + '$' : '', true, false).draw();
});
var select3 = $('#sdiv_id');
select3.on('change', function() {
  var val = $.fn.dataTable.util.escapeRegex($(this).val());
  var optionText = $(this).find('option:selected').data('value');
  table.column(9).search(val ? '^' + optionText + '$' : '', true, false).draw();
});
var select4 = $('#sclass_id');
select4.on('change', function() {
  var val = $.fn.dataTable.util.escapeRegex($(this).val());
  var optionText = $(this).find('option:selected').data('value');
  table.column(10).search(val ? '^' + optionText + '$' : '', true, false).draw();
});
<?php }else{ ?>
var select = $('#syear_id');
select.on('change', function() {
  var val = $.fn.dataTable.util.escapeRegex($(this).val());
  var optionText = $(this).find('option:selected').data('value');
  table.column(7).search(val ? '^' + optionText + '$' : '', true, false).draw();
});
var select2 = $('#sdiv_id');
select2.on('change', function() {
  var val = $.fn.dataTable.util.escapeRegex($(this).val());
  var optionText = $(this).find('option:selected').data('value');
  table.column(8).search(val ? '^' + optionText + '$' : '', true, false).draw();
});
var select3 = $('#sclass_id');
select3.on('change', function() {
  var val = $.fn.dataTable.util.escapeRegex($(this).val());
  var optionText = $(this).find('option:selected').data('value');
  table.column(9).search(val ? '^' + optionText + '$' : '', true, false).draw();
});
<?php } ?>
});
var myEditor;
ClassicEditor.create( document.querySelector( '#and' ), {
    ckfinder: {
        uploadUrl: '../uploads/<?php echo $_COOKIE['school_id']; ?>/news'
    },
    language: '<?php if($lang == "ar"){echo 'ar';}else{echo 'fr';} ?>'
}).then( editor => {
    myEditor = editor;
}).catch( error => {
    console.error( error );
});
function addnews() {
var title = document.getElementById('ant').value;
var des = myEditor.getData();
if(title != ""){
if(des != ""){
    $.ajax({
        url: 'addnews.php',
        type: 'POST',
        data: {
            title: title,
            des: des
        },
        cache: false,
        success: function(dataResult){
            location.reload();
        }
    });
}else{
alertify.error('Des');
}
}else{
alertify.error('Title');
}
}
function getyears() {
var school_id = document.getElementById('sschool_id').value;
$.ajax({
        url: 'getyears.php',
        type: 'POST',
        data: {
            school_id: school_id
        },
        cache: false,
        success: function(dataResult){
            document.getElementById('syear_id').innerHTML = dataResult;
        }
    });
}
function getdivs() {
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
var school_id = document.getElementById('sschool_id').value;
<?php }else{ ?>
var school_id = <?php echo $_COOKIE['school_id'] ?>;
<?php } ?>
var year_id = document.getElementById('syear_id').value;
$.ajax({
        url: 'getdivs.php',
        type: 'POST',
        data: {
            school_id: school_id,
            year_id: year_id
        },
        cache: false,
        success: function(dataResult){
            document.getElementById('sdiv_id').innerHTML = dataResult;
            getclasses.call();
        }
    });
}
function getclasses() {
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
var school_id = document.getElementById('sschool_id').value;
<?php }else{ ?>
var school_id = <?php echo $_COOKIE['school_id'] ?>;
<?php } ?>
var year_id = document.getElementById('syear_id').value;
var div_id = document.getElementById('sdiv_id').value;
$.ajax({
        url: 'getclasses.php',
        type: 'POST',
        data: {
            school_id: school_id,
            year_id: year_id,
            div_id: div_id
        },
        cache: false,
        success: function(dataResult){
            document.getElementById('sclass_id').innerHTML = dataResult;
        }
    });
}
function printnews(id) {
   // Send the ID to the print.php page
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'printnews.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.responseType = 'blob'; // Set the response type to blob
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Create a new window and display the PDF
      var blob = new Blob([xhr.response], { type: 'application/pdf' });
      var url = URL.createObjectURL(blob);
      var newWindow = window.open(url, '_blank');
      // Print the PDF
      newWindow.onload = function() {
        newWindow.print();
      };
    }
  };
  xhr.send('id=' + id);
}
function delnews(id) {
    $.ajax({
        url: "delnews.php",
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