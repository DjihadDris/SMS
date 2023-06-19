<?php
if(isset($_COOKIE['lang']) && $_COOKIE['lang'] == "fr"){
$lang = $_COOKIE['lang'];
$jomhoria = "République algérienne démocratique et populaire";
$wizara = "Ministère de l'Education Nationale";
$messagetitle = "Messages";
$dashboard = "Page principale";
$details = "Mes données";
$lessons = "Les cours";
$chat = "Discuter";
$service = "Demande de service";
$logout = "Se déconnecter";
$servicename = "Veuillez entrer le nom du service";
$cancel_button = "Annuler";
$changelang = "Changement de langue";
$message_error_1 = "Veuillez sélectionner un utilisateur";
$message_error_2 = "Veuillez entrer votre message";
$sidenavbgcolor = "Couleur de barre supérieure et la barre latérale";
$savecolorbtn = "Enregistrer";
$ordatatext = "ou";
$resetbtn = "Rétablir les couleurs par défaut";
$sidenavbordercolor = "Couleur des bords de la barre supérieure et de la barre latérale";
$bodybgcolor = "Couleur d'arrière-plan du contenu";
$bodybordercolor = "Couleur des bords du contenu";
$contactadmin = "Vous n'êtes pas autorisé à entrer dans le chat.. Veuillez contacter l'administrateur du site.";
$choose = "Sélectionner";
}else{
$lang = "ar";
$jomhoria = "الجمهورية الجزائرية الديمقراطية الشعبية";
$wizara = "وزارة التربية الوطنية";
$messagetitle = "الرسائل";
$dashboard = "الصفحة الرئيسية";
$details = "بياناتي";
$lessons = "الدروس";
$chat = "الدردشة";
$service = "طلب خدمة";
$logout = "تسجيل الخروج";
$servicename = "الرجاء إدخال إسم الخدمة";
$cancel_button = "إلغاء";
$changelang = "تغيير اللغة";
$message_error_1 = "الرجاء إختيار المستخدم";
$message_error_2 = "الرجاء إدخال رسالتك";
$sidenavbgcolor = "لون الشريط العلوي والشريط الجانبي";
$savecolorbtn = "حفظ";
$ordatatext = "أو";
$resetbtn = "إعادة التعيين إلى الألوان الافتراضية";
$sidenavbordercolor = "لون حواف الشريط العلوي والشريط الجانبي";
$bodybgcolor = "لون خلفية المحتوى";
$bodybordercolor = "لون حواف المحتوى";
$contactadmin = "لا تملك الإذن للدخول إلى الدردشة.. الرجاء الإتصال بمدير الموقع.";
$choose = "إختر";
}

if(isset($_COOKIE['bgcolor']) OR isset($_COOKIE['bordercolor']) OR isset($_COOKIE['bbgcolor'])){
$bgcolor = $_COOKIE['bgcolor'];
$bordercolor = $_COOKIE['bordercolor'];
$bbgcolor = $_COOKIE['bbgcolor'];
$bbordercolor = $_COOKIE['bbordercolor'];
if($_COOKIE['bordercolor'] != ""){
$borderweight = "solid";
$bordersize = "2.5px";
}else{
$borderweight = "";
$bordersize = "";
}
}else{
$bgcolor = "";
$bordercolor = "";
$borderweight = "";
$bordersize = "";
$bbgcolor = "";
$bbordercolor = "";
}
?>