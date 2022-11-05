<?php
    $dir_ctrl   = 'controllers/admin/';
    $name_exten = 'Controller.php';
    if(isset($_GET['module'])) {
        $module         = $_GET['module'];
        $dir_img        = $host.'assets/uploads/'.$module.'/';
        $objectt        = $dir_ctrl.$module.$name_exten;
        switch ($module) {
            case "categories":
                include_once $objectt;
                break;
            case "courses":
                include_once $objectt;
                break;
            case "teachers":
                include_once $objectt;
                break;
            default:
                location($host."page_not_found");
                break;
        }
        active_item($module);
    }
    else {
        include_once $dir_ctrl.'dashboard/dashboard.php';
    }
?>