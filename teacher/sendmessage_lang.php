<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$success = "Le message a été envoyé avec succès";
$error = "Le message n'a pas pu être envoyé";
}else{
$success = "تم إرسال الرسالة بنجاح";
$error = "تعذر إرسال الرسالة";
}
?>