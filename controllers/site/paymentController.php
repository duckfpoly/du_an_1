<?php
    if(empty($_POST['id_course'])){
        location($host);
    }else {
        $id         = $_POST['id_course'];
        $id_class   = $_POST['id_class'];
        $course     = get_course($id);
        $class      = get_classes($id_class);
        $day        = $_POST['check_day'];
        $time       = $_POST['check_time'];
        $order_code = time();
        include 'views/site/payment/payment.php';
    }
?>