<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$title = "Les cours - Système de gestion scolaire";
$ok_button = "D'accord";
$cancel_button = "Annuler";
$lessondetail = "Affichage de la leçon";
$leave = "Sortie";
$lessonstitle = "Les cours";
$lessonname = "Nom de la leçon";
$lessondate = "La date d'ajout";
$lessontime = "L'heure d'ajout";
$lessonclass = "Classe";
$detailoflesson = "Afficher";
$lessontrim = "Trimestre";
$trim1 = "Premier trimestre";
$trim2 = "Deuxième trimestre";
$trim3 = "Troisième trimestre";
$addlesson = "Ajouter une leçon";
$delbtn = "Supprimer";
$ortext = "ou";
$confirmdel = "Voulez-vous vraiment supprimer cette leçon?";
$choose = "Sélectionner";
$downloadbtn = "Télécharger";
$lessondes = "La description de la leçon";
$lessonimgs = "Les images de la leçon";
$lessonfiles = "Les fichiers de la leçon";
$savebtn = "Enregistrer";
$allfields = "Tous les champs sont requis";
}else{
$lang = "ar";
$title = "الدروس - نظام إدارة المدارس";
$ok_button = "موافق";
$cancel_button = "إلغاء";
$lessondetail = "عرض الدرس";
$leave = "خروج";
$lessonstitle = "الدروس";
$lessonname = "إسم الدرس";
$lessondate = "تاريخ الإضافة";
$lessontime = "وقت الإضافة";
$lessonclass = "القسم";
$detailoflesson = "عرض";
$lessontrim = "الفصل";
$trim1 = "الفصل الأول";
$trim2 = "الفصل الثاني";
$trim3 = "الفصل الثالث";
$addlesson = "إضافة درس";
$delbtn = "حذف";
$ortext = "أو";
$confirmdel = "هل تريد حذف هذا الدرس حقا؟";
$choose = "إختر";
$downloadbtn = "تحميل";
$lessondes = "وصف الدرس";
$lessonfiles = "ملفات الدرس";
$lessonimgs = "صور الدرس";
$savebtn = "حفظ";
$allfields = "جميع الحقول مطلوبة";
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