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
}else{
$lang = "ar";
$dashboard = "لوحة التحكم";
$users = "تسيير المستخدمين";
$teachers = "تسيير الأساتذة";
$students = "تسيير التلاميذ";
$years = "تسيير المستويات التعليمية";
$divs = "تسيير الشعب";
$classes = "تسيير الأقسام";
}
?>