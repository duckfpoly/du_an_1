<?php 
    function courses_create($name_course,$price_course,$image_course,$status_course,$description_course,$quote,$create_at,$id_category){
        $sql = "INSERT INTO `courses` SET 
                    `name_course`           =   ?,
                    `price_course`          =   ?,
                    `image_course`          =   ?,
                    `status_course`         =   ?,
                    `description_course`    =   ?,
                    `quote`                 =   ?,
                    `created_at`            =   ?,
                    `id_category`            =   ?
        ";
        $create_courses = (new process())->query_sql($sql,$name_course,$price_course,$image_course,$status_course,$description_course,$quote,$create_at,$id_category);
        return $create_courses;
    }
    function courses_read(){
        $sql = "SELECT * FROM `courses`";
        $read = (new process())->query($sql);
        return $read;
    }
    function courses_update($name_course,$price_course,$image_course,$status_course,$description_course,$quote,$create_at,$updated_at,$id_category,$id){
        $sql = "UPDATE `courses` SET 
                    `name_course`           =   ?,
                    `price_course`          =   ?,
                    `image_course`          =   ?,
                    `status_course`         =   ?,
                    `description_course`    =   ?,
                    `quote`                 =   ?,
                    `created_at`            =   ?,
                    `updated_at`            =   ?,
                    `id_category`           =   ?
                WHERE id = ?
        ";
        $update_course = (new process())->query_sql($sql,$name_course,$price_course,$image_course,$status_course,$description_course,$quote,$create_at,$updated_at,$id_category,$id);
        return $update_course;
    }
    function course_delete($id){
        $sql = "DELETE FROM courses WHERE id = ?";
        (new process())->query_sql($sql,$id);
    }
    function course_detail($id){
        $sql = "SELECT * FROM courses 
        INNER JOIN categories ON courses.id_category = categories.id
        WHERE courses.id = ?";
        $detail_course = (new process())->query_one($sql,$id);
        return $detail_course;
    }
    function check_name_course($name_course){
        $sql = "SELECT * FROM `courses` WHERE name_course = ?";
        $check_name_course = $this->query_one($sql, $name_course);
        if($check_name_course > 0) { $alert = "Tên khóa học đã được sử dụng !"; return $alert; }
    }
?>