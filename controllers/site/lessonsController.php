<?php
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $categories = get_all_categories();
    $data_cate = pagination_normal('courses',1);
    // [0] data in ra màn hình
    // [1] page hiện tại
    // [2] tổng số page
    $lessions = $data_cate[0];
    if($id){

    }else{
        include 'views/site/lession.php';
    }
?>