<?php
    function update_user($name_user,$avatar, $id){
        if($avatar){
            $sql = "UPDATE students SET name_student = '$name_user', image_student = '$avatar' WHERE id ='$id' ";
        }else{
            $sql = "UPDATE students SET name_student = '$name_user' WHERE id ='$id' ";
        }
        query_sql($sql);
    }
    function get_user($id){
        $sql = "SELECT * FROM students WHERE id = '$id' ";
        return query_one($sql);
    }
?>