<?php 
    function check_name_category($name_category){
        $sql = "SELECT * FROM `categories` WHERE name_category = ?";
        $check_name_category = (new process())->query_one($sql, $name_category);
        return $check_name_category;
    }
    function check_id_category($id){
        $sql = "SELECT * FROM `categories` WHERE id = ?";
        $check_ID = (new process())->query_one($sql, $id);
        if(!isset($check_ID['id'])) {
            return "Danh mục không tồn tại !";
        }
    }
    function category_create($name_category){
        if(check_name_category($name_category) > 0 ){
            return "Tên danh mục đã được sử dụng!";
        }else {
            $sql = "INSERT INTO `categories` SET `name_category` = ?";
            $create_categories = (new process())->query_sql($sql,$name_category);
        }
    }
    function category_read(){
        $sql = "SELECT * FROM categories";
        $read_category = (new process())->query($sql);
        return $read_category;
    }
    function category_update($name_category,$id){
        $sql = "UPDATE `categories` SET `name_category` = ? WHERE id = ?";
        $update_category = (new process())->query_sql($sql,$name_category,$id);
        return $update_category;
    }
    function category_delete($id){
        $sql = "DELETE FROM categories WHERE id = ?";
        (new process())->query_sql($sql,$id);
    }
    function category_detail($id){
        $sql = "SELECT * FROM categories WHERE id = ?";
        (new process())->query_one($sql,$id);
    }
?>