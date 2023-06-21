<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$title = "Les cours - Système de gestion scolaire";
$ok_button = "D'accord";
$cancel_button = "Annuler";
$lessondetail = "Affichage de la leçon";
$leave = "Sortie";
$lessonstitle = "Les cours";
$lessonname = "Titre de la leçon";
$lessondate = "La date d'ajout";
$lessontime = "L'heure d'ajout";
$lessonuser = "L'enseignant(e)";
$lessonmaterial = "La matière";
$detailoflesson = "Afficher";
$lessontrim = "Trimestre";
$trim1 = "Premier trimestre";
$trim2 = "Deuxième trimestre";
$trim3 = "Troisième trimestre";
}else{
$lang = "ar";
$title = "الدروس - نظام إدارة المدارس";
$ok_button = "موافق";
$cancel_button = "إلغاء";
$lessondetail = "عرض الدرس";
$leave = "خروج";
$lessonstitle = "الدروس";
$lessonname = "عنوان الدرس";
$lessondate = "تاريخ الإضافة";
$lessontime = "وقت الإضافة";
$lessonuser = "الأستاذ(ة)";
$lessonmaterial = "المادة";
$detailoflesson = "عرض";
$lessontrim = "الفصل";
$trim1 = "الفصل الأول";
$trim2 = "الفصل الثاني";
$trim3 = "الفصل الثالث";
}

if(isset($_COOKIE['bbgcolor']) OR isset($_COOKIE['bbordercolor'])){
$bbgcolor = $_COOKIE['bbgcolor'];
$bbordercolor = $_COOKIE['bbordercolor'];
if($_COOKIE['bbordercolor'] != ""){
$bborderweight = "solid";
$bbordersize = "2.5px";
}else{
$bborderweight = "";
$bbordersize = "";
}
}else{
$bbgcolor = "";
$bbordercolor = "";
$bborderweight = "";
$bbordersize = "";
}
?>