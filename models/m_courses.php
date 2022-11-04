<?php 
    function check_name_course($name_course){
        $sql = "SELECT * FROM `courses` WHERE name_course = ?";
        $check_name_course = $this->query_one($sql, $name_course);
        if($check_name_course > 0) { $alert = "Tên khóa học đã được sử dụng !"; return $alert; }
    }
    function check_id_course($id){
        $sql = "SELECT * FROM `courses` WHERE id = ?";
        $check_ID = (new process())->query_one($sql, $id);
        if(!isset($check_ID['id'])) {
            return "Khóa học không tồn tại !";
        }
    }
    function courses_create($name_course,$price_course,$image_course,$status_course,$description_course,$quote,$create_at,$id_category){
        if(check_name_category($name_category) > 0 ){
            return "Tên khóa học đã được sử dụng!";
        }else {
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
            (new process())->query_sql($sql,$name_course,$price_course,$image_course,$status_course,$description_course,$quote,$create_at,$id_category);
        }
    }
    function courses_read(){
        $sql = "SELECT * FROM `courses`";
        return (new process())->query($sql);
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
        (new process())->query_sql($sql,$name_course,$price_course,$image_course,$status_course,$description_course,$quote,$create_at,$updated_at,$id_category,$id);
    }
    function course_delete($id){
        $sql = "DELETE FROM courses WHERE id = ?";
        (new process())->query_sql($sql,$id);
    }
    function course_detail($id){
        $sql = "SELECT 
                categories.id id_cate,
                categories.name_category,
                courses.* 
                FROM courses 
                INNER JOIN categories ON courses.id_category = categories.id
                WHERE courses.id = ?";
        return (new process())->query_one($sql,$id);
    }
    
?>