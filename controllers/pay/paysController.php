<?php
    $check = check_order_code($_POST['order_code']);
    isset($check) && die(location(BASE_URL));
    $order_code     = $_POST['order_code'];
    $order_date     = date("Y-m-d H:i:s");
    $order_pay      = $_POST['pay_option'];
    $id_student     = $_POST['id_student'];
    $id_class       = $_POST['id_class'];
    $price_total    = $_POST['price_total'];
    add_orders($order_code,$order_date,$order_pay,$id_student,$id_class,$price_total);
    $student = student_detail($id_student);
    $class  = class_detail($id_class);
    notification_create(
        'Đơn đăng ký mới',
        'Học viên '.$student['name_student'].' vừa đăng ký',
        date("Y-m-d H:i:s"),
        ORDERS.'.?s='.$order_code
    );
    add_student_to_class($id_student,$id_class);

    switch ($order_pay){
//        case 0:
//            include 'controllers/pay/process_pay_off.php';
//            break;
        case 1:
            include 'controllers/pay/process_vietqr.php';
            break;
        case 2:
            include 'controllers/pay/process_vnpay.php';
            break;
    }
?>