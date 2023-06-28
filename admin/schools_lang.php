<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
$title = "Gestion des écoles - Système de gestion scolaire";
}else{
$title = "Gestion d'école - Système de gestion scolaire";
}
$ok_button = "D'accord";
$cancel_button = "Annuler";
$leave = "Sortie";
$save = "Enregistrer";
$name = "Nom";
$tawr = "Phase";
$tawr1 = "Primaire";
$tawr2 = "Moyen";
$tawr3 = "Secondaire";
$wilaya = "Wilaya";
$address = "Commune";
$choose = "--Sélectionner--";
$allfields = "Tous les champs sont requis";
$exportcsv = "Exporter CSV";
$exportexcel = "Exporter EXCEL";
$importexcel = "Importer EXCEL";
$exportpdf = "Exporter PDF";
$print = "Imprimer";
$copy = "Copier";
$addschool = "Ajouter une école";
$downloadreader = "Pour télécharger le lecteur de carte d'identité nationale: <a href='../download'>cliquez ici</a><br>Téléchargez ensuite l'extension Google Chrome: <a href='https://chrome.google.com/webstore/detail/adcs-eid-reader/ipcncgpbppgjclagpdlodiiapmggolkf' target='_blank'>cliquez ici</a>";
}else{
$lang = "ar";
if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
$title = "تسيير المدارس - نظام إدارة المدارس";
}else{
$title = "تسيير المدرسة - نظام إدارة المدارس";
}
$ok_button = "موافق";
$cancel_button = "إلغاء";
$leave = "خروج";
$save = "حفظ";
$name = "الإسم";
$tawr = "الطور";
$tawr1 = "إبتدائي";
$tawr2 = "متوسط";
$tawr3 = "ثانوي";
$wilaya = "الولاية";
$address = "البلدية";
$choose = "--إختر--";
$allfields = "جميع الحقول مطلوبة";
$exportcsv = "تصدير CSV";
$exportexcel = "تصدير EXCEL";
$importexcel = "إستيراد EXCEL";
$exportpdf = "تصدير PDF";
$print = "طباعة";
$copy = "نسخ";
$addschool = "إضافة مدرسة";
$downloadreader = "لتحميل قارئ بطاقات التعريف الوطنية: <a href='../download'>إضغط هنا</a><br>ثم قم بتحميل إضافة Google Chrome: <a href='https://chrome.google.com/webstore/detail/adcs-eid-reader/ipcncgpbppgjclagpdlodiiapmggolkf' target='_blank'>إضغط هنا</a>";
}
?>