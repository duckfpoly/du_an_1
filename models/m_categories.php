<?php 
    function check_name_category($name_category){
        $sql = "SELECT * FROM `categories` WHERE name_category = ?";
        if((new process())->query_one($sql, $name_category) > 0 ){
            return "Tên danh mục đã được sử dụng!";
        }
    }
    function check_id_category($id){
        $sql = "SELECT * FROM `categories` WHERE id = ?";
        $check_ID = (new process())->query_one($sql, $id);
        if(!isset($check_ID['id'])) {
            return "Danh mục không tồn tại !";
        }
    }
    function category_create($name_category){
        $sql = "INSERT INTO `categories` SET `name_category` = ?";
        (new process())->query_sql($sql,$name_category);
    }
    function category_read(){
        $sql = "SELECT * FROM categories ORDER BY id DESC ";
        return (new process())->query($sql);
    }
    function category_update($name_category,$id){
        $sql = "UPDATE `categories` SET `name_category` = ? WHERE id = ?";
        (new process())->query_sql($sql,$name_category,$id);
    }
    function category_delete($id){
        $sql = "DELETE FROM categories WHERE id = ?";
        (new process())->query_sql($sql,$id);
    }
    function category_detail($id){
        $sql = "SELECT * FROM categories WHERE id = ?";
        return (new process())->query_one($sql,$id);
    }
    function count_category(){
        $sql = "SELECT COUNT(*) FROM categories";
        return (new process())->query_value($sql);
    }
    function category_search($key){
        $sql = "SELECT * FROM categories WHERE name_category LIKE '%$key%'";
        return (new process())->query($sql);
    }
?>