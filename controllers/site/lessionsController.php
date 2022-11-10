<?php
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $lessions = get_all_courses();
    $categories = get_all_categories();
    if($id){

    }else{
        include 'views/site/lession.php';
    }
?>