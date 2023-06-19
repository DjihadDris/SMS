<?php
$date = date('Y');
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$title = "Tableau de bord - Système de gestion scolaire";
$ok_button = "D'accord";
$cancel_button = "Annuler";
$newsdetail = "Détails de l'actualité";
$newsadd = "Ajouter une actualité";
$leave = "Sortie";
$newstitle = "Les actualités";
$titleofnews = "Le titre";
$dateofnews = "La date";
$detailofnews = "Les détails";
$userofnews = "Utilisateur";
$save = "Enregistrer";
$allrights = "Tous droits réservés $date conçu par";
$numadmins = "Nombre d'utilisateurs";
$numteachers = "Nombre des enseignants";
$numstudents = "Nombre des élèves";
$numyears = "Nombre de niveaux scolaires";
$numdivs = "Nombre de divisions";
$numclasses = "Nombre de classes";
}else{
$lang = "ar";
$title = "لوحة التحكم - نظام إدارة المدارس";
$ok_button = "موافق";
$cancel_button = "إلغاء";
$newsdetail = "تفاصيل الخبر";
$newsadd = "إضافة خبر";
$leave = "خروج";
$newstitle = "الأخبار";
$titleofnews = "العنوان";
$dateofnews = "التاريخ";
$detailofnews = "التفاصيل";
$userofnews = "المستخدم";
$save = "حفظ";
$allrights = "جميع الحقوق محفوظة $date صمم بواسطة";
$numadmins = "عدد المستخدمين";
$numteachers = "عدد الأساتذة";
$numstudents = "عدد التلاميذ";
$numyears = "عدد المستويات التعليمية";
$numdivs = "عدد الشعب";
$numclasses = "عدد الأقسام";
}
?>