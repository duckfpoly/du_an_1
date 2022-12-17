<?php
    function check_id_class($id){
        $sql = "SELECT * FROM `classes` WHERE id = ?";
        $check_ID = query_one($sql, $id);
        if(!isset($check_ID['id'])) {
            return "Lớp học không tồn tại !";
        }
    }

    function check_time_class(){
        $sql = "SELECT * FROM classes";
        $check = query($sql);
        foreach ($check as $key => $values){
            $time_end       =   strtotime ($values['time_end']);
            $time_now       =   strtotime(date("Y-m-d"));
            $time_archive   =   date("Y-m-d H:i:s");
            if($time_end < $time_now){
                $sql = "SELECT * FROM detail_classes WHERE id_class = ?";
                $detail_class = query($sql,$values['id']);
                foreach ($detail_class as $key => $items){
                    $archive_detail = "INSERT INTO `detail_class_archive`(`id_class`, `id_students`) VALUES (?,?)";
                    query_sql($archive_detail,$items['id_class'],$items['id_students']);
                }
                $archive = "INSERT INTO `classes_archive`(`name_class`,`id_course`,`id_teacher`,`slot`,`time_learn`,`time_start`,`time_end`,`time_archive`) 
                        VALUES (?,?,?,?,?,?,?,?)";
                query_sql($archive,$values['name_class'],$values['id_course'],$values['id_teacher'],$values['slot'],$values['time_learn'], $values['time_start'],$values['time_end'],$time_archive);
                $delete_detail = "DELETE FROM detail_classes WHERE id_class = ?";
                query_sql($delete_detail,$values['id']);
                $delete = "DELETE FROM classes WHERE id = ?";
                query_sql($delete,$values['id']);
            }
        }
    }

    function class_create($name_class,$id_course,$id_teacher,$time_learn,$time_start,$time_end){
        $sql = "INSERT INTO `classes` SET 
                `name_class`    =   ?,
                `id_course`     =   ?,
                `id_teacher`    =   ?,
                `time_learn`    =   ?,
                `time_start`    =   ?,
                `time_end`      =   ?
        ";
        query_sql($sql,$name_class,$id_course,$id_teacher,$time_learn,$time_start,$time_end);
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

    function add_student_to_class($id_student,$id_class){
        $sql = "INSERT INTO detail_classes SET 
                id_students = ?, 
                id_class    = ?
       ";
        return query_sql($sql,$id_student,$id_class);
    }

    function class_search($key){
        $sql = "
                SELECT 
                     classes.*,
                    courses.name_course,
                    teachers.name_teacher
                    FROM classes 
                    INNER JOIN teachers ON classes.id_teacher = teachers.id
                    INNER JOIN courses ON classes.id_course = courses.id
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
        ";
        return query($sql,$id_class,$date,$time);
    }

    function count_slot_class($id_class){
        $sql = "SELECT COUNT(*) FROM detail_classes 
                WHERE detail_classes.id_class = ?
        ";
        return query_value($sql,$id_class);
    }

    function check_std_class($id_class,$id_students){
        $sql = "SELECT * FROM `detail_classes` 
                WHERE id_class = ?
                AND id_students = ?
        ";
        $check_std = query_one($sql,$id_class,$id_students);
        if($check_std > 0) {
            return "Học viên đã có trong lớp học !";
        }
    }

    function check_std_course($id_course,$id_students){
        $sql = "SELECT 
                *
            FROM `classes` 
            INNER JOIN detail_classes ON detail_classes.id_class = classes.id
            WHERE classes.id_course = ?
            AND detail_classes.id_students = ?
        ";
        $check_std = query_one($sql,$id_course,$id_students);
        if($check_std > 0) {
            return "Bạn đã đăng ký khóa học này rồi !";
        }
    }

    function my_class($id_student){
        $sql = "SELECT * FROM tbl_orders WHERE id_students = ? AND status = 2";
        $order = query($sql,$id_student);
        foreach ($order as $items){
            if($items['status'] == 2){
                $sql = "SELECT * FROM classes 
                INNER JOIN detail_classes ON classes.id = detail_classes.id_class
                WHERE classes.status_class = 0 AND detail_classes.id_students = ?";
                return query($sql,$id_student);
            }
        }
    }

?>
