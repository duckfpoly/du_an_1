<?php
    if(isset($_POST['order_code'])){
        include 'controllers/pay/paysController.php';
    }
    else {
        location(BASE_URL);
    }
?>