<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$th_1 = "Message";
$th_2 = "Utilisateur";
$sendnewmessage = "Envoyer un nouveau message";
$vu_btn_text = "Marquer comme lu";
$msgvu = "Lu";
}else{
$lang = "ar";
$th_1 = "الرسالة";
$th_2 = "المستخدم";
$sendnewmessage = "إرسال رسالة جديدة";
$vu_btn_text = "تمييز كمقروءة";
$msgvu = "مقروءة";
}
?>