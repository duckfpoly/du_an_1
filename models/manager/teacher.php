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
             WHERE classes.id_teacher = ?";
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

    function count_std_class_teacher($id_class,$id_teacher){
        $sql = "SELECT COUNT(detail_classes.id_students) AS total FROM detail_classes
                        INNER JOIN classes ON detail_classes.id_class = classes.id
                        WHERE classes.id = ? AND classes.id_teacher = ?
                ";
        return query_value($sql,$id_class,$id_teacher);
    }

