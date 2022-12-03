<?php
    function update_user($name_user,$avatar,$id,$phone,$updated){
        if($avatar){
            $sql = "UPDATE students SET name_student = '$name_user',
             image_student = '$avatar', updated_at = '$updated', phone_student = '$phone' 
             WHERE id ='$id' ";
        }else{
            $sql = "UPDATE students SET name_student = '$name_user', updated_at = '$updated', phone_student = '$phone' WHERE id ='$id' ";
        }
        query_sql($sql);
    }
    function get_user($id){
        $sql = "SELECT * FROM students WHERE id = '$id' ";
        return query_one($sql);
    }
    function change_pass($new_pass,$updated,$id){
        $sql = "UPDATE students SET password_student = '$new_pass', updated_at = '$updated' WHERE id ='$id' ";
        query_sql($sql);
    }
?>