<?php
    function check_name_course($name_course,$id){
        $sql = " SELECT * FROM `courses` 
        INNER JOIN teachers ON courses.id_teacher = teachers.id
        WHERE name_course = ? AND teachers.id = ?";
        $check_name_course = query_one($sql, $name_course,$id);
        if($check_name_course > 0) {
            return "Tên khóa học đã được giảng viên sử dụng !";
        }
    }
    function check_id_course($id){
        $sql = "SELECT * FROM `courses` WHERE id = ?";
        $check_ID = query_one($sql, $id);
        if(!isset($check_ID['id'])) {
            return "Khóa học không tồn tại !";
        }
    }
    function courses_create($name_course,$price_course,$image_course,$description_course,$quote,$created_at,$id_category,$id_teacher){
        $sql = "INSERT INTO `courses` SET 
                        `name_course`           =   ?,
                        `price_course`          =   ?,
                        `image_course`          =   ?,
                        `description_course`    =   ?,
                        `quote`                 =   ?,
                        `created_at`            =   ?,
                        `id_category`           =   ?,
                        `id_teacher`             =   ?
            ";
        query_sql($sql,$name_course,$price_course,$image_course,$description_course,$quote,$created_at,$id_category,$id_teacher);
    }
    function courses_read(){
        $sql = "SELECT courses.*,teachers.name_teacher,categories.name_category
            FROM `courses`
            INNER JOIN teachers ON teachers.id = courses.id_teacher
            INNER JOIN categories ON courses.id_category = categories.id
        ";
        return query($sql);
    }
    function courses_update($name_course,$price_course,$image_course,$status_course,$description_course,$quote,$create_at,$updated_at,$id_category,$id_teacher,$id){
        $sql = "UPDATE `courses` SET 
                    `name_course`           =   ?,
                    `price_course`          =   ?,
                    `image_course`          =   ?,
                    `status_course`         =   ?,
                    `description_course`    =   ?,
                    `quote`                 =   ?,
                    `created_at`            =   ?,
                    `updated_at`            =   ?,
                    `id_category`           =   ?,
                    `id_teacher`            =   ?
                WHERE id = ?
        ";
        query_sql($sql,$name_course,$price_course,$image_course,$status_course,$description_course,$quote,$create_at,$updated_at,$id_category,$id_teacher,$id);
    }
    function course_delete($id){
        $sql = "DELETE FROM courses WHERE id = ?";
        query_sql($sql,$id);
    }
    function course_detail($id){
        $sql = "SELECT 
                categories.name_category,
                courses.*,
                teachers.name_teacher
                FROM courses 
                INNER JOIN categories ON courses.id_category = categories.id
                INNER JOIN teachers ON courses.id_teacher = teachers.id
                WHERE courses.id = ?";
        return query_one($sql,$id);
    }
    function course_search($key){
        $sql = "SELECT 
                categories.name_category,
                courses.*,
                teachers.name_teacher
                FROM courses 
                INNER JOIN categories ON courses.id_category = categories.id
                INNER JOIN teachers ON courses.id_teacher = teachers.id
                WHERE name_course LIKE '%$key%'";
        return query($sql);
    }
    function course_count(){
        $sql = "SELECT COUNT(*) FROM courses";
        return query_value($sql);
    }
    function count_course_with_cate($id){
        $sql = "
        SELECT COUNT(*) FROM courses 
        INNER JOIN categories ON categories.id = courses.id_category
        WHERE categories.id = ?
        ";
        return query_value($sql,$id);
    }
    function course_sale(){
        $sql = "SELECT 
                courses.id,
                courses.name_course,
                courses.image_course,
                courses.price_course,
                courses.discount,
                teachers.name_teacher
                FROM courses 
                INNER JOIN teachers ON courses.id_teacher = teachers.id
                WHERE courses.discount  !=  0";
        return query($sql);
    }
    function filter($prop, $ordinal){
        $sql = "SELECT * FROM `courses` ORDER BY $prop $ordinal";
        return query($sql);
    }
?>