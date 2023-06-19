<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = "fr";
$unreadmsgs = "Messages non lus";
$viewall = "Afficher tous les messages";
$search = "Recherche";
$profile = "Mon profil";
$changelang = "Changement de langue";
$logout = "Déconnection";
$message_error_1 = "Veuillez sélectionner un utilisateur";
$message_error_2 = "Veuillez entrer votre message";
$sysname = "S<span class='small'>chool</span> M<span class='small'>anagement</span> S<span class='small'>ystem</span>";
}else{
$lang = "ar";
$unreadmsgs = "رسائل غير مقروءة";
$viewall = "عرض كل الرسائل";
$search = "البحث";
$profile = "الملف الشخصي";
$changelang = "تغيير اللغة";
$logout = "تسجيل الخروج";
$message_error_1 = "الرجاء إختيار المستخدم";
$message_error_2 = "الرجاء إدخال رسالتك";
$sysname = "نظام إدارة المدارس";
}
?>