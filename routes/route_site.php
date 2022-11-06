<<<<<<< HEAD
<?php
    if(isset($_GET['v'])) {
        $v = $_GET['v'];
        switch ($v) {
            case "lesson":
                include_once 'views/site/lession.php';
                break;
            default:
                location($host."page_not_found");
                break;
        }
    }
    else {
        include_once 'views/site/home.php';
    }
?>

=======
<?php 
        $v = isset($_GET['v']) ? $_GET['v'] : "";
        if($v){
            switch ($v){
                case "lessions":
                    include 'views/site/lessions/lessions.php';
                    break;
                case "about":
                    include 'views/site/about/about.php';
                    break; 
                case "contact":
                    include 'views/site/contact/contact.php';
                    break;    
                default:
                    include 'views/site/home.php';
                    break;
            }

        }else{
            include_once 'views/site/home.php';
        }
?>
>>>>>>> cee4fb25bd4d9ea8b12694619c3e19e5c29f3795
