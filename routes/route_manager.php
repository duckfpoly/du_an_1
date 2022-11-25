<?php
    $dir_ctrl    = 'controllers/manager/teacher/';
    $dir_views   = 'views/manager/teachers/';
    $name_exten  = '.php';

    if(isset($_GET['view'])) {
        $view           = $_GET['view'];
        $direct_read    = 'views/manager/teachers/'.$view.'/read.php';
        isset($_GET['action']) && $direct_act = $dir_views.$view.'/'.$_GET['action'].'.php';
        $dir_img        = $host.'assets/uploads/'.$view.'/';
        $objectt        = $dir_ctrl.$view.$name_exten;
        switch ($view) {
            case "my_course":
                include_once $objectt;
                break;
            case "my_class":
                include_once $objectt;
                break;
            default:
                location($host."page_not_found");
                break;
        }
    }
    else {
//        echo '<script>document.getElementById("dashboard").classList.add("active");</script>';
        include_once $dir_ctrl.'dashboard.php';
    }
?>

