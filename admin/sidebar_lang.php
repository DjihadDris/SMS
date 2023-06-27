<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = "fr";
$dashboard = "Tableau de bord";
$users = "Gestion des utilisateurs";
$teachers = "Gestion des enseignants";
$students = "Gestion des élèves";
$years = "Gestion des niveaux scolaires";
$divs = "Gestion des divisions";
$classes = "Gestion des classes";
$services = "Gestion des services";
$declined_words = "Les mots interdits";
if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
$schools = "Gestion des écoles";
}else{
$schools = "Gestion d'école";
}
$wilayas = "Wilayas";
$materials = "Matières scolaires";
$portal = "La porte d'entrée";
}else{
$lang = "ar";
$dashboard = "لوحة التحكم";
$users = "تسيير المستخدمين";
$teachers = "تسيير الأساتذة";
$students = "تسيير التلاميذ";
$years = "تسيير المستويات التعليمية";
$divs = "تسيير الشعب";
$classes = "تسيير الأقسام";
$services = "تسيير الخدمات";
$declined_words = "الكلمات المحظورة";
if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
$schools = "تسيير المدارس";
}else{
$schools = "تسيير المدرسة";
}
$wilayas = "الولايات";
$materials = "المواد الدراسية";
$portal = "بوابة الدخول";
}
?>