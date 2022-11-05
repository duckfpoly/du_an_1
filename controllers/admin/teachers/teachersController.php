<?php 
    function ctrl_create_category(){

    }
    function ctrl_store_teacher($name_category) {
        if(empty($name_category)){
            location(CATEGORIES);
        }
        else {
            $create = teacher_create($name_category);
            if(isset($create)){
                alert($create);
                location(TEACHERS."/create");
            }else {
                location(TEACHERS);
            }
        }
    }
    function ctrl_read_teacher(){
        return teacher_read();
    }
    function ctrl_update_teacher(){
        $id = $_GET['id'];
        if(empty($id)){
            location(TEACHERS);
        }else {
            $update = check_id_teacher($id);
            if(isset($update)){
                alert($update);
                location(TEACHERS);
            }
        }
        $update_category = teacher_detail($id);
        return $update_category ;
    }
    function ctrl_edit_teacher($name_category){
        $id = $_GET['id'];
        category_update($name_category,$id);
        location(TEACHERS);
    }
    function ctrl_destroy_teacher(){
        $id = $_GET['id'];
        if(empty($id)){
            location(TEACHERS);
        }else {
            $delete = check_id_teacher($id);
            if(isset($delete)){
                alert($delete);
                location(TEACHERS);
            }else {
                category_delete($id);
                location(TEACHERS);
            }
        }
    }
?>