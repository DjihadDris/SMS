<?php
if(isset($_COOKIE['lang'])){
    if($_COOKIE['lang'] == "ar"){
        $to = "fr";
    }else{
        $to = "ar";
    }
}else{
    $to = "fr";
}
setcookie("lang", "$to", time() + (60*60*24*30), "/");
header('Location:'.$_GET['from']);
?>