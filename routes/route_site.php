<?php
$v = isset($_GET['v']) ? $_GET['v'] : "";
if($v){
    switch ($v){
        case "lessions":
            include 'views/site/lessions/lessions.php';
            break;
        case "about":
            include 'views/site/about/about.php';
            break;
        case "contact":
            include 'views/site/contact/contact.php';
            break;
        default:
            include 'views/site/home.php';
            break;
    }

}else{
    include_once 'views/site/home.php';
}
?>