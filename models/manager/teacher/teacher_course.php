<?php
    function get_course_teacher($id){
        $sql = "SELECT 
             courses.*,categories.name_category
             FROM courses 
             INNER JOIN categories ON courses.id_category = categories.id
             WHERE id_teacher = ?";
        return query($sql,$id);
    }

    function get_class_teacher($id){
        $sql = "SELECT 
             classes.*,
             courses.name_course
             FROM classes 
             INNER JOIN courses ON classes.id_course  = courses.id
             WHERE courses.id_teacher = ?";
        return query($sql,$id);
    }