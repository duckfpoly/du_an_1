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
        INNER JOIN teachers ON courses.id_teacher = teachers.id WHERE courses.id = ?";
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

?>