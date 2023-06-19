<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$message = "Après avoir terminé le processus d'inscription, vous devez attendre que le compte soit activé par le directeur de l'école.";
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
}else{
$message = "بعد إكمال عملية التسجيل، يجب الانتظار حتى يتم تفعيل الحساب من طرف مدير المدرسة.";
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
}
?>