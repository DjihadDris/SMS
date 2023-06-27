<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$success1 = "Le niveau scolaire a été ajouté avec succès";
$success2 = "Modifications enregistrées avec succès";
$error1 = "Impossible d'ajouter un niveau scolaire..";
$error2 = "Les modifications n'ont pas pu être enregistrées";
}else{
$success1 = "تم إضافة المستوى التعليمي بنجاح";
$success2 = "تم حفظ التعديلات بنجاح";
$error1 = "تعذر إضافة المستوى التعليمي..";
$error2 = "تعذر حفظ التعديلات";
}
?>