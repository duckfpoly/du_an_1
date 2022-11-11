<?php
    $categories = get_all_categories();
    $data_cate = pagination_normal('courses',1);// get_all_course
    // [0] data in ra màn hình
    // [1] page hiện tại
    // [2] tổng số page
    $lessions = $data_cate[0];
    if(!isset($_GET['id'])){
        include 'views/site/lessons/lessons.php';
    }
        include 'views/site/lessons/course.php';


?>