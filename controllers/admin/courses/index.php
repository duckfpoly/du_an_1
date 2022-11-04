<?php 
    $act    = isset($_GET['act'])       ? $_GET['act']      : "";
    switch ($act) {
        case "create":
                include_once 'views/admin/'.$module.'/create.php';
            break;
        case "store":
                $name_course            = $_POST['name_course'];
                $price_course           = $_POST['price_course'];
                $description_course     = $_POST['description_course'];
                $quote                  = $_POST['quote'];
                $image_course           = $_FILES['image_course']['name'];
                save_file('image_course', 'courses');
                ctrl_store_courses($name_course,$price_course,$description_course,$quote,$image_course);
            break;
        case "update":
                $courses_update = ctrl_update_courses();
                include_once 'views/admin/'.$module.'/update.php';
            break;
        case "edit":
                $status_course          = $_POST['status_course'];
                $name_course            = $_POST['name_course'];
                $price_course           = $_POST['price_course'];
                $image_goc              = $_POST['old_image_course'];
                $image_up               = $_FILES['image_course']['name'];
                if ($image_up == '') {
                    $image_course = $image_goc;
                } else {
                    $image_course = $image_up;
                    save_image('image_course',$module);
                }
                $star_course            = $_POST['star_course'];
                $rate_course            = $_POST['rate_course'];
                $description_course     = $_POST['description_course'];
                $quote                  = $_POST['quote'];
                $created_at             = $_POST['created_at'];
                ctrl_edit_courses($status_course,$name_course,$price_course,$image_course,$star_course,$rate_course,$description_course,$quote,$created_at );
            break;
        case "delete":
                include_once 'views/admin/'.$module.'/delete.php';
            break;
        case "detail":
                $courses_detail = ctrl_detail_courses();
                include_once 'views/admin/'.$module.'/detail.php';
            break;
        case "destroy":
                ctrl_destroy_courses();
            break;
        default:
                $courses_read = ctrl_read_courses();
                include_once 'views/admin/'.$module.'/read.php';
            break;
    }
?>
<link rel="stylesheet" href="<?= $host ?>/assets/css/items/courses.css">
<script src="<?= $host ?>/assets/js/items/courses.js"></script>