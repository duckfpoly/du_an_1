<?php 
    function courses_create($name_course,$price_course,$image_course,$star_course,$rate_course,$status_course,$description_course,$quote,$create_at){
        $sql = "INSERT INTO `courses` SET 
                    `name_course`           =   ?,
                    `price_course`          =   ?,
                    `image_course`          =   ?,
                    `star_course`           =   ?,
                    `rate_course`           =   ?,
                    `status_course`         =   ?,
                    `description_course`    =   ?,
                    `quote`                 =   ?,
                    `created_at`            =   ?
        ";
        $create_courses = (new process())->query_sql($sql,$name_course,$price_course,$image_course,$star_course,$rate_course,$status_course,$description_course,$quote,$create_at);
        return $create_courses;
    }
    function courses_read(){
        $sql = "Select * from courses";
        $read = (new process())->query($sql);
        return $read;
    }
    function courses_update($name_course,$price_course,$image_course,$star_course,$rate_course,$status_course,$description_course,$quote,$create_at,$updated_at,$id){
        $sql = "UPDATE `courses` SET 
                    `name_course`           =   ?,
                    `price_course`          =   ?,
                    `image_course`          =   ?,
                    `star_course`           =   ?,
                    `rate_course`           =   ?,
                    `status_course`         =   ?,
                    `description_course`    =   ?,
                    `quote`                 =   ?,
                    `created_at`            =   ?,
                    `updated_at`            =   ?
                WHERE id = ?
        ";
        $update_course = (new process())->query_sql($sql,$name_course,$price_course,$image_course,$star_course,$rate_course,$status_course,$description_course,$quote,$create_at,$updated_at,$id);
        return $update_course;
    }
    function course_delete($id){
        $sql = "Delete from courses where id = ?";
        (new process())->query_sql($sql,$id);
    }
    function course_detail($id){
        $sql = "Select * from courses where id = ?";
        $detail_course = (new process())->query_one($sql,$id);
        return $detail_course;
    }
?>