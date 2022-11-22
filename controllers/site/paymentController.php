<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id_course'];
        $course = get_course($id);
        $day = $_POST['check_day'];
        $time = $_POST['check_time'];
        if(isset($_POST['process_pay']) && ($_POST['process_pay'])){
            $id_course = $_POST['id_course'];
            $date = $_POST['date_time'];
            $phone = $_POST['phone'];
            $name = $_POST['name'];
            $email = $_POST['phone'];
            $pay_option = $_POST['pay_option'];
            add_order($date,$pay_option);
            header("location: /lession");
        }
    }
    include 'views/site/payment/payment.php';
       

?>