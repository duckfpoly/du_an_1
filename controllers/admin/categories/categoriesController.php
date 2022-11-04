<?php 
    function ctrl_create_category(){

    }
    function ctrl_store_category($name_category) { 
        category_create($name_category);
        location(CATEGORIES);
    }
    function ctrl_read_category(){
        return category_read();
    }
    function ctrl_update_category(){
        $id = $_GET['id'];
        check_id($id);
        return category_detail($id);
    }
    function ctrl_edit_category($name_category){
        $id = $_GET['id'];
        check_id($id);
        category_update($name_category,$id);
        location(CATEGORIES);
    }
    function ctrl_destroy_category(){
        $id = $_GET['id'];
        check_id($id);
        category_delete($id);
        location(CATEGORIES);
    }
    function ctrl_detail_category(){
        $id = $_GET['id'];
        check_id($id);
        return category_detail($id);
    }
?>