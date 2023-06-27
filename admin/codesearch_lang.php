<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$name = "Prenom";
$fn = "Nom";
$gender = "Sexe";
$gender0 = "Mâle";
$gender1 = "Femelle";
$dob = "Date de naissance";
$email = "Adresse e-mail";
$pn = "Numéro de téléphone";
$pw = "Mot de passe";
$class = "Classe";
$classes = "Classes";
$div = "Division";
$year = "Niveau scolaire";
$material = "Matière";
$school = "École";
$val = "Statut du compte";
$val0 = "Activé";
$val1 = "Désactivé";
}else{
$lang = "ar";
$name = "الإسم";
$fn = "اللقب";
$gender = "الجنس";
$gender0 = "ذكر";
$gender1 = "أنثى";
$dob = "تاريخ الميلاد";
$email = "البريد الإلكتروني";
$pn = "رقم الهاتف";
$pw = "كلمة المرور";
$class = "القسم";
$classes = "الأقسام";
$div = "الشعبة";
$year = "المستوى التعليمي";
$material = "المادة";
$school = "المدرسة";
$val = "حالة الحساب";
$val0 = "مفعل";
$val1 = "غير مفعل";
}
?>