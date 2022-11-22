<?php
    function read_comment(){
        $sql = "SELECT * FROM rate_courses";
        return query($sql);
    }
   
    function check_id_comment($id){
        $sql = "SELECT * FROM `rate_courses` WHERE id = ?";
        $check_ID = query_one($sql, $id);
        if(!isset($check_ID['id'])) {
            return 'Đánh giá không tồn tại !';
        }
    }
    function student_delete($id){
            $sql = "DELETE FROM rate_courses WHERE id = ?";
            query_sql($sql,$id);
        }
    function student_detail($id){
            $sql = "SELECT *  FROM rate_courses WHERE id = ?";
            return query_one($sql,$id);
        }
    function student_search($key){
            $sql = "SELECT * FROM rate_courses WHERE content_rate LIKE '%$key%'";
            return query($sql);
        }
    function count_student(){
        $sql = "SELECT COUNT(*) FROM rate_courses";
        return query_value($sql);
    }
?>