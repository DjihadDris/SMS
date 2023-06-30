<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$title = "Mon profile - Système de gestion scolaire";
$ok_button = "D'accord";
$cancel_button = "Annuler";
$leave = "Sortie";
$save = "Enregistrer";
$name = "Prenom";
$fn = "Nom";
$gender = "Sexe";
$gender0 = "Mâle";
$gender1 = "Femelle";
$dob = "Date de naissance";
$email = "Adresse e-mail";
$pn = "Numéro de téléphone";
$choose = "--Sélectionner--";
$allfields = "Tous les champs sont requis";
$exportcsv = "Exporter CSV";
$exportexcel = "Exporter EXCEL";
$importexcel = "Importer EXCEL";
$exportpdf = "Exporter PDF";
$print = "Imprimer";
$copy = "Copier";
$pw = "Mot de profile";
$actualpassword = "Mot de passe actuel";
$newpassword = "Nouveau mot de passe";
$newnewpassword = "Confirmation du nouveau mot de passe";
}else{
$lang = "ar";
$title = "الملف الشخصي - نظام إدارة المدارس";
$ok_button = "موافق";
$cancel_button = "إلغاء";
$leave = "خروج";
$save = "حفظ";
$name = "الإسم";
$fn = "اللقب";
$gender = "الجنس";
$gender0 = "ذكر";
$gender1 = "أنثى";
$dob = "تاريخ الميلاد";
$email = "البريد الإلكتروني";
$pn = "رقم الهاتف";
$choose = "--إختر--";
$allfields = "جميع الحقول مطلوبة";
$exportcsv = "تصدير CSV";
$exportexcel = "تصدير EXCEL";
$importexcel = "إستيراد EXCEL";
$exportpdf = "تصدير PDF";
$print = "طباعة";
$copy = "نسخ";
$pw = "كلمة المرور";
$actualpassword = "كلمة المرور الحالية";
$newpassword = "كلمة المرور الجديدة";
$newnewpassword = "تأكيد كلمة المرور الجديدة";
}
?>