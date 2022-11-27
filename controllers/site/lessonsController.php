<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $check = check_id_course($id);
        if(isset($check)){
            alert('Khóa học không tồn tại',LESSONS);
        }
        $detail = get_course($id);
        // lấy các đánh giá về khóa học
        $rate_course = get_rate_course($id);
        // đánh giá sao trung bình
        if(empty(get_avg_rate_course($id))){
            $avg_rate = 0;
        }
        else {
            $avg_rate = get_avg_rate_course($id);
        }
        // số đánh giá
        $count_rate = get_count_rate_course($id);
        // lớp học theo khóa học
        $class = get_class_by_course($id);
        // tổng sinh viên thuộc khóa học
        $total_std_course  = count_std_coursee($id);
        // đánh giá khóa học
        if(isset($_POST['send_cmt'])){
            $rate           = $_POST['rate'];
            $content_rate   = $_POST['content_rate'];
            $id_course      = $id;
            $id_student     = $_POST['id_student'];
            $redirectt      = LESSONS.'/detail/'.$id;
            check_empty($rate           ,$redirectt);
            check_empty($content_rate   ,$redirectt);
            check_empty($id_student     ,$redirectt);
            add_rate_course($rate,$content_rate,$id_course,$id_student);
        }
        // nội dung chương trình khóa học
        $lesson_course = get_lesson_course($id);
        include 'views/site/lessons/course.php';
    }
    else {
        $categories = get_all_categories();
        $data_cate  = pagination_normal('courses',1);
        $lessions   = $data_cate[0];
        $data_cate = pagination_normal('courses',3);
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
            $lessions = find_product($input, $idCate);
        }
        include 'views/site/lessons/lessons.php';
    }
?>