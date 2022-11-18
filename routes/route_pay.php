<?php
    if(isset($_GET['req_pay'])){
        $req_pay = $_GET['req_pay'];
        if($req_pay == 'status'){
            include 'controllers/pay/status.php';
        }
    }else {
        include 'controllers/pay/process.php';
    }
?>