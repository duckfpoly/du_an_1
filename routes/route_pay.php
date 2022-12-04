<?php
    if(isset($_POST['order_code'])){
        $check = check_order_code($_POST['order_code']);
        isset($check) && location(BASE_URL);
        $order_code     = $_POST['order_code'];
        $order_date     = date("Y-m-d H:i:s");
        $order_pay      = $_POST['pay_option'];
        $id_student     = $_POST['id_student'];
        $id_class       = $_POST['id_class'];
        $price_total    = $_POST['price_total'];
        add_orders($order_code,$order_date,$order_pay,$id_student,$id_class,$price_total);
//        $options = array(
//            'cluster' => 'ap1',
//            'useTLS' => true
//        );
//        $pusher = new Pusher\Pusher(
//            'fdd2d88095b96edb92f5',
//            'd16dbc84782402e40487',
//            '1516523',
//            $options
//        );
//        $data['message'] = 'Đơn hàng mới - Mã đơn hàng ' .$order_code;
//        $data['order_code'] = $order_code;
//        $pusher->trigger('courses-app', 'notice', $data);
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
        location(BASE_URL);
    }
?>