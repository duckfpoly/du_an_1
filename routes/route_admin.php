<?php
<<<<<<< HEAD
    $module = isset($_GET['module']) ? $_GET['module'] : false;
    if(!empty($module)){
        try{
            require_once 'controllers/admin/'.$module.'/'.$module.'Controller.php';
        }
        catch (Throwable|Exception $e){
            echo '<script>window.location="'.$host.'page_not_found";</script>';
        }
        $dir_img = $host.'assets/uploads/'.$module.'/';
    }else {
        require_once 'controllers/admin/dashboard/dashboard.php';
    }
    
=======
    $module     = isset($_GET['module']) ? $_GET['module'] : '';
    $dir_img    = $host.'assets/uploads/'.$module.'/';
>>>>>>> 7d72e4c281997c6b3655ca7e7da9e869988c62a2
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