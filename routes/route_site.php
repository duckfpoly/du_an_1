<?php 
        $dir_ctrl   = 'controllers/site/';
        $dir_acc_ctrl   = 'controllers/site/account/';
        $name_exten = 'Controller.php';
        $v = isset($_GET['v']) ? $_GET['v'] : "";
        if($v){
            $urlClt = $dir_ctrl.$v.$name_exten;
            $urlAcc = $dir_acc_ctrl.$v.$name_exten;
            switch ($v){
                case "lessons":
                    include  $urlClt;
                    break;
                case "about":
                    include  $urlClt;
                    break; 
                case "contact":
                    include  $urlClt;
                    break;         
                case "about":
                    include  $urlClt;
                    break;
                case "contact":
                    include  $urlClt;
                    break;
                case "payment":
                    include  $urlClt;
                    break;  
                // account
                case "mycourses":
                    include  $urlClt;
                    break;         
                default:
                location($host."page_not_found");
                break;
        }
    }else{
        include_once 'controllers/site/homeController.php';
    }
?>

