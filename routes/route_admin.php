<?php 
    if(isset($_GET['module'])){
        $module = $_GET['module'];
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
    $module = isset($_GET['module']) ? $_GET['module'] : "";
    switch ($module) {
        case "courses":
            include_once 'controllers/admin/courses/courseRoute.php';
            break;
        case "categories":
            include_once 'controllers/admin/categories/categoryRoute.php';
            break;
    }
    active_item($module);
?>