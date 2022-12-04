<?php
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
                        WHERE classes.id = ? AND classes.id_teacher = ?";
        return query_value($sql,$id_class,$id_teacher);
    }
    function teacher_get_class_archive($id_teacher){
        $sql = "SELECT classes_archive.*, courses.name_course FROM classes_archive, courses
             WHERE classes_archive.id_teacher = ? AND classes_archive.id_course = courses.id";
        return query($sql,$id_teacher);
    }
    function count_std_class_archive_teacher($id_class,$id_teacher){
        $sql = "SELECT COUNT(detail_class_archive.id_students) AS total FROM detail_class_archive,classes_archive
                WHERE detail_class_archive.id_class = ? AND classes_archive.id_teacher = ?";
        return query_value($sql,$id_class,$id_teacher);
    }


    function read_students_class_archive($id_class){
        $sql ="SELECT * FROM detail_class_archive 
             INNER JOIN students ON detail_class_archive.id_students = students.id
             WHERE detail_class_archive.id_class = ? ";
        return query($sql,$id_class);
    }


    function classarchive_detail($id){
        $sql = "SELECT *
            FROM classes_archive 
            INNER JOIN teachers ON classes_archive.id_teacher = teachers.id
            INNER JOIN courses ON courses.id = classes_archive.id_course
            WHERE classes_archive.id = ?
         ";
        return query_one($sql,$id);
    }

?>
