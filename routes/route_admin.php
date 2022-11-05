<?php
    $module     = isset($_GET['module']) ? $_GET['module'] : '';
    $dir_img    = $host.'assets/uploads/'.$module.'/';
    switch ($module) {
        case "categories":
            include_once 'controllers/admin/'.$module.'/'.$module.'Controller.php';
            break;
        case "courses":
            include_once 'controllers/admin/'.$module.'/'.$module.'Controller.php';
            break;
        case "teachers":
            include_once 'controllers/admin/'.$module.'/'.$module.'Controller.php';
            break;
        default:
            include_once 'controllers/admin/dashboard/dashboard.php';
            break;
    }
    active_item($module);
?>