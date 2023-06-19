<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$success = "Connecté avec succès";
$error1 = "Votre compte n'est pas activé, veuillez attendre l'activation par le directeur de site";
$error2 = "Mauvais email ou mot de passe";
}else{
$success = "تم تسجيل الدخول بنجاح";
$error1 = "حسابك غير مفعل، يرجى إنتظار التفعيل من طرف مدير الموقع";
$error2 = "البريد الإلكتروني أو كلمة المرور خاطئة";
}
?>