<?php
     if(isset($_SESSION['user'])){
         if(empty($_POST['id_class'])){
             location(BASE_URL);
         }
         else {
             $id_class   = $_POST['id_class'];
             $class      = get_classes($id_class);
             $order_code = time();
             include 'views/site/payment/payment.php';
         }
    }
     else {
         location(BASE_URL.'account/sign_in');
     }
?>