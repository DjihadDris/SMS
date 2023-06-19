<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$title = "Mes données - Système de gestion scolaire";
$ok_button = "D'accord";
$cancel_button = "Annuler";
$infomessage = "Si vous rencontrez des problèmes pour afficher les données ou mettre à jour votre adresse e-mail et votre numéro de téléphone, veuillez vous déconnecter et vous reconnecter, merci..";
$profile_sec = "Mon profil";
$name = "Prénom";
$fn = "Nom";
$dob = "Date de naissance";
$gender = "Sexe";
$email = "Adresse e-mail";
$pn = "Numéro de téléphone";
$school = "École";
$class = "Classes";
$password_sec = "Mot de passe";
$actualpassword = "Mot de passe actuel";
$newpassword = "Nouveau mot de passe";
$newnewpassword = "Confirmation du nouveau mot de passe";
$savebtn = "Enregistrer";
$gender0 = "Mâle";
$gender1 = "Femelle";
$material = "Matière";
}else{
$lang = "ar";
$title = "بياناتي - نظام إدارة المدارس";
$ok_button = "موافق";
$cancel_button = "إلغاء";
$infomessage = "إذا واجهتك مشاكل في عرض البيانات أو تحديث البريد الإلكتروني ورقم الهاتف الرجاء تسجيل الخروج وإعادة تسجيل الدخول، وشكرا..";
$profile_sec = "الملف الشخصي";
$name = "الإسم";
$fn = "اللقب";
$dob = "تاريخ الميلاد";
$gender = "الجنس";
$email = "البريد الإلكتروني";
$pn = "رقم الهاتف";
$school = "المدرسة";
$class = "الأقسام";
$password_sec = "كلمة المرور";
$actualpassword = "كلمة المرور الحالية";
$newpassword = "كلمة المرور الجديدة";
$newnewpassword = "تأكيد كلمة المرور الجديدة";
$savebtn = "حفظ";
$gender0 = "ذكر";
$gender1 = "أنثى";
$material = "المادة";
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