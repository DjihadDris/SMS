<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$title = "Discuter - Système de gestion scolaire";
$ok_button = "D'accord";
$cancel_button = "Annuler";
$just1s = "Juste une seconde";
$loadingcontent = "Nous récupérons ce contenu pour vous.";
$messagetext = "Le message";
$sendbtntext = "Envoyer";
$declined = "Votre message contient des mots refusés";
$comma = ",";
}else{
$lang = "ar";
$title = "الدردشة - نظام إدارة المدارس";
$ok_button = "موافق";
$cancel_button = "إلغاء";
$just1s = "ثانية واحدة فقط";
$loadingcontent = "نحن نجلب هذا المحتوى لك.";
$messagetext = "الرسالة";
$sendbtntext = "إرسال";
$declined = "رسالتك تحتوي على كلمات محظورة";
$comma = "،";
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