<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$user_id = "Utilisateur";
$message_text = "Message";
$message_text_placeholder = "Votre message";
$select = "Sélectionner";
$send_btn_text = "Envoyer";
$student = "Élève";
$parent = "Parent";
$teacher = "Enseignant(e)";
$admin = "Directeur";
}else{
$lang = "ar";
$user_id = "المستخدم";
$message_text = "الرسالة";
$message_text_placeholder = "رسالتك";
$select = "إختيار";
$send_btn_text = "إرسال";
$student = "تلميذ(ة)";
$parent = "ولي(ة)";
$teacher = "أستاذ(ة)";
$admin = "مدير(ة)";
}
?>