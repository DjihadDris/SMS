<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$title = "Page principale - Système de gestion scolaire";
$ok_button = "D'accord";
$cancel_button = "Annuler";
$newsdetail = "Détails de l'actualité";
$leave = "Sortie";
$newstitle = "Les actualités";
$titleofnews = "Le titre";
$dateofnews = "La date";
$detailofnews = "Les détails";
$userofnews= "Utilisateur";
}else{
$lang = "ar";
$title = "الصفحة الرئيسية - نظام إدارة المدارس";
$ok_button = "موافق";
$cancel_button = "إلغاء";
$newsdetail = "تفاصيل الخبر";
$leave = "خروج";
$newstitle = "الأخبار";
$titleofnews = "العنوان";
$dateofnews = "التاريخ";
$detailofnews = "التفاصيل";
$userofnews = "المستخدم";
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