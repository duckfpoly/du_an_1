<?php 
    // route admin
    $module = isset($_GET['module']) ? $_GET['module'] : "";
    switch ($module) {
        case "courses":
            include_once 'controllers/admin/courses/courseRoute.php';
            break;
        case "categories":
            include_once 'controllers/admin/categories/categoryRoute.php';
            break;
        default:
            include_once 'views/admin/dashboard.php';
            break;
    }
    active_item($module);
    // route site
    // $v = isset($_GET['v']) ? $_GET['v'] : "";
    // switch ($v) {
    //     case "course":
    //         include_once 'view/site/course.php';
    //         break;
    //     case "detail_course":
    //         include_once 'view/site/detail_course.php';
    //         break;
    //     case "about":
    //         include_once 'view/site/about.php';
    //         break;
    //     case "contact":
    //         include_once 'view/site/contact.php';
    //         break;
    //     case "profile":
    //         include_once 'view/site/profile.php';
    //         break;
    //     case "update_info":
    //         include_once 'view/site/.php';
    //         break;
    //     case "changed_pass":
    //         include_once 'view/site/.php';
    //         break;
    //     default:
    //         include_once 'views/site/home.php';
    //         break;
    // }
    // active_item($v);

?>
