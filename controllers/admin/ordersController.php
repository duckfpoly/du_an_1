<?php
if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        case "detail":
            $id = $_GET['id'];
            check_empty($id,ORDERS);
            $detail = orders_detail($id);
            $course = course_detail($detail['id_course']);
            include_once $direct_act;
            break;
        case "edit":
            $id     = $_POST['id'];
            $status = $_POST['status'];
            update_orders($status,$id);
        case "destroy":
            $id = $_POST['id_order'];
            check_empty($id,ORDERS);
            order_delete($id);
            alert('Xóa thành công !',ORDERS);
            break;
        default:
            location(BASE_URL."page_not_found");
            break;
    }
}else {
    if(isset($_GET['s'])){
        if(empty($_GET['s'])){
            location(ORDERS);
        }else {
            $read_order = orders_search($_GET['s']);
        }
    }
    elseif(isset($_GET['status'])){
        if($_GET['status'] == ''){
            location(ORDERS);
        }else {
            $read_order = order_filter($_GET['status']);
        }
    }
    else {
        $read_order = order_read();
    }
    include_once $direct_read;
}
?>



