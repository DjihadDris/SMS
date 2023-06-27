<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$success1 = "L'utilisateur a été ajouté avec succès";
$success2 = "Modifications enregistrées avec succès";
$error1 = "Impossible d'ajouter un utilisateur..";
$error2 = "Les modifications n'ont pas pu être enregistrées";
}else{
$success1 = "تم إضافة المستخدم بنجاح";
$success2 = "تم حفظ التعديلات بنجاح";
$error1 = "تعذر إضافة المستخدم..";
$error2 = "تعذر حفظ التعديلات";
}
?>