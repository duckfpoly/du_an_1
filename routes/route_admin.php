<?php
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
    switch ($module) {
        case "categories":
            include_once 'controllers/admin/categories/categoryRoute.php';
            break;
        case "courses":
            include_once 'controllers/admin/courses/courseRoute.php';
            break;
        case "teachers":
            include_once 'controllers/admin/teachers/teacherRoute.php';
            break;
    }
    active_item($module);
?>