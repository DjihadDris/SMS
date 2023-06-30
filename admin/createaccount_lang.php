<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$success = "Le compte a été créé avec succès";
$error1 = "Ce compte est déjà enregistré";
$error2 = "Impossible de créer un compte..";
}else{
$success = "تم إنشاء الحساب بنجاح";
$error1 = "هذا الحساب مسجل من قبل";
$error2 = "تعذر إنشاء الحساب..";
}
?>