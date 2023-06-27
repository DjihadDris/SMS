<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$title = "Gestion des divisions - Système de gestion scolaire";
$ok_button = "D'accord";
$cancel_button = "Annuler";
$leave = "Sortie";
$save = "Enregistrer";
$adddiv = "Ajouter une division";
$name = "Division";
$year = "Niveau scolaire";
$school = "École";
$choose = "--Sélectionner--";
$allfields = "Tous les champs sont requis";
$exportcsv = "Exporter CSV";
$exportexcel = "Exporter EXCEL";
$importexcel = "Importer EXCEL";
$exportpdf = "Exporter PDF";
$print = "Imprimer";
$copy = "Copier";
$code = "Code";
}else{
$lang = "ar";
$title = "تسيير الشعب - نظام إدارة المدارس";
$ok_button = "موافق";
$cancel_button = "إلغاء";
$leave = "خروج";
$save = "حفظ";
$adddiv = "إضافة شعبة";
$name = "الشعبة";
$year = "المستوى التعليمي";
$school = "المدرسة";
$choose = "--إختر--";
$allfields = "جميع الحقول مطلوبة";
$exportcsv = "تصدير CSV";
$exportexcel = "تصدير EXCEL";
$importexcel = "إستيراد EXCEL";
$exportpdf = "تصدير PDF";
$print = "طباعة";
$copy = "نسخ";
$code = "الرمز";
}
?>