<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$success1 = "La matière a été ajouté avec succès";
$success2 = "Modifications enregistrées avec succès";
$error1 = "Impossible d'ajouter une matière..";
$error2 = "Les modifications n'ont pas pu être enregistrées";
}else{
$success1 = "تم إضافة المادة بنجاح";
$success2 = "تم حفظ التعديلات بنجاح";
$error1 = "تعذر إضافة المادة..";
$error2 = "تعذر حفظ التعديلات";
}
?>