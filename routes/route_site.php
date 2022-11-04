<?php 
    if(isset($_GET['v'])){
        $v = $_GET['v'];
        try{
            require_once 'controllers/site/'.$v.'/'.$v.'Controller.php';
        } 
        catch (Throwable|Exception $e){    
            echo '<script>window.location="'.$host.'page_not_found";</script>';
        }
        $dir_img = $host.'assets/uploads/'.$v.'/';
    }else {
        
    }
?>