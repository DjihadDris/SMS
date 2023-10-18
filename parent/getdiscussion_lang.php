<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$nothing = "Pas de messages, soyez le premier à discuter..";
$avatar = "Avatar";
$dateshow = "Dans le";
$timeshow = "À";
$today = "Aujourd'hui";
$yesterday = "Hier";
}else{
$lang = "ar";
$nothing = "لا توجد رسائل، كن أول من يدردش..";
$avatar = "الصورة الرمزية";
$dateshow = "في";
$timeshow = "على الساعة";
$today = "اليوم";
$yesterday = "أمس";
}
?>