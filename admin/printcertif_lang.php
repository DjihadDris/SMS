<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$jomhoria = "République algérienne démocratique et populaire";
$wizara = "Ministère de l'Education Nationale";
$certif = "Certificat école";
$schoolyeartxt = "Année scolaire";
if($_COOKIE['gender'] == 0){
$anamodir = "Je suis le directeur de";
}else{
$anamodir = "Je suis la directrice de";
}
$achadoana = "Je certifie que l'élève";
$certifnum = "Numéro";
$nametxt = "Prenom";
$fntxt = "Nom";
$dobtxt = "Date de naissance";
$classtxt = "Classe";
$continue = "Il continue son education";
$today = "Jusqu'à aujourd'hui";
$horira = "Fait en ";
$in = "le";
if($_COOKIE['gender'] == 0){
$sign = "Directeur de l'école";
}else{
$sign = "Directrice de l'école";
}
}else{
$lang = "ar";
$jomhoria = "الجمهورية الجزائرية الديمقراطية الشعبية";
$wizara = "وزارة التربية الوطنية";
$certif = "شهادة مدرسية";
$schoolyeartxt = "السنة الدراسية";
if($_COOKIE['gender'] == 0){
$anamodir = "أنا مدير";
}else{
$anamodir = "أنا مديرة";
}
$achadoana = "أشهد أن التلميذ(ة)";
$certifnum = "الرقم";
$nametxt = "الإسم";
$fntxt = "اللقب";
$dobtxt = "تاريخ الميلاد";
$classtxt = "القسم";
$continue = "يتابع دراسته";
$today = "إلى يومنا هذا";
$horira = "حرر بـ";
$in = "في";
if($_COOKIE['gender'] == 0){
$sign = "مدير المدرسة";
}else{
$sign = "مديرة المدرسة";
}
}
?>