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
        $order_id = $_GET['vnp_TxnRef'];
        $order_amount = $_GET['vnp_Amount'];
        $order_bank = $_GET['vnp_BankCode'];
        $pay_time = $_GET['vnp_PayDate'];
        // gửi mail


        // cập nhật trạng thái lên db


        include 'views/status_pay.php';
    }
    else {
        location($host);
    }
?>
