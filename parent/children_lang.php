<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$title = "Mes enfants - Système de gestion scolaire";
$ok_button = "D'accord";
$cancel_button = "Annuler";
$leave = "Sortie";
$childrentitle = "Mes enfants";
$detailofchild = "Afficher";
}else{
$lang = "ar";
$title = "الدروس - نظام إدارة المدارس";
$ok_button = "موافق";
$cancel_button = "إلغاء";
$lessondetail = "عرض الدرس";
$leave = "خروج";
$childrentitle = "الدروس";
$detailofchild = "عرض";
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