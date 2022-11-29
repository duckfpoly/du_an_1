<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $check_email = action_forgot_pass($_POST['email']);
    }
    include "views/account/forgot_pass.php";
?>