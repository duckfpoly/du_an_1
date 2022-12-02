<?php
    if(isset($_SESSION['user'])){
        $data_user = $_SESSION['user'];
    }
    include 'views/site/change_pass/change_pass.php';
?>