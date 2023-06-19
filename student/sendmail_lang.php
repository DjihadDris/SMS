<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$title = "Système de gestion scolaire";
$title = mb_convert_encoding($title, 'UTF-8');
$yourpassword = "Votre mot de passe est:";
$changepass = "Veuillez changer votre mot de passe après vous être connecté";
$emailtitle = "Récupération de mot de passe - Système de gestion scolaire";
$success = "Votre mot de passe a été envoyé à votre adresse e-mail avec succès";
$error_1 = "Erreur:";
$error_2 = "L'e-mail n'est pas enregistré dans la base de données";
}else{
$title = "نظام إدارة المدارس";
$title = mb_convert_encoding($title, 'UTF-8');
$yourpassword = "كلمة المرور الخاصة بك هي:";
$changepass = "الرجاء تغيير كلمة المرور بعد تسجيل الدخول";
$emailtitle = "إستعادة كلمة المرور - نظام إدارة المدارس";
$success = "تم إرسال كلمة المرور إلى البريد الإلكتروني الخاص بك بنجاح";
$error_1 = "خطأ:";
$error_2 = "البريد الإلكتروني غير مسجل في قاعدة البيانات";
}
?>