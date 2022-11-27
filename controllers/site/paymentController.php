<?php
    if(empty($_POST['id_course'])){
        location(BASE_URL);
    }
    else {
        $id         = $_POST['id_course'];
        $id_class   = $_POST['id_class'];
        $course     = get_course($id);
        $class      = get_classes($id_class);
        $day        = $_POST['check_day'];
        $time       = $_POST['check_time'];
        $order_code = time();
        check_data(check_std_class($id_class,getSession('user')['id']),LESSONS.'/'.$id);
        if(count_slot_class($id_class,$day,$time) == slot_class($id_class)){
            show_error('Lớp đã đủ học viên !',LESSONS.'/'.$id);
        }
        include 'views/site/payment/payment.php';
    }
?>