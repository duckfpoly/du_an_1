<?php
    if(isset($_GET['vnp_SecureHash'])){
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        $order_id       = $_GET['vnp_TxnRef'];
        $order_amount   = $_GET['vnp_Amount'];
        $order_bank     = $_GET['vnp_BankCode'];
        $pay_time       = $_GET['vnp_PayDate'];
        // gửi mail ( đang phát triển )
        // cập nhật trạng thái lên db
        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
                // giao dịch thành công
                $status = 2;
                update_status_orders($status,$order_id);
                $get_data_order = get_order($order_id);
                $id_student = $get_data_order['id_students'];
                $day_sub    = $get_data_order['day_sub'];
                $time_sub   = $get_data_order['time_sub'];
                $id_class   = $get_data_order['id_class'];
                add_student_to_class($id_student,$day_sub,$time_sub,$id_class);
            } else {
                // giao dịch hủy
                $status = 1;
                update_status_orders($status,$order_id);
            }
        } else {
            // chưa thanh toán
            $status = 0;
            update_status_orders($status,$order_id);
        }
        include 'views/pay/status_pay.php';
    }
    else {
        location(BASE_URL);
    }
?>

