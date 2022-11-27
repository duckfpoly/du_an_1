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

    function teacher_course_search($key,$id){
        $sql = "SELECT 
                categories.name_category,
                courses.*,
                teachers.name_teacher
                FROM courses 
                INNER JOIN categories ON courses.id_category = categories.id
                INNER JOIN teachers ON courses.id_teacher = teachers.id
                WHERE name_course LIKE '%$key%'
                AND teachers.id = ?
                ";
        return query($sql,$id);
    }

    function teacher_class_search($key,$id){
        $sql = "SELECT * FROM courses 
                    INNER JOIN teachers ON courses.id_teacher = teachers.id
                    INNER JOIN classes ON courses.id = classes.id_course
                    WHERE classes.name_class LIKE '%$key%'
                    AND teachers.id = ?
                    ORDER BY classes.id DESC 
            ";
        return query($sql,$id);
    }


