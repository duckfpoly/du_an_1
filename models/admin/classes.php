<?php
    function check_id_class($id){
        $sql = "SELECT * FROM `classes` WHERE id = ?";
        $check_ID = query_one($sql, $id);
        if(!isset($check_ID['id'])) {
            return "Lớp học không tồn tại !";
        }
    }

    function check_name_class($name_class,$id){
        $sql = "SELECT * FROM `courses` 
            INNER JOIN teachers ON courses.id_teacher = teachers.id
            INNER JOIN classes ON courses.id = classes.id_course
            WHERE classes.name_class = ? AND teachers.id = ?";
            $check_name_class = query_one($sql,$name_class,$id);
            if($check_name_class > 0) {
                return "Tên lớp đã được giảng viên sử dụng !";
            }
    }

    function class_create($name_class,$id_course,$time_learn,$time_start,$time_end){
        $sql = "INSERT INTO `classes` SET 
                    `name_class`    =   ?,
                    `id_course`     =   ?,
                    `time_learn`    =   ?,
                    `time_start`    =   ?,
                    `time_end`      =   ?
        ";
        query_sql($sql,$name_class,$id_course,$time_learn,$time_start,$time_end);
    }

    function class_read(){
        $sql = "SELECT 
                classes.*,
                courses.name_course,
                teachers.name_teacher
                FROM classes 
                INNER JOIN teachers ON classes.id_teacher = teachers.id
                INNER JOIN courses ON classes.id_course = courses.id
                ORDER BY classes.id DESC 
         ";
        return query($sql);
    }

    function class_update($name_class,$id_course,$time_learn,$time_start,$time_end,$status_class,$id){
        $sql = "UPDATE `classes` SET 
                    `name_class`    =   ?,
                    `id_course`     =   ?,
                    `time_learn`    =   ?,
                    `time_start`    =   ?,
                    `time_end`      =   ?,
                    `status_class`  =   ?
                WHERE id = ?
                ";
        query_sql($sql,$name_class,$id_course,$time_learn,$time_start,$time_end,$status_class,$id);
    }

    function class_update_slot($slot,$id){
        query_sql("UPDATE `classes` SET `slot` = slot + 1 WHERE id = ? ",$slot,$id);
    }

    function class_delete($id){
        query_sql("DELETE FROM `classes` WHERE id = ? ",$id);
    }

    function class_detail($id){
        $sql = "SELECT *
                FROM classes 
                INNER JOIN teachers ON classes.id_teacher = teachers.id
                INNER JOIN courses ON courses.id = classes.id_course
                WHERE classes.id = ?
             ";
        return query_one($sql,$id);
    }

    function add_student_to_class($id_student,$day_sub,$time_sub,$id_class){
        $sql = "INSERT INTO detail_classes SET 
                id_students = ?, 
                date_sub    = ?, 
                time_sub    = ?, 
                id_class    = ?
       ";
        return query_sql($sql,$id_student,$day_sub,$time_sub,$id_class);
    }

    function class_search($key){
        $sql = "SELECT * FROM courses 
                INNER JOIN teachers ON courses.id_teacher = teachers.id
                INNER JOIN classes ON courses.id = classes.id_course
                WHERE classes.name_class LIKE '%$key%'
                ORDER BY classes.id DESC 
        ";
        return query($sql);
    }

    function count_slot($id){
        $sql = "SELECT COUNT(*) FROM detail_classes WHERE detail_classes.id_class = ? ";
        return query_value($sql,$id);
    }

    function slot_class($id){
        $sql = "SELECT slot FROM classes WHERE classes.id = ? ";
        return query_value($sql,$id);
    }

    function read_students_class($id_class){
        $sql ="SELECT * FROM detail_classes 
         INNER JOIN students ON detail_classes.id_students = students.id
         WHERE detail_classes.id_class = ? ";
        return query($sql,$id_class);
    }

    function delete_student_class($id_student,$id_class){
        $sql = "DELETE FROM detail_classes WHERE id_students = ? AND id_class = ?";
        query_sql($sql,$id_student,$id_class);
    }

    function check_course_class($id){
        $sql = "SELECT * FROM `classes` WHERE id_course = ?";
            $check_ID = query_one($sql, $id);
            if(isset($check_ID['id_course'])) {
                return "Lớp học sử dụng khóa học này đã tồn tại !";
            }
    }

    function read_std($id_class,$date,$time){
        $sql = "SELECT * FROM detail_classes 
            INNER JOIN students ON detail_classes.id_students = students.id
            WHERE detail_classes.id_class = ?
            AND detail_classes.date_sub = ?
            AND detail_classes.time_sub = ?
        ";
        return query($sql,$id_class,$date,$time);
    }

    function count_slot_class($id_class,$date,$time){
        $sql = "SELECT COUNT(*) FROM detail_classes 
                WHERE detail_classes.id_class = ?
                AND detail_classes.date_sub = ?
                AND detail_classes.time_sub = ?
        ";
        return query_value($sql,$id_class,$date,$time);
    }

    function check_std_class($id_class,$id_students){
        $sql = "SELECT * FROM `detail_classes` 
                WHERE detail_classes.id_class = ?
                AND detail_classes.id_students = ?
        ";
        $check_std = query_one($sql,$id_class,$id_students);
        if($check_std > 0) {
            return "Học viên đã có trong lớp học !";
        }
    }
?>
