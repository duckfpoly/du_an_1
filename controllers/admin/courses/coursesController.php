<?php 
    function ctrl_create_courses(){
        return category_read();
    }
    function ctrl_store_courses($name_course,$price_course,$description_course,$quote,$image_course,$id_category) {
        $status_course          = '1';
        $created_at             = date("Y-m-d H:i:s");
        courses_create($name_course,$price_course,$image_course,$status_course,$description_course,$quote,$created_at,$id_category);
        location(COURSES);

    }
    function ctrl_read_courses(){
        return courses_read();
    }
    function ctrl_update_courses(){
        $id = $_GET['id'];
        $courses_update = course_detail($id);
        $category_read  = category_read();
        return [$courses_update,$category_read];
    }
    function ctrl_edit_courses($status_course,$name_course,$price_course,$image_course,$description_course,$quote,$created_at,$id_category ){
        $id = $_GET['id'];
        $updated_at             = date("Y-m-d H:i:s");
        courses_update($name_course,$price_course,$image_course,$status_course,$description_course,$quote,$created_at,$updated_at,$id_category,$id);
        location(COURSES);
    }
    function ctrl_destroy_courses(){
        $id = $_GET['id'];
        $courses_delete = course_delete($id);
        location(COURSES);
    }
    function ctrl_detail_courses(){
        $id = $_GET['id'];
        return course_detail($id);
    }
    function ctrl_search_courses($data){
        return course_search($data);
    }
?>