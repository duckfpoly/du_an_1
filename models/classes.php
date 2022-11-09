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
        $sql = "SELECT * FROM courses 
                INNER JOIN teachers ON courses.id_teacher = teachers.id
                INNER JOIN classes ON courses.id = classes.id_course
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
        $sql = "SELECT * FROM courses 
                    INNER JOIN teachers ON courses.id_teacher = teachers.id
                    INNER JOIN classes ON courses.id = classes.id_course
                    WHERE classes.id = ?
             ";
        return query_one($sql,$id);
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




?>
