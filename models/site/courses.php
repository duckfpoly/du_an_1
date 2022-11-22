<?php
    function get_new_courses(){
        $sql = "SELECT * FROM courses ORDER BY id DESC LIMIT 5";
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

?>