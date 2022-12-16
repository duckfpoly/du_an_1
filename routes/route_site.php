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
                case "mycourse":
                    include  $urlClt;
                    break;  
                case "profile":
                    include  $urlClt;
                    break;    
                case "change_pass":
                    include  $urlClt;
                    break; 
                case "receipt":
                    include  $urlClt;
                    break;        
                default:
                location(BASE_URL."page_not_found");
                break;
        }
    }else{
        include_once 'controllers/site/homeController.php';
    }
?>

