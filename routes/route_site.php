<?php
    if(isset($_GET['v'])) {
        $v = $_GET['v'];
        switch ($v) {
            case "lesson":
                include_once 'views/site/lession.php';
                break;
            default:
                location($host."page_not_found");
                break;
        }
    }
    else {
        include_once 'views/site/home.php';
    }
?>

