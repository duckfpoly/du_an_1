<?php
    $sort = COURSES;
    $direct_teacher = '';
    $direct_cate    = '';
    $direct_teacher = '';
    if(isset($_GET['teacher'])){
        $teacher = $_GET['teacher'];
        if(isset($_GET['cate'])){
            $cate = $_GET['cate'];
            $sort = "?teacher=".$teacher."&cate=".$cate;
            if(isset($_GET['sort'])){
                $sortt = $_GET['sort'];
                $sort = "?teacher=".$teacher."&cate=".$cate."&sort=".$sortt;
            }
        }
        elseif(isset($_GET['sort'])){
            $sortt = $_GET['sort'];
            $sort = "?teacher=".$teacher."&sort=".$sortt;
        }
    }

    $dir_ctrl   = 'controllers/admin/';
    $name_exten = 'Controller.php';
    if(isset($_GET['module'])) {
        $module         = $_GET['module'];
        $direct_read    = 'views/admin/'.$module.'/read.php';
        if(isset($_GET['act'])){
            $direct_act = 'views/admin/'.$module.'/'.$_GET['act'].'.php';
        }
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
        echo '<script>document.getElementById("dashboard").classList.add("active");</script>';
        include_once $dir_ctrl.'/dashboard.php';
    }
?>
