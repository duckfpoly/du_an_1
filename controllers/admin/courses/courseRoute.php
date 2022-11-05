<?php 
    $act    = isset($_GET['act'])       ? $_GET['act']      : "";
    switch ($act) {
        case "create":
            if(count_category() == 0){
                alert("Chưa có danh mục. Không thể tạo khóa học!");
                location(COURSES);
            }else {
                $category_read = ctrl_create_courses();
                include_once 'views/admin/'.$module.'/create.php';
            }
            break;
        case "store":
                $name_course            = $_POST['name_course'];
                $price_course           = $_POST['price_course'];
                $description_course     = $_POST['description_course'];
                $quote                  = $_POST['quote'];
                $id_category            = $_POST['id_category'];
                $image_course           = $_FILES['image_course']['name'];
                save_file('image_course', 'courses');
                ctrl_store_courses($name_course,$price_course,$description_course,$quote,$image_course,$id_category );
            break;
        case "update":
                $courses_update = ctrl_update_courses()[0];
                $category_read  = ctrl_update_courses()[1];
                include_once 'views/admin/'.$module.'/update.php';
            break;
        case "edit":
            alert("Chưa có danh mục. Không thể tạo khóa học!");

            $status_course          = $_POST['status_course'];
                $name_course            = $_POST['name_course'];
                $price_course           = $_POST['price_course'];
                $image_goc              = $_POST['old_image_course'];
                $image_up               = $_FILES['image_course']['name'];
                if ($image_up == '') {
                    $image_course = $image_goc;
                } else {
                    $image_course = $image_up;
                    save_file('image_course', 'courses');
                }
                $description_course     = $_POST['description_course'];
                $quote                  = $_POST['quote'];
                $created_at             = $_POST['created_at'];
                $id_category            = $_POST['id_category'];
                ctrl_edit_courses($status_course,$name_course,$price_course,$image_course,$description_course,$quote,$created_at,$id_category);
            break;
        case "detail":
                $courses_detail = ctrl_detail_courses();
                include_once 'views/admin/'.$module.'/detail.php';
            break;
        case "destroy":
                ctrl_destroy_courses();
            break;
        default:
                if(isset($_GET['s'])){
                    $courses_read   = ctrl_search_courses($_GET['s']);
                }else {
                    $courses_read   = ctrl_read_courses();
                }
                include_once 'views/admin/'.$module.'/read.php';
            break;
    }
?>
<link rel="stylesheet" href="<?= $host ?>/assets/css/items/courses.css">
<!-- <script src="<?= $host ?>/assets/js/items/courses.js"></script> -->