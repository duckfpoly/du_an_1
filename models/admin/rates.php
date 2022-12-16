 <?php 
    function get_all_cmt(){ 
        $sql = 'SELECT *, rate_courses.id as id_cmt 
        FROM rate_courses  
        INNER JOIN courses ON rate_courses.id_course = courses.id  
        INNER JOIN students ON rate_courses.id_student = students.id 
        '; 
        return query($sql); 
    } 
    function filter_course($id){ 
        if($id == 'all'){ 
            return get_all_cmt(); 
        }else{ 
            $sql = "SELECT *, rate_courses.id as id_cmt FROM rate_courses INNER JOIN courses ON rate_courses.id_course = courses.id 
            INNER JOIN students ON rate_courses.id_student = students.id 
            INNER JOIN teachers ON courses.id_teacher = teachers.id WHERE rate_courses.id_course = '$id'"; 
            return query($sql); 
        } 
    } 
    function delete_rate($id){
        $sql = "DELETE FROM `rate_courses` WHERE id = '$id'";
        query_sql($sql);
    }
    function countratecourse($id_course){
        $sql = "SELECT COUNT(*) FROM rate_courses WHERE id_course = ?";
        return query_value($sql,$id_course);
    }
    function update_status_rate($status,$id_rate){
        $sql = "UPDATE `rate_courses` SET `status`=  ? WHERE id = ?";
        query_sql($sql,$status,$id_rate);
    }


?>