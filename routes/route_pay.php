<?php
    if(isset($_POST['order_code'])){
        $order_code     = $_POST['order_code'];
        $order_date     = date("Y-m-d H:i:s");
        $order_pay      = $_POST['pay_option'];
        $id_student     = $_POST['id_student'];
        $id_class       = $_POST['id_class'];
        $day_sub        = $_POST['check_day'];
        $time_sub       = $_POST['check_time'];
        $price_course   = $_POST['price_total'];
        add_orders($order_code,$order_date,$order_pay,$id_student,$id_class,$day_sub,$time_sub,$price_course);
        switch ($order_pay){
            case 0:
                include 'controllers/pay/process_pay_off.php';
                break;
            case 1:
                include 'controllers/pay/process_vietqr.php';
                break;
            case 2:
                include 'controllers/pay/process_vnpay.php';
                break;
        }
    }
    else {
        location($host);
    }
?>