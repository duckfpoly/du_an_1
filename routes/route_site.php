<?php 
        $dir_ctrl   = 'controllers/site/';
        $name_exten = 'Controller.php';
        $v = isset($_GET['v']) ? $_GET['v'] : "";
        if($v){
            $urlClt = $dir_ctrl.$v.$name_exten;
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
                default:
                location($host."page_not_found");
                break;
            }

        }else{
            include_once 'controllers/site/homeController.php';
        }
?>

