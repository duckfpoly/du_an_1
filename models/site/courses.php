<?php
    function get_new_courses(){
        $sql = "SELECT 
                courses.*,
                categories.name_category,
                teachers.name_teacher
         FROM courses
         INNER JOIN categories ON courses.id_category = categories.id
         INNER JOIN teachers ON courses.id_teacher = teachers.id
         ORDER BY courses.id DESC LIMIT 5";
        return query($sql);
    }
    function get_all_courses(){
        $sql = "SELECT * FROM courses";
        return query($sql);
    }
    function get_course($id){
        $sql = "SELECT * FROM courses 
        INNER JOIN teachers ON courses.id_teacher = teachers.id 
        INNER JOIN categories ON courses.id_category = categories.id 
        WHERE courses.id = ?";
        return query_one($sql,$id);
    }

    function get_classes($id){
        $sql = "SELECT * FROM classes WHERE id = ?";
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
        INNER JOIN teachers ON teachers.id = courses.id_teacher
        WHERE tbl_orders.id_students = '$id'
        ";
        return query($sql);
    }

    function get_rate_course($id){
        $sql = "SELECT * FROM rate_courses 
                INNER JOIN students ON rate_courses.id_student  = students.id
                INNER JOIN courses  ON rate_courses.id_course   = courses.id
                WHERE rate_courses.id_course = ?
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
        $sql = "SELECT AVG(rate) FROM rate_courses WHERE rate_courses.id_course  = ?";
        return query_value($sql,$id);
    }

    function get_count_rate_course($id){
        $sql = "SELECT COUNT(rate) FROM rate_courses WHERE rate_courses.id_course  = ?";
        return query_value($sql,$id);
    }

    function get_count_rate($id,$rate){
        $sql = "SELECT COUNT(rate) AS count_rate
                FROM rate_courses
                WHERE id_course  = ? AND rate = ?
                GROUP BY rate
                ";
        return query_one($sql,$id,$rate);
    }

    function get_class_by_course($id_course){
        $sql = "SELECT * FROM classes WHERE id_course = ?";
        return query_one($sql,$id_course);
    }

    function count_std_coursee($id_course){
        $sql = "SELECT COUNT(detail_classes.id_students) AS total FROM detail_classes
                INNER JOIN classes ON detail_classes.id_class = classes.id
                WHERE classes.id_course = ?
        ";
        return query_value($sql,$id_course);
    }
?>