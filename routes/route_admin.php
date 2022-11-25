<?php
    $sort = COURSES;

    $dir_ctrl    = 'controllers/admin/';
    $dir_views   = 'views/admin/';
    $name_exten  = 'Controller.php';

    if(isset($_GET['module'])) {
        $module         = $_GET['module'];
        $direct_read    = 'views/admin/'.$module.'/read.php';
        isset($_GET['act']) && $direct_act = $dir_views.$module.'/'.$_GET['act'].'.php';
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
            case "students":
                include_once $objectt;
                break;
            case "classes":
                include_once $objectt;
                break;
            case "bills":
                include_once $objectt;
                break;
            case "orders":
                include_once $objectt;
                break;
            case "rates":
                include_once $objectt;
                break;
            case "sales":
                include_once $objectt;
                break;
            case "statistical":
                include_once $objectt;
                break;
            case "logout":
//                delete_Cookie('scope');
                unsetSession('scope');
                location($host.'login');
                break;
            default:
                location($host."page_not_found");
                break;
        }
        active_item($module);
    }
    else {
        echo '<script>document.getElementById("dashboard").classList.add("active");</script>';
        include_once $dir_ctrl.'/dashboard.php';
    }
?>

