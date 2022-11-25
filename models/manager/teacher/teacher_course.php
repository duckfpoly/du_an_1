<?php
    function get_course_teacher($id){
        $sql = "SELECT 
             courses.*,categories.name_category
             FROM courses 
             INNER JOIN categories ON courses.id_category = categories.id
             WHERE id_teacher = ?";
        return query($sql,$id);
    }

    function create_course(){

    }