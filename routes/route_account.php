<?php
    $dir_acc_ctrl   = 'controllers/site/account/';
    $name_exten     = 'Controller.php';
    $a = isset($_GET['a']) ? $_GET['a'] : "";
    if($a){
        $urlAcc = $dir_acc_ctrl.$a.$name_exten;
        switch ($a){
            case 'sign_up':
                include $urlAcc;
                break; 
            case 'sign_in':
                include $urlAcc;
                break;
            case 'forgot_pass':
                include $urlAcc;
                break;
            case 'reset_pass':
                include $urlAcc;
                break;
            case 'log_out':
                include $urlAcc;
                break;
            case 'teacher_signin':
                include $urlAcc;
                break;
            default:
                location($host."page_not_found");
                break;
        }
    }
?>