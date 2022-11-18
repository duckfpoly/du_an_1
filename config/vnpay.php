<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$vnp_TmnCode    = "VSMFP0PU";
$vnp_HashSecret = "PLBAVNNGSBYKUELQHCLOVFLXJFCKYVPN";
$vnp_Url        = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
// đường dẫn trả về sau khi nhấn thanh toán hoặc hủy thanh toán
$vnp_Returnurl  = "http://localhost/courses/pay/status";
$vnp_apiUrl     = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
$startTime      = date("YmdHis");
$expire         = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
