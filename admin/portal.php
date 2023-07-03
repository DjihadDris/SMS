<?php
if(!isset($_COOKIE['id'])){
    header('Location: login');
}
include('portal_lang.php');

include('../db.php');
// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the student code from the scanned barcode
    $Code = $_POST['code'];
if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
$retrieveQueryo = "SELECT name, fn, school_id, code FROM students WHERE code = '$Code' UNION SELECT name, fn, school_id, code FROM teachers WHERE code = '$Code'";
}else{
$retrieveQueryo = "SELECT name, fn, school_id, code FROM students WHERE code = '$Code' AND school_id = '$_COOKIE[school_id]' UNION SELECT name, fn, school_id, code FROM teachers WHERE code = '$Code' AND school_id = '$_COOKIE[school_id]'";
}
$resulto = $conn->query($retrieveQueryo);
if ($resulto->num_rows > 0) {
    while ($rowo = $resulto->fetch_assoc()) {

    // Get the current timestamp
    $time = date('Y-m-d H:i');

    // Check the last entry for the student
    $lastEntryType = '';
    $lastEntryQuery = "SELECT type FROM entries WHERE code = '$Code' ORDER BY id DESC LIMIT 1";
    $lastEntryResult = $conn->query($lastEntryQuery);

    if ($lastEntryResult->num_rows > 0) {
        // Retrieve the entry type of the last entry
        $lastEntryRow = $lastEntryResult->fetch_assoc();
        $lastEntryType = $lastEntryRow['type'];
    }

    // Determine the current entry type
    $entryType = ($lastEntryType === '0') ? '1' : '0';

    // Prepare the SQL statement to insert the entry into the database
    if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
        $sql = "INSERT INTO entries (code, time, type, school_id) VALUES ('$Code', '$time', '$entryType', '$rowo[school_id]')";
    }else{
    $sql = "INSERT INTO entries (code, time, type, school_id) VALUES ('$Code', '$time', '$entryType', '$_COOKIE[school_id]')";
    }

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        if($lang == "ar"){
            if($entryType == 0){
                $message = "<script>var audio = new Audio('../Sounds/true.mp3'); audio.play();</script><div class='alert alert-success'>تم تسجيل دخول $rowo[fn] $rowo[name].</div>";
            }else{
                $message = "<script>var audio = new Audio('../Sounds/true.mp3'); audio.play();</script><div class='alert alert-success'>تم تسجيل خروج $rowo[fn] $rowo[name].</div>";
            }
        }else{
            if($entryType == 0){
                $message = "<script>var audio = new Audio('../Sounds/true.mp3'); audio.play();</script><div class='alert alert-success'>L'entrée de $rowo[fn] $rowo[name] a été enregistrée.</div>";
            }else{
                $message = "<script>var audio = new Audio('../Sounds/true.mp3'); audio.play();</script><div class='alert alert-success'>La sortie de $rowo[fn] $rowo[name] a été enregistrée.</div>";
            }
        }
    } else {
        $message = "<script>var audio = new Audio('../Sounds/false.mp3'); audio.play();</script><div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}}else{
    if($lang == "ar"){
        $message = "<script>var audio = new Audio('../Sounds/false.mp3'); audio.play();</script><div class='alert alert-danger'>هذا الرمز غير موجود.</div>";
    }else{
        $message = "<script>var audio = new Audio('../Sounds/false.mp3'); audio.play();</script><div class='alert alert-danger'>Ce code n'existe pas.</div>";
    }
}
}

$i = 1;
// Retrieve the saved entries and student/teacher information from the database
$entries = [];
if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
$retrieveQuery = "(SELECT students.code AS code, students.name AS name, students.fn AS fn, entries.id AS id, entries.time AS time, entries.type AS type, entries.school_id AS school_id FROM students INNER JOIN entries ON students.code = entries.code)
    UNION
    (SELECT teachers.code AS code, teachers.name AS name, teachers.fn AS fn, entries.id AS id, entries.time AS time, entries.type AS type, entries.school_id AS school_id FROM teachers INNER JOIN entries ON teachers.code = entries.code)
    ORDER BY id DESC";
}else{
$retrieveQuery = "(SELECT students.code AS code, students.name AS name, students.fn AS fn, entries.id AS id, entries.time AS time, entries.type AS type, entries.school_id AS school_id FROM students INNER JOIN entries ON students.code = entries.code AND entries.school_id = $_COOKIE[school_id])
                  UNION
                  (SELECT teachers.code AS code, teachers.name AS name, teachers.fn AS fn, entries.id AS id, entries.time AS time, entries.type AS type, entries.school_id AS school_id FROM teachers INNER JOIN entries ON teachers.code = entries.code AND entries.school_id = $_COOKIE[school_id])
                  ORDER BY id DESC";
}

$result = $conn->query($retrieveQuery);

if ($result->num_rows > 0) {
    // Fetch all the entries
    while ($row = $result->fetch_assoc()) {
        $entries[] = $row;
    }
}
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
    <!--<div class="loader-wrapper">
        <div class="loader-circle">
            <div class="loader-wave"></div>
        </div>
    </div>-->
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
                            <div class="col-sm-8 pt-2"><h6 class="mb-4 bc-header"><i class="fas fa-sign-in-alt"></i> <?php echo $portal; ?></h6></div>
                        </div>
    <form method="POST" id="entriesForm">
    <div class="input-group mb-3">
        <input maxlength="10" minlength="10" placeholder="<?php echo $codetxt; ?>" required type="text" id="code" name="code" class="form-control" autofocus onkeyup="checkcode()">
        <button class="btn btn-success" type="submit" id="entriesFormbtn"><i class="fas fa-save"></i> <?php echo $save; ?></button>
    </div>
    </form>
<?php if(isset($message)){echo $message;} ?>
    <!-- Display the saved entries and student/teacher information in a table -->
        <table class="table table-bordered table-striped mt-0" width="100%" id="entries">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo $codetxt; ?></th>
                    <th><?php echo $fntxt; ?></th>
                    <th><?php echo $nametxt; ?></th>
                    <th><?php echo $timetxt; ?></th>
                    <th><?php echo $typetxt; ?></th>
                    <?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
                    <th><?php echo $schooltxt ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entries as $entry) : ?>
                    <tr>
                        <td class="align-middle"><?php echo $i;$i++; ?></td>
                        <td class="align-middle"><?php echo $entry['code']; ?></td>
                        <td class="align-middle"><?php echo $entry['fn']; ?></td>
                        <td class="align-middle"><?php echo $entry['name']; ?></td>
                        <td class="align-middle"><?php echo $entry['time']; ?></td>
                        <td class="align-middle"><?php if($entry['type'] == 0){echo $type0;}elseif($entry['type'] == 1){echo $type1;} ?></td>
                        <?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
                        <td class="align-middle"><?php include('../db.php'); $sqls = "SELECT * FROM schools WHERE id='$entry[school_id]'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No school found..";} $conn->close(); ?></td>
                        <?php } ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

                        
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
<script>
$(document).ready(function() {
let table = $('#entries').DataTable({
    /*columnDefs: [
        {
            targets: 12,
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
        /*exportOptions: { columns: ':visible:not(:last-child)' }*/
      },
      {
        extend: 'csv',
        text: '<i class="fas fa-file-csv"></i> <?php echo $exportcsv; ?>',
        className: 'btn btn-success',
        /*exportOptions: { columns: ':visible:not(:last-child)' }*/
      },
      {
        extend: 'excel',
        text: '<i class="fas fa-file-excel"></i> <?php echo $exportexcel; ?>',
        className: 'btn btn-theme',
        /*exportOptions: { columns: ':visible:not(:last-child)' }*/
      },
      <?php if($lang <> "ar"){ ?>
      {
        extend: 'pdf',
        text: '<i class="fas fa-file-pdf"></i> <?php echo $exportpdf; ?>',
        className: 'btn btn-warning',
        /*exportOptions: { columns: ':visible:not(:last-child)' }*/
      },
      <?php } ?>
      {
        extend: 'print',
        text: '<i class="fas fa-print"></i> <?php echo $print; ?>',
        className: 'btn btn-info',
        /*exportOptions: { columns: ':visible:not(:last-child)' }*/
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

function checkcode(){
var code = document.getElementById('code').value;
if(code != "" && code.length == 10){
    document.getElementById("entriesForm").submit();
    document.getElementById('entriesFormbtn').disabled = true;
    document.getElementById('entriesFormbtn').innerHTML = "<i class='fa fa-spinner fa-spin'></i>";
}
}
</script>
  </body>
</html>