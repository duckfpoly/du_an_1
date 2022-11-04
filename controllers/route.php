<?php 
    // route admin
    $module = isset($_GET['module']) ? $_GET['module'] : "";
    switch ($module) {
        case "courses":
            include_once 'controllers/admin/courses/courseRoute.php';
            break;
        default:
            include_once 'views/admin/dashboard.php';
            break;
    }
    active_item($module)
    // route site
?>
