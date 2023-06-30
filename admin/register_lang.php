<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$message = "Après avoir terminé le processus d'inscription, le compte est automatiquement activé puis vérifié par l'administrateur système.";
$name = "Prenom";
$fn = "Nom";
$dob = "Date de naissance";
$gender = "Sexe";
$gender0 = "Mâle";
$gender1 = "Femelle";
$email = "Adresse e-mail";
$pn = "Numéro de téléphone";
$school = "École";
$year = "Niveau d'éducation";
$div = "Division";
$class = "Classe";
$passwordtext = "Mot de passe";
$btn = "Inscription";
$choose = "Sélectionner";
$tawr = "Phase";
$tawr1 = "Primaire";
$tawr2 = "Moyen";
$tawr3 = "Secondaire";
$wilaya = "Wilaya";
$address = "Commune";
}else{
$lang = "ar";
$message = "بعد إكمال عملية التسجيل، يتم تفعيل الحساب تلقائيا وبعدها يتم التحقق منه من طرف مدير النظام.";
$name = "الإسم";
$fn = "اللقب";
$dob = "تاريخ الميلاد";
$gender = "الجنس";
$gender0 = "ذكر";
$gender1 = "أنثى";
$email = "البريد الإلكتروني";
$pn = "رقم الهاتف";
$school = "المدرسة";
$year = "المستوى التعليمي";
$div = "الشعبة";
$class = "القسم";
$passwordtext = "كلمة المرور";
$btn = "تسجيل";
$choose = "إختر";
$tawr = "الطور";
$tawr1 = "إبتدائي";
$tawr2 = "متوسط";
$tawr3 = "ثانوي";
$wilaya = "الولاية";
$address = "البلدية";
}
?>