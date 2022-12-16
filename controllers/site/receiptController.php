<?php
    if(isset($_SESSION['user'])){
        $id = $_SESSION['user']['id'];
    }else{
        $id = '';
    }
    $data = get_receipt($id);
    include 'views/site/receipt/receipt.php';
?>