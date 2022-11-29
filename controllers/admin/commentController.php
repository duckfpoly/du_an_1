<?php 
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case "create":
                include_once $direct_act;
                break;

            case "destroy":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,RATES);
                // Khi pass qua validate => gọi model thực hiện delete
                student_delete($id);
                // delete hoàn thành, điều hướng về trang danh sách
                location(RATES);
                break;
            case "detail":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,RATES);
                // Nếu tồn tại thì gọi model chi tiết để lấy thông tin và trả về giao diện chi tiết
                $student_detail = student_detail($id);
                include_once $direct_act;
                break;
            default:
                location(BASE_URL."page_not_found");
                break;
        }
    }else {
        if(isset($_GET['s'])){
            check_empty($_GET['s'],RATES);
            $read_student   = student_search($_GET['s']);
        }else {
            $read_student   = student_read();
        }
        include_once $direct_read;
    }
?>