<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$success = "La demande a été envoyée avec succès";
$error = "La demande n'a pas pu être envoyée";
}else{
$success = "تم إرسال الطلب بنجاح";
$error = "تعذر إرسال الطلب";
}
?>