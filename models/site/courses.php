<?php
    function get_new_courses(){
        $sql = "SELECT 
                courses.*,
                categories.name_category
         FROM courses
         INNER JOIN categories ON courses.id_category = categories.id
         ORDER BY courses.price_course DESC LIMIT 5";
        return query($sql);
    }

    function get_all_courses(){
        $sql = "SELECT * FROM courses";
        return query($sql);
    }

    function get_course($id){
        $sql = "SELECT 
            courses.* ,
            categories.name_category,
            categories.id id_cate
        FROM courses 
        INNER JOIN categories ON courses.id_category = categories.id 
        WHERE courses.id = ?";
        return query_one($sql,$id);
    }

    function detail_mycourse($id_user,$id_course){
        $sql = "SELECT * FROM tbl_orders INNER JOIN classes ON tbl_orders.id_class = classes.id INNER
        JOIN students ON tbl_orders.id_students = students.id 
        INNER JOIN courses ON courses.id = classes.id_course INNER JOIN teachers ON 
        teachers.id = classes.id_teacher
        WHERE tbl_orders.id_students = '$id_user' AND 
        classes.id_course = '$id_course'";
        return query_one($sql);
    }

    function get_classes($id){
        $sql = "
            SELECT
            classes.*,
            teachers.name_teacher,
            courses.name_course,
            courses.image_course,
            courses.price_course,
            courses.discount
            FROM classes 
            INNER JOIN courses ON courses.id = classes.id_course 
            INNER JOIN teachers ON teachers.id = classes.id_teacher        
            WHERE classes.id = ?
        ";
        return query_one($sql,$id);
    }

    function filter_cate($id){
        $sql = "SELECT * FROM courses WHERE id_category = $id";
        return query($sql);
    }

    function find_product($input, $id){
        if(isset($id)){
            $sql = "SELECT * FROM courses WHERE name_course like '%$input%'";

        }else{
            $sql = "SELECT * FROM courses WHERE name_course like '%$input%' AND id_category = '$id'";

        }
        return query($sql);
    }

    function get_my_courses($id){
        $sql = "SELECT *, courses.id AS id_course FROM tbl_orders INNER JOIN classes ON 
        tbl_orders.id_class = classes.id INNER JOIN courses ON classes.id_course = courses.id
        INNER JOIN teachers ON teachers.id = classes.id_teacher
        WHERE tbl_orders.id_students = '$id' and tbl_orders.status = 2
        ";
        return query($sql);
    }

    function get_rate_course($id){
        $sql = "SELECT * FROM rate_courses 
                INNER JOIN students ON rate_courses.id_student  = students.id
                INNER JOIN courses  ON rate_courses.id_course   = courses.id
                WHERE rate_courses.id_course = ?
                AND rate_courses.status = 0
                ORDER BY rate_courses.id DESC 
        ";
        return query($sql,$id);
    }

    function add_rate_course($rate,$content_rate,$id_course,$id_student){
        $sql = "INSERT INTO rate_courses SET 
                `rate`          = ?,
                `content_rate`  = ?,
                `id_course`     = ?,
                `id_student`    = ?
        ";
        query_sql($sql,$rate,$content_rate,$id_course,$id_student);
    }

    function get_lesson_course($id){
        $sql = "SELECT * FROM lesson_courses WHERE lesson_courses.id_course = ? ";
        return query($sql,$id);
    }

    function get_detail_lesson_course($id){
        $sql = "SELECT * FROM detail_lesson WHERE detail_lesson.id_lesson  = ?";
        return query($sql,$id);
    }

    function get_avg_rate_course($id){
        $sql = "SELECT AVG(rate) FROM rate_courses WHERE rate_courses.id_course  = ? AND rate_courses.status = 0 ";
        return query_value($sql,$id);
    }

    function get_count_rate_course($id){
        $sql = "SELECT COUNT(rate) FROM rate_courses WHERE rate_courses.id_course  = ? AND rate_courses.status  = 0";
        return query_value($sql,$id);
    }

    function get_count_rate($id,$rate){
        $sql = "SELECT COUNT(rate) AS count_rate
                FROM rate_courses
                WHERE id_course = ? AND rate = ?
                GROUP BY rate
                ";
        return query_one($sql,$id,$rate);
    }

    function get_class_by_course($id_course){
        $sql = "
            SELECT classes.*, teachers.name_teacher 
            FROM classes 
            INNER JOIN teachers ON classes.id_teacher  = teachers.id
            WHERE classes.id_course = ? 
            AND classes.status_class = 0
            AND teachers.status_teacher = 0
        ";
        return query($sql,$id_course);
    }

    function get_class_by_course_with_user($id_course,$id_std){
        $sql = "SELECT 
            classes.*, 
            teachers.name_teacher 
            FROM classes
            INNER JOIN tbl_orders ON classes.id = tbl_orders.id_class
            INNER JOIN teachers ON classes.id_teacher  = teachers.id
            WHERE classes.id_course = ? 
            AND tbl_orders.id_students != $id_std
        ";
        return query_one($sql,$id_course);
    }

    function count_std_coursee($id_course){
        $sql = "SELECT COUNT(detail_classes.id_students) AS total FROM detail_classes
                INNER JOIN classes ON detail_classes.id_class = classes.id
                WHERE classes.id_course = ?
        ";
        return query_value($sql,$id_course);
    }

    function count_std_class($id_class){
        $sql = "SELECT COUNT(detail_classes.id_students) AS total FROM detail_classes WHERE detail_classes.id_class = ?";
        return query_value($sql,$id_class);
    }

    function course_same_cate($id_cate,$id_course){
        $sql = "SELECT * FROM courses
                WHERE id_category = ? 
                AND id != $id_course
            ";
        return query($sql,$id_cate);
    }

    function get_courses(){
        $sql = "SELECT * FROM courses WHERE status_course =0";
        return query($sql);
    }

    function check_status_courses($id){
        $sql = "SELECT * FROM `courses` WHERE id = ? AND status_course = 1";
        $check_ID = query_one($sql, $id);
        if(isset($check_ID['id'])) {
            return "Khóa học không tồn tại !";
        }
    }

?>