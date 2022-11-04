<?php 
    function ctrl_create_courses(){

    }
    function ctrl_store_courses($name_course,$price_course,$description_course,$quote,$image_course) { 
        $star_course            = '0';
        $rate_course            = '0';
        $status_course          = '1';
        $created_at             = date("Y-m-d H:i:s");
        courses_create($name_course,$price_course,$image_course,$star_course,$rate_course,$status_course,$description_course,$quote,$created_at);
        location(COURSES);
    }
    function ctrl_read_courses(){
        $courses_read = courses_read();
        return $courses_read;
    }
    function ctrl_update_courses(){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $courses_update = course_detail($id);
        return $courses_update;
    }
    function ctrl_edit_courses($status_course,$name_course,$price_course,$image_course,$star_course,$rate_course,$description_course,$quote,$created_at ){
        $id                     = isset($_GET['id']) ? $_GET['id'] : "";
        $updated_at             = date("Y-m-d H:i:s");
        courses_update($name_course,$price_course,$image_course,$star_course,$rate_course,$status_course,$description_course,$quote,$created_at,$updated_at,$id);
        location(COURSES);
    }
    function ctrl_destroy_courses(){
        $id             = isset($_GET['id']) ? $_GET['id'] : "";
        $courses_delete = course_delete($id);
        location(COURSES);
    }
    function ctrl_detail_courses(){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $courses_detail = course_detail($id);
        return $courses_detail;
    }
    
?>