<?php
    if(isset($_GET['id'])){
        include 'views/site/lessons/course.php';
    }
    else {
        $categories = get_all_categories();
        $data_cate  = pagination_normal('courses',1);
        $lessions   = $data_cate[0];
        include 'views/site/lessons/lessons.php';
    }
?>