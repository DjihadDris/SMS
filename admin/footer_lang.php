<?php
$date = date('Y');
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$allrights = "Tous droits réservés $date conçu par";
}else{
    $lang = "ar";
$allrights = "جميع الحقوق محفوظة $date صمم بواسطة";
}