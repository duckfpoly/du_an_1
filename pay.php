<?php include 'global.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="assets/img/favicon.png"/>
    <title>COURSES APP - Thanh toán</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/admin/css/argon-dashboard.css"/>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/alert_pay.css">
</head>
<body>
    <?php
        if(isset($_GET['req_pay'])){
            $req_pay = $_GET['req_pay'];
            if($req_pay == 'status'){
                include 'controllers/pay/status.php';
            }
        }
        else {
            include 'routes/route_pay.php';
        }
    ?>
    </body>
</html>

