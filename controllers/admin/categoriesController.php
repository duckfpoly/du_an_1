<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case "create":
                include_once $direct_act;
                break;
            case "store":
                $name_category = $_POST['name_category'];
                check_empty($name_category,CATEGORIES."/create");
                check_data(check_name_category($name_category),CATEGORIES."/create");
                category_create($name_category);
                location(CATEGORIES);
                break;
            case "update":
                $id = $_GET['id'];
                $id == 1 && alert('Không thể cập nhật danh mục này !',CATEGORIES);
                check_empty($id,CATEGORIES);
                $update_category = category_detail($id);
                include_once $direct_act;   
                break;
            case "edit":
                $id = $_GET['id'];
                check_empty($id,CATEGORIES);
                $name_category = $_POST['name_category'];
                $status = $_POST['status'];
                $category_detail = category_detail($id);
                compare_data($name_category,$category_detail['name_category'],check_name_category($name_category),CATEGORIES.'/update/'.$id);
                category_update($name_category,$status,$id);
                $status = 1 && update_category_course($id);
                location(CATEGORIES);
                break;
            case "destroy":
                $id = $_POST['id_cate'];
                check_empty($id,CATEGORIES);
                category_delete($id);
                location(CATEGORIES);
                break;
            default:
                location(BASE_URL."page_not_found");
                break;
        }
    }else {
        if(isset($_GET['s'])){
            if(empty($_GET['s'])){
                location(CATEGORIES);
            }else {
                $data_cate = pagination_search('categories','name_category',$_GET['s'],5); 
                $read_category = $data_cate[0];
            }
        }else {
            $data_cate = pagination_normal('categories',5);
            $read_category = $data_cate[0];
        }
        include_once $direct_read;
        
    }
?>



