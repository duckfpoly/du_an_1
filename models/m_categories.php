<?php 
    function category_create($name_category){
        $sql = "INSERT INTO `categories` SET `name_category` = ?";
        $create_categories = (new process())->query_sql($sql,$name_category);
        return $create_categories;
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
        $detail_category = (new process())->query_one($sql,$id);
        return $detail_category;
    }
?>