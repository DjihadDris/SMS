<?php
if(!isset($_COOKIE['id'])){
    header('Location: login');
}
include('dashboard_lang.php');
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
                
                <!--Dashboard widget-->
                <div class="mt-1 mb-3 button-container">
                    <div class="row pl-0">

<?php
if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                            <div class="bg-white border shadow">
                                <div class="media p-4">
                                    <div class="align-self-center mr-3 rounded-circle notify-icon bg-info" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>">
                                    <i class="fas fa-map-marked-alt"></i>
                                    </div>
                                    <div class="media-body pl-2">
                                        <h3 class="mt-0 mb-0"><strong><?php include('../db.php'); $query = "SELECT DISTINCT wilaya FROM schools"; $result = mysqli_query($conn, $query); $rowCount = mysqli_num_rows($result); echo $rowCount; $conn->close(); ?></strong></h3>
                                        <p><small class="bc-description text-muted"><?php echo $numwilayas; ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
}
?>

<?php
if($_COOKIE['user_type'] == "superadmins"){
?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                            <div class="bg-white border shadow">
                                <div class="media p-4">
                                    <div class="align-self-center mr-3 rounded-circle notify-icon bg-theme" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>">
                                    <i class="fas fa-users"></i>
                                    </div>
                                    <div class="media-body pl-2">
                                        <h3 class="mt-0 mb-0"><strong><?php include('../db.php'); if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){$query = "SELECT name FROM admins UNION SELECT name from superadmins WHERE id<>'$_COOKIE[id]'";}else{$query = "SELECT name FROM admins WHERE school_id='$_COOKIE[school_id]'";} $result = mysqli_query($conn, $query); $rowCount = mysqli_num_rows($result); echo $rowCount; $conn->close(); ?></strong></h3>
                                        <p><small class="text-muted bc-description"><?php echo $numadmins; ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php
}
?>
                        
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                            <div class="bg-white border shadow">
                                <div class="media p-4">
                                    <div class="align-self-center mr-3 rounded-circle notify-icon bg-danger" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                    <div class="media-body pl-2">
                                        <h3 class="mt-0 mb-0"><strong><?php include('../db.php'); if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){$query = "SELECT name FROM teachers";}else{$query = "SELECT name FROM teachers WHERE school_id='$_COOKIE[school_id]'";} $result = mysqli_query($conn, $query); $rowCount = mysqli_num_rows($result); echo $rowCount; $conn->close(); ?></strong></h3>
                                        <p><small class="text-muted bc-description"><?php echo $numteachers; ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                            <div class="bg-white border shadow">
                                <div class="media p-4">
                                    <div class="align-self-center mr-3 rounded-circle notify-icon bg-success" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>">
                                    <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <div class="media-body pl-2">
                                        <h3 class="mt-0 mb-0"><strong><?php include('../db.php'); if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){$query = "SELECT name FROM students";}else{$query = "SELECT name FROM students WHERE school_id='$_COOKIE[school_id]'";} $result = mysqli_query($conn, $query); $rowCount = mysqli_num_rows($result); echo $rowCount; $conn->close(); ?></strong></h3>
                                        <p><small class="text-muted bc-description"><?php echo $numstudents; ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php
if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
?>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                            <div class="bg-info border shadow">
                                <div class="media p-4">
                                    <div class="align-self-center mr-3 rounded-circle notify-icon bg-white" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>">
                                    <i class="fas fa-school text-info"></i>
                                    </div>
                                    <div class="media-body pl-2">
                                        <h3 class="mt-0 mb-0 text-white"><strong><?php include('../db.php'); $query = "SELECT name FROM schools"; $result = mysqli_query($conn, $query); $rowCount = mysqli_num_rows($result); echo $rowCount; $conn->close(); ?></strong></h3>
                                        <p><small class="bc-description text-white"><?php echo $numschools; ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
}
?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                            <div class="bg-theme border shadow">
                                <div class="media p-4">
                                    <div class="align-self-center mr-3 rounded-circle notify-icon bg-white" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>">
                                    <i class="fas fa-layer-group text-theme"></i>
                                    </div>
                                    <div class="media-body pl-2">
                                        <h3 class="mt-0 mb-0 text-white"><strong><?php include('../db.php'); if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){$query = "SELECT name FROM years";}else{$query = "SELECT name FROM years WHERE school_id='$_COOKIE[school_id]'";} $result = mysqli_query($conn, $query); $rowCount = mysqli_num_rows($result); echo $rowCount; $conn->close(); ?></strong></h3>
                                        <p><small class="bc-description text-white"><?php echo $numyears; ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php include('../db.php'); $school_id=$_COOKIE['school_id']; $sqls = "SELECT * FROM schools WHERE id='$school_id'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) { if("$rows[tawr]" == 3){ ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                            <div class="bg-danger border shadow">
                                <div class="media p-4">
                                    <div class="align-self-center mr-3 rounded-circle notify-icon bg-white" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>">
                                    <i class="fas fa-network-wired text-danger"></i>
                                    </div>
                                    <div class="media-body pl-2">
                                        <h3 class="mt-0 mb-0 text-white"><strong><?php include('../db.php'); if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){$query = "SELECT DISTINCT name FROM divs";}else{$query = "SELECT DISTINCT name FROM divs WHERE school_id='$_COOKIE[school_id]'";} $result = mysqli_query($conn, $query); $rowCount = mysqli_num_rows($result); echo $rowCount; $conn->close(); ?></strong></h3>
                                        <p><small class="bc-description text-white"><?php echo $numdivs; ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php }}} ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                            <div class="bg-<?php include('../db.php'); $school_id=$_COOKIE['school_id']; $sql = "SELECT * FROM schools WHERE id='$school_id'"; $result = $conn->query($sql); if ($result->num_rows > 0) {while($row = $result->fetch_assoc()) { if("$row[tawr]" == 3){echo "success";}else{echo "danger";}}} $conn->close(); ?> border shadow">
                                <div class="media p-4">
                                    <div class="align-self-center mr-3 rounded-circle notify-icon bg-white" style="<?php if($lang == "ar"){echo "margin-left: 10px;";} ?>">
                                    <i class="fas fa-chalkboard text-<?php include('../db.php'); $school_id=$_COOKIE['school_id']; $sql = "SELECT * FROM schools WHERE id='$school_id'"; $result = $conn->query($sql); if ($result->num_rows > 0) {while($row = $result->fetch_assoc()) { if("$row[tawr]" == 3){echo "success";}else{echo "danger";}}} $conn->close(); ?>"></i>
                                    </div>
                                    <div class="media-body pl-2">
                                        <h3 class="mt-0 mb-0 text-white"><strong><?php include('../db.php'); if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){$query = "SELECT name FROM classes";}else{$query = "SELECT name FROM classes WHERE school_id='$_COOKIE[school_id]'";} $result = mysqli_query($conn, $query); $rowCount = mysqli_num_rows($result); echo $rowCount; $conn->close(); ?></strong></h3>
                                        <p><small class="bc-description text-white"><?php echo $numclasses; ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!--/Dashboard widget-->


                <!--Chart Section-->
                <!--<div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                    <h6>Analytics overview</h6><hr>
                    <canvas id="orderRevenue" class="orderRevenue pt-1" height="100px"></canvas>
                </div>-->
                <!--Chart Section-->

                <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
                    <!--Order Listing-->
                    <div class="product-list">
                        
                        <div class="row border-bottom mb-4">
                            <div class="col-sm-8 pt-2"><h6 class="mb-4 bc-header"><i class="fas fa-newspaper"></i> <?php echo $newstitle; ?></h6></div>
                            <div class="col-sm-4 text-right pb-3">
                                <button class="btn btn-outline-theme shadow" data-toggle="modal" data-target="#addNews">
                                    <i class="fas fa-plus"></i> <?php echo $newsadd; ?>
                                </button>
                            </div>
                        </div>
                            
                            <table class="table table-bordered table-striped mt-0" width="100%" id="news">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo $titleofnews; ?></th>
                                        <th><?php echo $dateofnews; ?></th>
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
                                        <th><?php echo $schoolofnews; ?></th>
<?php } ?>
                                        <th><?php echo $userofnews; ?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
include('../db.php');
if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
$sql = "SELECT * FROM news";
}else{
$sql = "SELECT * FROM news WHERE school_id='$_COOKIE[school_id]'"; 
}
$i = 1;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
<tr>
<td class="align-middle"><?php echo $i;$i++; ?></td>
<td class="align-middle"><?php echo "$row[name]"; ?></td>
<td class="align-middle"><?php echo "$row[date]"; ?></td>
<?php if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){ ?>
<td class="align-middle"><?php $school_id="$row[school_id]"; $sqls = "SELECT * FROM schools WHERE id='$school_id'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name]";}}else{echo "No school found..";} $conn->close(); ?></td>
<?php } ?>
<td class="align-middle"><?php include('../db.php'); $user_id="$row[user_id]"; $sqls = "SELECT * FROM $row[type] WHERE id='$user_id'"; $results = $conn->query($sqls); if ($results->num_rows > 0) {while($rows = $results->fetch_assoc()) {echo "$rows[name] $rows[fn]";}}else{echo "No user found..";} ?></td>
<td class="align-middle text-center">
    <button class="btn btn-theme" onclick="showmore(<?php echo "$row[id]"; ?> , 'show')"><i class="fas fa-eye"></i></button>
    <button class="btn btn-success" onclick="showmore(<?php echo "$row[id]"; ?> , 'edit')"><i class="fas fa-edit"></i></button>
    <button class="btn btn-info" onclick="printnews(<?php echo "$row[id]"; ?>)"><i class="fas fa-print"></i></button>
    <?php if($_COOKIE['user_type'] == "superadmins" OR "$row[type]" <> "superadmins" AND "$row[user_id]" == $_COOKIE['id']){ ?>
    <button class="btn btn-danger" onclick="delnews(<?php echo "$row[id]"; ?>)"><i class="fas fa-trash"></i></button>
    <?php } ?>
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

                    <!--News Add Modal-->
                    <div class="modal fade" id="addNews" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $newsadd; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input id="uni" hidden>
                                    <label for="ant"><?php echo $titleofnews; ?> <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="ant">
                                    <label for="and"><?php echo $detailofnews; ?> <span style="color: red;">*</span></label>
                                    <textarea id="and"></textarea>
                                    <br>
                                    <button class="btn btn-outline-success" style="width: 100% !important;" id="addNewsbtn" onclick="addnews()"><i class="fas fa-save"></i> <?php echo $save; ?></button>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $leave; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--News Add Modal-->

                    <!--News Show Modal-->
                    <div class="modal fade" id="showNews" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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
$('#news').DataTable({
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
var id = document.getElementById('uni').value;
var title = document.getElementById('ant').value;
var des = myEditor.getData();
if(title != ""){
if(des != ""){
    $.ajax({
        url: 'addnews.php',
        type: 'POST',
        data: {
            id: id,
            title: title,
            des: des
        },
        cache: false,
        beforeSend: function(){
            document.getElementById("addNewsbtn").disabled = true;
            document.getElementById("addNewsbtn").innerHTML = "<i class='fa fa-spinner fa-spin'></i>";
        },
        success: function(dataResult){
            location.reload();
        }
    });
}else{
alertify.error("<?php echo $enternewsdes; ?>");
}
}else{
alertify.error("<?php echo $enternewsname; ?>");
}
}
function showmore(id, type) {
  $.ajax({
        url: "getnews.php",
        type: "POST",
        data: {
          id: id
        },
        cache: false,
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(type == "show"){
                $('#showNews').modal('show');
                $('#newsdes').html(dataResult.des);
            }else{
                $('#addNews').modal('show');
                document.getElementById('uni').value = dataResult.id;
                document.getElementById('ant').value = dataResult.name;
                myEditor.setData(dataResult.des);
            }
        }
  });
}

function printnews(id) {
$.ajax({
    url: 'printnews.php',
    type: 'POST',
    data: {
        id: id
    },
    cache: false,
    success: function(response) {
        var printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write('<html dir="<?php if($lang == "ar"){echo "rtl";}else{echo "ltr";} ?>"><head><title><?php echo $print; ?></title><link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet"><style>body {font-family: Noto Kufi Arabic;}</style></head><body>' + response + '</body></html>');
        printWindow.document.close();
        setTimeout(function(){printWindow.print(); printWindow.close();}, 500);
    }
});
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