<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$title = "Gestion des services - Système de gestion scolaire";
$ok_button = "D'accord";
$cancel_button = "Annuler";
$leave = "Sortie";
$save = "Enregistrer";
$name = "Service";
$user = "Utilisateur";
$school = "École";
$choose = "--Sélectionner--";
$allfields = "Tous les champs sont requis";
$exportcsv = "Exporter CSV";
$exportexcel = "Exporter EXCEL";
$importexcel = "Importer EXCEL";
$exportpdf = "Exporter PDF";
$print = "Imprimer";
$copy = "Copier";
$status = "Statut";
$status0 = "";
$statuq1 = "";
}else{
$lang = "ar";
$title = "تسيير الخدمات - نظام إدارة المدارس";
$ok_button = "موافق";
$cancel_button = "إلغاء";
$leave = "خروج";
$save = "حفظ";
$name = "الخدمة";
$user = "المستخدم";
$school = "المدرسة";
$choose = "--إختر--";
$allfields = "جميع الحقول مطلوبة";
$exportcsv = "تصدير CSV";
$exportexcel = "تصدير EXCEL";
$importexcel = "إستيراد EXCEL";
$exportpdf = "تصدير PDF";
$print = "طباعة";
$copy = "نسخ";
$status = "الحالة";
$status0 = "";
$status1 = "";
}
?>