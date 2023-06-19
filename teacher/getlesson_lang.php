<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lessonname = "Nom de la leçon";
$lessondes = "La description de la leçon";
$lessonimgs = "Les images de la leçon";
$lessonfiles = "Les fichiers de la leçon";
$lessondate = "La date d'ajout";
$lessontime = "L'heure d'ajout";
$lessontrim = "Trimestre";
$trim1 = "Premier trimestre";
$trim2 = "Deuxième trimestre";
$trim3 = "Troisième trimestre";
}else{
$lessonname = "إسم الدرس";
$lessondes = "وصف الدرس";
$lessonimgs = "صور الدرس";
$lessonfiles = "ملفات الدرس";
$lessondate = "تاريخ الإضافة";
$lessontime = "وقت الإضافة";
$lessontrim = "الفصل";
$trim1 = "الفصل الأول";
$trim2 = "الفصل الثاني";
$trim3 = "الفصل الثالث";
}
?>