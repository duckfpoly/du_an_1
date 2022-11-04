<?php 
    function ctrl_create_courses(){
        $category_read  = category_read();
        return $category_read;
    }
    function ctrl_store_courses($name_course,$price_course,$description_course,$quote,$image_course,$id_category) { 
        $status_course          = '1';
        $created_at             = date("Y-m-d H:i:s");
        courses_create($name_course,$price_course,$image_course,$status_course,$description_course,$quote,$created_at,$id_category);
        location(COURSES);
    }
    function ctrl_read_courses(){
        $courses_read   = courses_read();
        return $courses_read;
    }
    function ctrl_update_courses(){
        $id = $_GET['id'];
        check_id($id);
        $courses_update = course_detail($id);
        $category_read  = category_read();
        $array_data = [$courses_update,$category_read];
        return $array_data;
    }
    function ctrl_edit_courses($status_course,$name_course,$price_course,$image_course,$description_course,$quote,$created_at,$id_category ){
        $id = $_GET['id'];
        check_id($id);
        $updated_at             = date("Y-m-d H:i:s");
        courses_update($name_course,$price_course,$image_course,$status_course,$description_course,$quote,$created_at,$updated_at,$id_category,$id);
        location(COURSES);
    }
    function ctrl_destroy_courses(){
        $id = $_GET['id'];
        check_id($id);
        $courses_delete = course_delete($id);
        location(COURSES);
    }
    function ctrl_detail_courses(){
        $id = $_GET['id'];
        check_id($id);
        $courses_detail = course_detail($id);
        return $courses_detail;
    }
?>