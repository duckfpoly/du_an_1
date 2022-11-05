<?php 
    $act = isset($_GET['act']) ? $_GET['act'] : "";
    switch ($act) {
        case "create":
                include_once 'views/admin/'.$module.'/create.php';
            break;
        case "store":
                $name_category = $_POST['name_category'];
                ctrl_store_category($name_category);
            break;
        case "update":
                $update_category = ctrl_update_category();
                include_once 'views/admin/'.$module.'/update.php';
            break;
        case "edit":
                $name_category = $_POST['name_category'];
                ctrl_edit_category($name_category);
            break;
        case "destroy":
                ctrl_destroy_category();
            break;
        default:
                if(isset($_GET['s'])){
                    $read_category = ctrl_search_category($_GET['s']);
                }else {
                    $read_category = ctrl_read_category();
                }
                include_once 'views/admin/'.$module.'/read.php';
            break;
    }
?>
<link rel="stylesheet" href="<?= $host ?>/assets/css/items/courses.css">
<script src="<?= $host ?>/assets/js/items/courses.js"></script>