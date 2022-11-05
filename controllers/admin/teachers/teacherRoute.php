<?php 
    $act    = isset($_GET['act'])       ? $_GET['act']      : "";
    switch ($act) {
        case "create":
                include_once 'views/admin/'.$module.'/create.php';
            break;
        case "store":
                $name_category = $_POST['name_category'];
                ctrl_store_teacher($name_category);
            break;
        case "update":
                $update_category = ctrl_update_teacher();
                include_once 'views/admin/'.$module.'/update.php';
            break;
        case "edit":
                $name_category = $_POST['name_category'];
                ctrl_edit_teacher($name_category);
            break;
        case "destroy":
                ctrl_destroy_teacher();
            break;
        default:
                $read_teacher = ctrl_read_teacher();
                include_once 'views/admin/'.$module.'/read.php';
            break;
    }
?>
