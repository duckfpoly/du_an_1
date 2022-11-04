<?php 
    function ctrl_create_category(){

    }
    function ctrl_store_category($name_category) { 
        if(empty($name_category)){
            location(CATEGORIES);
        }
        else {
            $create = category_create($name_category);
            if(isset($create)){
                alert($create);
                location(CATEGORIES."/create");
            }else {
                location(CATEGORIES);
            }
        }
    }
    function ctrl_read_category(){
        return category_read();
    }
    function ctrl_update_category(){
        $id = $_GET['id'];
        if(empty($id)){
            location(CATEGORIES);
        }else {
            $update = check_id_category($id);
            if(isset($update)){
                alert($update);
                location(CATEGORIES);
            }
        }
        return category_detail($id);
    }
    function ctrl_edit_category($name_category){
        $id = $_GET['id'];
        category_update($name_category,$id);
        location(CATEGORIES);
    }
    function ctrl_destroy_category(){
        $id = $_GET['id'];
        if(empty($id)){
            location(CATEGORIES);
        }else {
            $delete = check_id_category($id);
            if(isset($delete)){
                alert($delete);
                location(CATEGORIES);
            }else {
                category_delete($id);
                location(CATEGORIES);
            }
        }
    }
?>