<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$title = "Gestion des élèves - Système de gestion scolaire";
$ok_button = "D'accord";
$cancel_button = "Annuler";
$leave = "Sortie";
$save = "Enregistrer";
$addstudent = "Ajouter un élève";
$name = "Prenom";
$fn = "Nom";
$gender = "Sexe";
$gender0 = "Mâle";
$gender1 = "Femelle";
$dob = "Date de naissance";
$email = "Adresse e-mail";
$pn = "Numéro de téléphone";
$password = "Mot de passe";
$class = "Classe";
$div = "Division";
$year = "Niveau scolaire";
$school = "École";
}else{
$lang = "ar";
$title = "تسيير التلاميذ - نظام إدارة المدارس";
$ok_button = "موافق";
$cancel_button = "إلغاء";
$leave = "خروج";
$save = "حفظ";
$addstudent = "إضافة تلميذ";
$name = "الإسم";
$fn = "اللقب";
$gender = "الجنس";
$gender0 = "ذكر";
$gender1 = "أنثى";
$dob = "تاريخ الميلاد";
$email = "البريد الإلكتروني";
$pn = "رقم الهاتف";
$password = "كلمة المرور";
$class = "القسم";
$div = "الشعبة";
$year = "المستوى التعليمي";
$school = "المدرسة";
}
?>