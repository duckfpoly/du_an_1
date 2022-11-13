<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $detail = get_course($id);
        include 'views/site/lessons/course.php';
    }
    else {
        $categories = get_all_categories();
        $data_cate = pagination_normal('courses',6);
        $lessions = $data_cate[0];
        if(isset($_GET['cate'])){
            if($_GET['cate'] != "all"){
                $idCate = $_GET['cate'];
                $lessions = filter_cate($idCate);

            }else{
                $lessions = $data_cate[0];
            }
        }
        if(isset($_POST['search_btn'])){
            $input = $_POST['input_search'];
            $idCate = isset($_GET['cate']) && $_GET['cate'] !='all' ? $_GET['cate'] : "";
            
            $lessions =find_product($input, $idCate);
        }
        include 'views/site/lessons/lessons.php';
    }
?>