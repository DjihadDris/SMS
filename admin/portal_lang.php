<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$title = "La porte d'entrée - Système de gestion scolaire";
$ok_button = "D'accord";
$cancel_button = "Annuler";
$leave = "Sortie";
$save = "Enregistrer";
$nametxt = "Prenom";
$fntxt = "Nom";
$exportcsv = "Exporter CSV";
$exportexcel = "Exporter EXCEL";
$importexcel = "Importer EXCEL";
$exportpdf = "Exporter PDF";
$print = "Imprimer";
$copy = "Copier";
$typetxt = "Type";
$type0 = "Entrée";
$type1 = "Sortie";
$timetxt = "Temps";
$codetxt = "Code";
$schooltxt = "École";
}else{
$lang = "ar";
$title = "بوابة الدخول - نظام إدارة المدارس";
$ok_button = "موافق";
$cancel_button = "إلغاء";
$leave = "خروج";
$save = "حفظ";
$nametxt = "الإسم";
$fntxt = "اللقب";
$exportcsv = "تصدير CSV";
$exportexcel = "تصدير EXCEL";
$importexcel = "إستيراد EXCEL";
$exportpdf = "تصدير PDF";
$print = "طباعة";
$copy = "نسخ";
$typetxt = "النوع";
$type0 = "دخول";
$type1 = "خروج";
$timetxt = "الوقت";
$codetxt = "الرمز";
$schooltxt = "المدرسة";
}
?>