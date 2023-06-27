<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$title = "Gestion des classes - Système de gestion scolaire";
$ok_button = "D'accord";
$cancel_button = "Annuler";
$leave = "Sortie";
$save = "Enregistrer";
$addclass = "Ajouter une classe";
$name = "Classe";
$year = "Niveau scolaire";
$div = "Division";
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
$chat = "Discussion";
}else{
$lang = "ar";
$title = "تسيير الأقسام - نظام إدارة المدارس";
$ok_button = "موافق";
$cancel_button = "إلغاء";
$leave = "خروج";
$save = "حفظ";
$addclass = "إضافة قسم";
$name = "القسم";
$year = "المستوى التعليمي";
$div = "الشعبة";
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
$chat = "الدردشة";
}
?>