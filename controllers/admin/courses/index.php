<?php 
    $module = isset($_GET['module']) ? $_GET['module'] : "";
    $act = isset($_GET['act']) ? $_GET['act'] : "";
    switch ($act) {
        case "create":
            include_once 'views/admin/'.$module.'/create.php';
            break;
        case "update":
            include_once 'views/admin/'.$module.'/update.php';
            break;
        case "delete":
            include_once 'views/admin/'.$module.'/delete.php';
            break;
        case "detail":
            
            include_once 'views/admin/'.$module.'/detail.php';
            break;
        default:
            $courses_read = courses_read();
            include_once 'views/admin/'.$module.'/read.php';
            break;
    }
?>